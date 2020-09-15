<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Metodologia;
use App\Model\AreaAtuacao;

class AreaConhecimento extends Model
{
	//Define os atributos desta tabela que poderao ser modificados pelo sistema
    protected $fillable = [
		'nome'
	];
	
	//Define as relações deste Banco de Dados
    public function metodologia(){
		return $this->hasMany('App\Model\Metodologia');
	}
	public function areaAtuacao(){
		return $this->belongsTo('App\Model\AreaAtuacao');
	}
}
