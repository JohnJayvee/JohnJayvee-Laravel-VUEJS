import Home from './views/Home.vue'
import Login from './views/Login.vue'

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home,
        meta: { requiresAuth: true }
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'UserView',
        path: '/UserView',
        component: UserView
    }
]
