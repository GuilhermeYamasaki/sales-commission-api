import axios from 'axios'

const token = localStorage.getItem('token')
const api = axios.create({
    headers: {
        Authorization: `Bearer ${token}`
    }
})

api.interceptors.response.use(
    (response) => {
        return response;
    },
    (error) => {
        if (error.response.status === 401) {
            // Redirecionar para a página de login ou qualquer outra página desejada
            window.location.href = '/login';
        }
        return Promise.reject(error);
    }
);

export default api
