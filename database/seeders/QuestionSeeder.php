<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Option;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        // Vamos criar 20 perguntas de exemplo sobre Frameworks/Laravel/Vue
        $questions = [
            [
                'statement' => 'Qual comando é utilizado para criar uma Migration no Laravel?',
                'options' => [
                    ['text' => 'php artisan make:migration', 'is_correct' => true],
                    ['text' => 'php artisan create:table', 'is_correct' => false],
                    ['text' => 'laravel new migration', 'is_correct' => false],
                    ['text' => 'composer create-migration', 'is_correct' => false],
                ]
            ],
            [
                'statement' => 'O que é o Eloquent no Laravel?',
                'options' => [
                    ['text' => 'Um ORM para interagir com o banco de dados', 'is_correct' => true],
                    ['text' => 'Um sistema de templates', 'is_correct' => false],
                    ['text' => 'Um gerenciador de pacotes', 'is_correct' => false],
                    ['text' => 'Um servidor web', 'is_correct' => false],
                ]
            ],
             [
                'statement' => 'No Vue.js, qual diretiva é usada para renderização condicional?',
                'options' => [
                    ['text' => 'v-if', 'is_correct' => true],
                    ['text' => 'v-for', 'is_correct' => false],
                    ['text' => 'v-bind', 'is_correct' => false],
                    ['text' => 'v-on', 'is_correct' => false],
                ]
            ],
            // Adicione mais perguntas aqui se quiser, ou duplique a lógica
        ];

        // Loop para gerar mais perguntas genéricas até ter volume
        for ($i = 1; $i <= 17; $i++) {
            $questions[] = [
                'statement' => "Pergunta Genérica de Lógica #{$i}: Quanto é 2 + 2 x {$i}?",
                'options' => [
                    ['text' => (2 + 2 * $i), 'is_correct' => true],
                    ['text' => (4 * $i), 'is_correct' => false],
                    ['text' => (10 + $i), 'is_correct' => false],
                    ['text' => 'Nenhuma das anteriores', 'is_correct' => false],
                ]
            ];
        }

        foreach ($questions as $q) {
            $question = Question::create(['statement' => $q['statement']]);
            
            foreach ($q['options'] as $opt) {
                Option::create([
                    'question_id' => $question->id,
                    'text' => $opt['text'],
                    'is_correct' => $opt['is_correct']
                ]);
            }
        }
    }
}