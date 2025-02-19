import { createRouter, createWebHistory } from 'vue-router';

// Import Views
import Home from './components/Home.vue';
import Cars from './components/Cars.vue';
import Rentals from './components/Rentals.vue';
import Login from './components/Login.vue';
import Signup from './components/Signup.vue';
import BookingHistory from './components/BookingHistory.vue';

const routes = [
    { path: '/', component: Home },
    { path: '/cars', component: Cars },
    { path: '/rentals', component: Rentals },
    { path: '/login', component: Login },
    { path: '/signup', component: Signup },
    { path: '/history', component: BookingHistory, meta: { requiresAuth: true } }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const isAuthenticated = localStorage.getItem('token');
    if (to.meta.requiresAuth && !isAuthenticated) {
        next('/login');
    } else {
        next();
    }
});

export default router;
