import axios from 'axios';
import authUser from "@/api/auth.user";
import router from '@/router';

/** Default config for axios instance */
const API_ENDPOINT = process.env.VUE_APP_API_ENDPOINT || 'http://127.0.0.1:8000/';
let config = {
    baseURL: `${API_ENDPOINT}api/`
};

/** Creating the instance for axios */
const httpUser = axios.create(config);

/** Auth token interceptors */
const authInterceptor = config => {
    config.headers.Authorization = `Bearer ${authUser.getToken()}`;
    return config;
};


/** Adding the request interceptors */
httpUser.interceptors.request.use(authInterceptor);

/** Adding the response interceptors */
httpUser.interceptors.response.use(
    response => {
        /** TODO: Add any response interceptors */
        return response;
    },
    error => {
        if (error.response.status === 401) {
            router.push({ name: 'User' })
        }
        /** TODO: Do something with response error */
        return Promise.reject(error);
    }
);

export default httpUser;
