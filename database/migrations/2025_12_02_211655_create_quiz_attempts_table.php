<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Quem fez o quiz
            $table->integer('score'); // Pontuação total
            $table->integer('correct_answers'); // Qtd de acertos
            $table->integer('wrong_answers'); // Qtd de erros
            $table->integer('total_time'); // Tempo gasto em segundos
            $table->timestamps(); // Data de realização
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_attempts');
    }
};
