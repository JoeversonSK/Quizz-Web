import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
// Importaremos o router depois, por enquanto vamos apenas montar o app

const app = createApp(App);
app.mount('#app');