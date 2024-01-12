import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import jwtToken from './vuex/jwtToken';

import axios from 'axios'
import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
import { subCategoryMethods } from '@/components/SubCategoryMethods';

const axiosInstance = axios.create({
    baseURL: 'http://localhost:8000/api'
})

// Add a request interceptor to include the Bearer token in every request
axiosInstance.interceptors.request.use(
    (config) => {
        const token = jwtToken.state.token;
        if (token) {
            config.headers.Authorization = `Bearer ${token}`;
        }

        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

// Add a response interceptor to handle HTTP 401 errors
axiosInstance.interceptors.response.use(
    (response) => response,
    (error) => {
        if (error.response && error.response.status === 401) {
            console.log("dhur");
            // Clear the token and perform logout actions
            jwtToken.dispatch('logoutUser');
            // Redirect to the login page
            router.push('/login');
        }

        return Promise.reject(error);
    }
);

const app = createApp(App)
app.config.globalProperties.axios = { ...axiosInstance }
app.component("v-select", vSelect);
// app.mixin(subCategoryMethods)

app.use(router)

// Exclude lord-icon from component resolution
// app.config.isCustomElement = (tag) => tag.startsWith('lord-icon');

app.mount('#app')
