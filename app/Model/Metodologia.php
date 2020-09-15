<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Metodologia extends Model
{
    //Define os atributos desta tabela que poderao ser modificados pelo sistema
    protected $fillable = [
        'id', 'titulo', 'materiais', 'metodo', 'palavras_chave', 'autor',
        'area_atuacao', 'area_conhecimento', 'is_requisicao', 'video', 'video_url', 'is_requisicao',
        'avaliacao'
    ];

	//Define as relações deste Banco de Dados
    public function users(){
        return $this->belongsTo('App\User');
    }

    public function areaAtuacao(){
        return $this->belongsTo('App\Model\AreaAtuacao', 'area_atuacao');
    }    
    
    public function areaConhecimento(){
        return $this->belongsTo('App\Model\AreaConhecimento', 'area_conhecimento');
    }

    public function avaliacao(){
        return $this->hasMany('App\Model\Avaliacao');
    }
}