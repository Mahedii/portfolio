import { createApp } from 'vue';
import App from './App.vue';
import router from "./router";
import AOS from 'aos';
import 'aos/dist/aos.css';  
import i18n from './i18n';
import store from "./state/store";

import BootstrapVue3 from 'bootstrap-vue-3';
import vClickOutside from "click-outside-vue3";
import VueApexCharts from "vue3-apexcharts";
import Maska from 'maska';

import vSelect from "vue-select";
import "vue-select/dist/vue-select.css";
// import axios from 'axios'
import axiosInstance from './axiosInstance.js'
// import AxiosPlugin from '@/axios_plugin.js';

import VueFeather from 'vue-feather';
import Particles from "particles.vue3";

import '@/assets/scss/config/material/app.scss';
import '@vueform/slider/themes/default.css';

// FakeBackend authentication
// import { configureFakeBackend } from './helpers/fake-backend';
// configureFakeBackend();


// Firebase authentication
// import { initFirebaseBackend } from './authUtils';

// const firebaseConfig = {
//     apiKey: process.env.VUE_APP_APIKEY,
//     authDomain: process.env.VUE_APP_AUTHDOMAIN,
//     databaseURL: process.env.VUE_APP_VUE_APP_DATABASEURL,
//     projectId: process.env.VUE_APP_PROJECTId,
//     storageBucket: process.env.VUE_APP_STORAGEBUCKET,
//     messagingSenderId: process.env.VUE_APP_MEASUREMENTID
// };

// initFirebaseBackend(firebaseConfig);

// const axiosInstance = axios.create({
//     baseURL: 'http://localhost:8000/api'
// })

// Add a request interceptor to include the Bearer token in every request
axiosInstance.interceptors.request.use(
    (config) => {
        const token = sessionStorage.getItem('jwt-token')
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
            // console.log("dhur");
            // Clear the token and perform logout actions
            // jwtToken.dispatch('logoutUser');
            // Redirect to the login page
            router.push('/login');
        }

        return Promise.reject(error);
    }
);

AOS.init({
    easing: 'ease-out-back',
    duration: 1000
});

const app = createApp(App)
// app.config.globalProperties.$axios = axiosInstance
app.config.globalProperties.axios = { ...axiosInstance }

app.use(store)
    .use(router)
    .component("v-select", vSelect)
    // .use(AxiosPlugin)
    .use(VueApexCharts)
    .use(BootstrapVue3)
    .component(VueFeather.type, VueFeather)
    .use(Maska)
    .use(Particles)
    .use(i18n)
    .use(vClickOutside).mount('#app');