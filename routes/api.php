<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;

// Rotas Públicas (Qualquer um acessa)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rotas Protegidas (Precisa estar logado / Token válido)
Route::middleware('auth:sanctum')->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Usuário logado
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Quiz
    Route::get('/quiz/start', [QuizController::class, 'start']);
    Route::post('/quiz/submit', [QuizController::class, 'submit']);
    
    // Dashboard
    Route::get('/ranking', [QuizController::class, 'ranking']);
});