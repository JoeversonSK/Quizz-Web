<template>
    <div class="quiz-container">
        <div v-if="loading" class="loading-state">
            <div class="spinner"></div>
            <p>Preparando seu desafio...</p>
        </div>

        <div v-else-if="questions.length > 0" class="quiz-content">
            <div class="quiz-header">
                <span class="question-count">Questão <strong>{{ currentIndex + 1 }}</strong>/{{ questions.length }}</span>
                <div class="timer-pill">
                    ⏱ {{ formattedTime }}
                </div>
            </div>

            <div class="progress-bar-bg">
                <div class="progress-bar-fill" :style="{ width: progressPercentage + '%' }"></div>
            </div>

            <div class="question-card">
                <h2 class="question-text">{{ currentQuestion.statement }}</h2>

                <div class="options-list">
                    <button 
                        v-for="option in currentQuestion.options" 
                        :key="option.id"
                        class="option-btn"
                        :class="{ 'selected': selectedOptionId === option.id }"
                        @click="selectOption(option.id)"
                    >
                        {{ option.text }}
                    </button>
                </div>
            </div>

            <button 
                class="btn-confirm" 
                :disabled="!selectedOptionId"
                @click="confirmAnswer"
            >
                {{ isLastQuestion ? 'Finalizar Quiz' : 'Confirmar Resposta' }}
            </button>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

const router = useRouter();
const loading = ref(true);
const questions = ref([]);
const currentIndex = ref(0);
const selectedOptionId = ref(null);
const userAnswers = ref([]); // Guarda as respostas para enviar no final
const startTime = ref(null);
const timerSeconds = ref(0);
const timerInterval = ref(null);

// Dados computados
const currentQuestion = computed(() => questions.value[currentIndex.value]);
const isLastQuestion = computed(() => currentIndex.value === questions.value.length - 1);
const progressPercentage = computed(() => ((currentIndex.value + 1) / questions.value.length) * 100);
const formattedTime = computed(() => {
    const m = Math.floor(timerSeconds.value / 60);
    const s = timerSeconds.value % 60;
    return `${m > 0 ? m + 'm ' : ''}${s}s`;
});

// Ações
const selectOption = (id) => {
    selectedOptionId.value = id;
};

const confirmAnswer = async () => {
    // 1. Salva a resposta atual
    userAnswers.value.push({
        question_id: currentQuestion.value.id,
        option_id: selectedOptionId.value
    });

    // 2. Se não for a última, avança
    if (!isLastQuestion.value) {
        selectedOptionId.value = null;
        currentIndex.value++;
    } else {
        // 3. Se for a última, finaliza
        await submitQuiz();
    }
};

const submitQuiz = async () => {
    loading.value = true;
    clearInterval(timerInterval.value); // Para o relógio

    try {
        const token = localStorage.getItem('token');
        await axios.post('/api/quiz/submit', {
            answers: userAnswers.value,
            time: timerSeconds.value
        }, {
            headers: { Authorization: `Bearer ${token}` }
        });
        
        // Redireciona para o Dashboard (ou uma tela de resultados se quiser criar depois)
        router.push('/dashboard');
    } catch (error) {
        alert('Erro ao enviar respostas. Tente novamente.');
        loading.value = false;
    }
};

// Ciclo de Vida
onMounted(async () => {
    try {
        const token = localStorage.getItem('token');
        const response = await axios.get('/api/quiz/start', {
            headers: { Authorization: `Bearer ${token}` }
        });
        questions.value = response.data;
        
        // Inicia o Timer
        startTime.value = Date.now();
        timerInterval.value = setInterval(() => {
            timerSeconds.value++;
        }, 1000);
    } catch (e) {
        alert('Erro ao carregar perguntas.');
        router.push('/dashboard');
    } finally {
        loading.value = false;
    }
});

onUnmounted(() => {
    clearInterval(timerInterval.value);
});
</script>

<style scoped>
/* Estilos baseados na imagem Quiz.png */
.quiz-container {
    min-height: 100vh;
    background-color: #111827; /* Fundo Escuro */
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 2rem 1rem;
    font-family: 'Inter', sans-serif;
}

.quiz-content {
    width: 100%;
    max-width: 600px;
}

/* Header */
.quiz-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
    color: #9ca3af;
}

.timer-pill {
    background: #3730a3;
    color: #e0e7ff;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-weight: bold;
    font-size: 0.9rem;
}

/* Barra de Progresso */
.progress-bar-bg {
    height: 6px;
    background: #374151;
    border-radius: 3px;
    margin-bottom: 2rem;
    overflow: hidden;
}

.progress-bar-fill {
    height: 100%;
    background: #6366f1; /* Roxo vibrante */
    transition: width 0.3s ease;
}

/* Card Branco */
.question-card {
    background: white;
    color: #1f2937;
    padding: 2rem;
    border-radius: 16px;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    margin-bottom: 1.5rem;
}

.question-text {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 2rem;
    line-height: 1.5;
}

/* Opções */
.options-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.option-btn {
    background: white;
    border: 2px solid #e5e7eb;
    padding: 1rem;
    border-radius: 8px;
    text-align: left;
    font-size: 1rem;
    color: #4b5563;
    cursor: pointer;
    transition: all 0.2s;
}

.option-btn:hover {
    border-color: #6366f1;
    background: #f5f3ff;
}

.option-btn.selected {
    border-color: #6366f1;
    background: #e0e7ff;
    color: #3730a3;
    font-weight: 600;
}

/* Botão Confirmar */
.btn-confirm {
    width: 100%;
    background: #374151; /* Cinza desativado */
    color: white;
    padding: 1rem;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: bold;
    cursor: not-allowed;
    transition: background 0.2s;
}

.btn-confirm:not(:disabled) {
    background: #4f46e5; /* Roxo principal */
    cursor: pointer;
}

.btn-confirm:not(:disabled):hover {
    background: #4338ca;
}

.loading-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 80vh;
    color: #9ca3af;
}
</style>