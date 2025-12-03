<template>
    <div class="dashboard-bg">
        <nav class="navbar">
            <div class="brand">
                <span class="logo-icon"></span> Quizz TI 
            </div>
            <div class="user-menu">
                <span> {{ user.name }}</span>
                <button @click="logout" class="btn-logout">Sair</button>
            </div>
        </nav>

        <main class="main-content">
            <div class="grid-layout">
                
                <div class="hero-card">
                    <h1>Desafie-se!</h1>
                    <p>Responda a 10 perguntas aleatórias e teste seu conhecimento em tecnologia.</p>
                    <button @click="startQuiz" class="btn-start">
                        ▶ Iniciar Quiz
                    </button>
                </div>

                <div class="ranking-card">
                    <div class="card-header">
                        <h3>🏆 Ranking Global</h3>
                        <span class="badge">Top Players</span>
                    </div>

                    <table class="ranking-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Usuário</th>
                                <th>Acertos</th>
                                <th>Tempo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(rank, index) in ranking" :key="index">
                                <td>
                                    <span v-if="index === 0">🥇</span>
                                    <span v-else-if="index === 1">🥈</span>
                                    <span v-else-if="index === 2">🥉</span>
                                    <span v-else>{{ index + 1 }}</span>
                                </td>
                                <td>
                                    {{ rank.user.name }}
                                    <span v-if="rank.user.name === user.name" class="me-tag">(Você)</span>
                                </td>
                                <td><span class="score-badge">{{ rank.correct_answers }}/10</span></td>
                                <td>{{ formatTime(rank.total_time) }}</td>
                            </tr>
                            <tr v-if="ranking.length === 0">
                                <td colspan="4" class="empty-state">Seja o primeiro a jogar!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

const router = useRouter();
const user = ref({});
const ranking = ref([]);

const formatTime = (seconds) => {
    const m = Math.floor(seconds / 60);
    const s = seconds % 60;
    return `${m > 0 ? m + 'm ' : ''}${s}s`;
};

const startQuiz = () => router.push('/quiz');

const logout = async () => {
    localStorage.removeItem('token');
    router.push('/login');
};

onMounted(async () => {
    user.value = JSON.parse(localStorage.getItem('user') || '{}');
    try {
        const token = localStorage.getItem('token');
        const res = await axios.get('/api/ranking', { headers: { Authorization: `Bearer ${token}` }});
        ranking.value = res.data;
    } catch (e) {
        console.error(e);
    }
});
</script>

<style scoped>
.dashboard-bg { min-height: 100vh; background-color: #f3f4f6; font-family: 'Inter', sans-serif; }
.navbar { background: white; padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 1px 3px rgba(0,0,0,0.05); }
.brand { font-weight: 800; font-size: 1.25rem; color: #111827; display: flex; align-items: center; gap: 0.5rem; }
.user-menu { display: flex; gap: 1rem; align-items: center; font-size: 0.9rem; }
.btn-logout { color: #ef4444; background: none; border: none; cursor: pointer; font-weight: 600; }

.main-content { max-width: 1000px; margin: 3rem auto; padding: 0 1rem; }
.grid-layout { display: grid; grid-template-columns: 1fr 1.5fr; gap: 2rem; }

/* Card Esquerdo (Roxo) */
.hero-card { background: linear-gradient(135deg, #4f46e5 0%, #3730a3 100%); color: white; padding: 2.5rem; border-radius: 16px; display: flex; flex-direction: column; justify-content: center; align-items: flex-start; box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.4); }
.hero-card h1 { font-size: 2rem; margin-bottom: 1rem; }
.hero-card p { margin-bottom: 2rem; opacity: 0.9; line-height: 1.5; }
.btn-start { background: white; color: #4f46e5; padding: 0.8rem 1.5rem; border-radius: 8px; border: none; font-weight: bold; font-size: 1rem; cursor: pointer; display: flex; align-items: center; gap: 0.5rem; transition: transform 0.2s; }
.btn-start:hover { transform: translateY(-2px); }

/* Card Direito (Ranking) */
.ranking-card { background: white; border-radius: 16px; padding: 1.5rem; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
.card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
.badge { background: #f3f4f6; font-size: 0.75rem; padding: 0.2rem 0.6rem; border-radius: 10px; color: #6b7280; }
.ranking-table { width: 100%; border-collapse: collapse; }
.ranking-table th { text-align: left; color: #6b7280; font-size: 0.85rem; padding-bottom: 0.8rem; border-bottom: 1px solid #f3f4f6; }
.ranking-table td { padding: 1rem 0; font-size: 0.95rem; border-bottom: 1px solid #f9fafb; color: #374151; }
.score-badge { background: #ecfdf5; color: #059669; padding: 0.2rem 0.5rem; border-radius: 4px; font-weight: 600; font-size: 0.85rem; }
.me-tag { font-size: 0.75rem; color: #4f46e5; margin-left: 0.3rem; }

/* Responsivo */
@media (max-width: 768px) {
    .grid-layout { grid-template-columns: 1fr; }
}
</style>