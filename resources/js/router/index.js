import { createRouter, createWebHistory } from 'vue-router'

// importar os componentes
import Login from '../components/Login.vue'
import Register from '../components/Register.vue'
import Dashboard from '../components/Dashboard.vue'
import Quiz from '../components/Quiz.vue'

const routes = [
    { path: '/', redirect: '/login' },
    { path: '/login', component: Login, name: 'Login' },
    { path: '/register', component: Register, name: 'Register' },
    { 
        path: '/dashboard', 
        component: Dashboard, 
        name: 'Dashboard',
        meta: { requiresAuth: true } // Protege a rota
    },
    { 
        path: '/quiz', 
        component: Quiz, 
        name: 'Quiz',
        meta: { requiresAuth: true } // Protege a rota
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

// Impede acesso sem login
router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('token')
    if (to.meta.requiresAuth && !token) {
        next('/login')
    } else {
        next()
    }
})

export default router