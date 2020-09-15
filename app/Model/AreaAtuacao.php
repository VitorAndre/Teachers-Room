<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Metodologia;
use App\Model\AreaConhecimento;

class AreaAtuacao extends Model
{
	//Define os atributos desta tabela que poderao ser modificados pelo sistema
    protected $fillable = [
		'nome', 'area_conhecimento_id'
	];
	
	//Define as relações deste Banco de Dados
    public function metodologia(){
		return $this->hasMany('App\Model\Metodologia');
	}
	public function areaConhecimento(){
		return $this->hasMany('App\Model\AreaConhecimento');
	}
}
