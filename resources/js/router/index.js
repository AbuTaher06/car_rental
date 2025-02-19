import { createRouter, createWebHistory } from 'vue-router';
import Home from '../pages/Home.vue';
import About from '../pages/About.vue';
import Rentals from '../pages/Rentals.vue';
import Contact from '../pages/Contact.vue';
import Login from '../pages/Login.vue';
import Signup from '../pages/Signup.vue';

const routes = [
    { path: '/', component: Home },
    { path: '/about', component: About },
    { path: '/rentals', component: Rentals },
    { path: '/contact', component: Contact },
    { path: '/login', component: Login },
    { path: '/signup', component: Signup }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
