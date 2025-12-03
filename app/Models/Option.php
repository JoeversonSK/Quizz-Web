<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $guarded = [];

    //A opção pertence a uma questão
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}