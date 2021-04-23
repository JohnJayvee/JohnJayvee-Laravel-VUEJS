import Home from './views/Home.vue'
import Login from './views/Login.vue'
import contactsIndex from './views/Contacts/index.vue'
import contactsCreate from './views/Contacts/create.vue'
import contactsEdit from './views/Contacts/edit.vue'
import contactsShow from './views/Contacts/show.vue'





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
        name: 'contactsIndex',
        path: '/contacts/',
        component: contactsIndex
    },
    {
        name: 'contactsCreate',
        path: '/contacts/create',
        component: contactsCreate
    },
    {
        name: 'contactsEdit',
        path: '/contacts/edit/:id',
        component: contactsEdit
    },
    {
        name: 'contactsShow',
        path: '/contacts/show/:id',
        component: contactsShow
    }
]
