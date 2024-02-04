import axiosInstance from '@/axiosInstance.js';

const AxiosPlugin = {
  install(app) {
    app.config.globalProperties.$axios = axiosInstance;
  },
};

export default AxiosPlugin;
