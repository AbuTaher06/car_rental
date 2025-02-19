<template>
    <div>
        <h2>Login</h2>
        <input v-model="email" type="email" placeholder="Email" />
        <input v-model="password" type="password" placeholder="Password" />
        <button @click="login">Login</button>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return { email: '', password: '' };
    },
    methods: {
        async login() {
            const response = await axios.post('/api/login', {
                email: this.email,
                password: this.password
            });
            localStorage.setItem('token', response.data.token);
            this.$router.push('/cars');
        }
    }
};
</script>
