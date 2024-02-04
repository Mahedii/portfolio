import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: 'http://localhost:8000/api', // Set your base URL here
});

// // Set default headers
// const jwtToken = sessionStorage.getItem('jwt-token');
// if (jwtToken) {
//     axiosInstance.defaults.headers.common['Authorization'] = `Bearer ${jwtToken}`;
// }

export default axiosInstance;
