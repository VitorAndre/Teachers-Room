<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    //Define os atributos desta tabela que poderao ser modificados pelo sistema
    protected $fillable = ["user_id", "avaliacao", "metodologia_id"];


	//Define as relações deste Banco de Dados
    public function user(){
        return $this->belongsTo("App\User");
    }

    public function metodologia(){
        return $this->belongsTo("App\Model\Metodologia");
    }
}
