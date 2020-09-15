<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Metodologia;
use Faker\Generator as Faker;


//Define valores aleatórios para preencher o BD para testes
$factory->define(Metodologia::class, function (Faker $faker) {
    $x = $faker->numberBetween(1,355);
    if($x <= 37){
        $y = 1;
    }
    else if($x <= 96 && $x >=38){
        $y = 2;                   
    }
    else if($x >=97 && $x <= 153){
        $y = 3;                   
    }
    else if($x >=154 && $x <= 191){
        $y = 4;                   
    }
    else if($x >=192 && $x <= 225){
        $y = 5;                   
    }
    else if($x >=226 && $x <= 269){
        $y = 6;                   
    }
    else if($x >=270 && $x <= 329){
        $y = 7;                   
    }
    else if($x >=329){
        $y = 8;                   
    }
    return [
        'titulo' => $faker->text(30),
        'materiais' => $faker->text(50),
        'metodo' => $faker->text(150),
        'palavras_chave' => $faker->text(50),
        'autor' => $faker->name(),

        'area_atuacao' => $x,
        'area_conhecimento' => $y,

        'is_requisicao' => 0,
    ];
});
