import { createRouter, createWebHistory } from 'vue-router'
import { routes } from './routes.js'

const routerOptions = {
    history: createWebHistory(),
    routes
}

const router = createRouter(routerOptions)

export default router
