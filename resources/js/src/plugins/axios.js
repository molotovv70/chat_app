import axios from 'axios'

// import router from '@/router'

const config = {
    withCredentials: true,
    withXSRFToken: true,
    baseURL: `${import.meta.env.VITE_API_URL}`,

    headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
    },
}

const instance = axios.create(config)
// export const axios = axios.create(config)

export default instance;