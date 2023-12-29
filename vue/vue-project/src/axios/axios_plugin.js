import axios from 'axios'

export default {
    install: function (app) {
        app.config.globalProperties.axios = axios
    }
};
 
