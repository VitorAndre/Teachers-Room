<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    //Define os atributos desta tabela que poderao ser modificados pelo sistema
    protected $fillable = [
        'id', 'nome_disciplina'
    ];
}