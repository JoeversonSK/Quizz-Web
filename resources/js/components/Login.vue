<template>
    <div class="auth-container">
        <div class="card">
            <h2>Login Quiz</h2>
            <form @submit.prevent="handleLogin">
                <div class="form-group">
                    <label>Email</label>
                    <input v-model="form.email" type="email" required placeholder="seu@email.com">
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input v-model="form.password" type="password" required placeholder="******">
                </div>
                <button type="submit" :disabled="loading">
                    {{ loading ? 'Entrando...' : 'Entrar' }}
                </button>
            </form>
            <p>
                Não tem conta? <router-link to="/register">Cadastre-se</router-link>
            </p>
            <p v-if="error" class="error">{{ error }}</p>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

const router = useRouter();
const loading = ref(false);
const error = ref('');

const form = reactive({
    email: '',
    password: ''
});

const handleLogin = async () => {
    loading.value = true;
    error.value = '';

    try {
        // Faz a requisição para a API
        const response = await axios.post('/api/login', form);
        
        // Salva o token no navegador
        localStorage.setItem('token', response.data.token);
        localStorage.setItem('user', JSON.stringify(response.data.user));
        
        // Redireciona para o Dashboard
        router.push('/dashboard');
    } catch (e) {
        error.value = 'Email ou senha inválidos.';
    } finally {
        loading.value = false;
    }
};
</script>

<style scoped>
.auth-container { 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    height: 100vh; 
    background-color: #1e1e2d; /* Fundo Escuro do Design */
}
.card { 
    background: white; 
    padding: 2.5rem; 
    border-radius: 12px; 
    width: 100%; 
    max-width: 400px; 
    text-align: center;
}
h2 { color: #1e1e2d; margin-bottom: 1.5rem; }
.form-group { margin-bottom: 1.2rem; text-align: left; }
label { display: block; margin-bottom: 0.5rem; font-weight: 600; font-size: 0.9rem; color: #374151; }
input { 
    width: 100%; 
    padding: 0.9rem; 
    border: 1px solid #e5e7eb; 
    border-radius: 6px; 
    outline: none;
    transition: border-color 0.2s;
}
input:focus { border-color: #4f46e5; }
button { 
    width: 100%; 
    padding: 0.9rem; 
    background: #4f46e5; /* Roxo padrão */
    color: white; 
    border: none; 
    border-radius: 6px; 
    font-weight: bold; 
    cursor: pointer; 
    margin-top: 1rem;
}
button:hover { background: #4338ca; }
</style>