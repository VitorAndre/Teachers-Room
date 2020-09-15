<?php

use Illuminate\Database\Seeder;
use App\Model\AreaConhecimento;

class AreaConhecimentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //Preenche a Tabela Area Conhecimento
    public function run()
    {
        AreaConhecimento::insert([
        'nome' => 'Ciências Exatas e da Terra',
        ]);
        
        AreaConhecimento::insert([
        'nome' => 'Ciências Biológicas',
        ]);
        
        AreaConhecimento::insert([
        'nome' => 'Engenharias',
        ]);
        
        AreaConhecimento::insert([
        'nome' => 'Ciências da Saúde',
        ]);
        
        AreaConhecimento::insert([
        'nome' => 'Ciências Agrárias',
        ]);
        
        AreaConhecimento::insert([
        'nome' => 'Ciências Sociais Aplicadas',
        ]);
        
        AreaConhecimento::insert([
        'nome' => 'Ciências Humanas',
        ]);
        
        AreaConhecimento::insert([
        'nome' => 'Linguística, Letras e Artes',
        ]);
        
        
        
        
    }
}
