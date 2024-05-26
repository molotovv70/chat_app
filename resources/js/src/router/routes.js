import Login from '@/pages/Login.vue'
import Home from '@/pages/Home.vue'
import Register from "@/pages/Register.vue";
import Test from "@/pages/Test.vue";


export const routes= [
    {
        path: '/login',
        name: 'Login',
        component: Login,
    },
    {
        path: '/register',
        name: 'Register',
        component: Register,
    },
    {
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/test',
        name: 'Test',
        component: Test,
    },
]
