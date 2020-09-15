<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    //Define os atributos desta tabela que poderao ser modificados pelo sistema
    protected $fillable = [
        'id_professor', 'nome_professor', 'matricula', 'email'
    ];
}