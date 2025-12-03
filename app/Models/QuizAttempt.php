<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    use HasFactory;
    protected $guarded = [];

    //A tentativa pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}