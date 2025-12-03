<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];

    //Relacionamento 1 para Muitos
    public function options()
    {
        return $this->hasMany(Option::class);
    }
}