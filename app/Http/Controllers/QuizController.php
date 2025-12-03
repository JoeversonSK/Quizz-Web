<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuizAttempt;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    // Iniciar Quiz: Retorna 10 perguntas aleatórias com suas opções
    public function start()
    {
        // 1. Pega 10 questões aleatórias e suas opções
        $questions = Question::with('options')->inRandomOrder()->take(10)->get();

        // 2. Para cada questão encontrada...
        $questions->each(function ($q) {
            // ...embaralha a ordem das opções dessa questão
            $shuffledOptions = $q->options->shuffle();
            
            // Atualiza a lista de opções da questão com a lista misturada
            $q->setRelation('options', $shuffledOptions);

            // Esconde qual é a correta (segurança)
            $q->options->makeHidden('is_correct');
        });

        return response()->json($questions);
    }

    // Submeter Quiz: Recebe as respostas e calcula a nota
    public function submit(Request $request)
    {
        $user = Auth::user();
        $answers = $request->input('answers'); // Array ex: [{question_id: 1, option_id: 5}, ...]
        $totalTime = $request->input('time'); // Tempo em segundos

        $score = 0;
        $correct = 0;
        $wrong = 0;

        // Lógica de correção
        foreach ($answers as $answer) {
            $question = Question::find($answer['question_id']);
            // Verifica se a opção escolhida é a correta
            $selectedOption = $question->options()->where('id', $answer['option_id'])->first();
            
            if ($selectedOption && $selectedOption->is_correct) {
                $correct++;
                $score += 10; // Cada resposta correta vale 10 pontos
            } else {
                $wrong++;
            }
        }

        // Salva o resultado no banco
        $attempt = QuizAttempt::create([
            'user_id' => $user->id,
            'score' => $score,
            'correct_answers' => $correct,
            'wrong_answers' => $wrong,
            'total_time' => $totalTime
        ]);

        return response()->json([
            'message' => 'Quiz finalizado!',
            'result' => $attempt
        ]);
    }

    // Ranking: Melhores pontuações (critério desempate: menor tempo)
    public function ranking()
    {
        $ranking = QuizAttempt::with('user:id,name') // Traz apenas o nome do usuário
            ->orderByDesc('score')
            ->orderBy('total_time')
            ->take(5)
            ->get();

        return response()->json($ranking);
    }
}