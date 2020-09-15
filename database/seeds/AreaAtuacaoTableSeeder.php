<?php

use Illuminate\Database\Seeder;
use App\Model\AreaAtuacao;

class AreaAtuacaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Preenche a Tabela de Area de Atuacao atraves de um csv presente no sistema
        $arquivo = base_path("resources/csv/area_atuacao.csv");
        $csv = fopen($arquivo,"r");
        while (($data = fgetcsv($csv, 1000, ",")) !== FALSE) {
            AreaAtuacao::insert([
                "area_conhecimento_id" => $data[0],
                "nome" => $data[1],
            ]);            
        }
        fclose($csv);
    }
}
