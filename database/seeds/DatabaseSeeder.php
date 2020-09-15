<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

     //Chama os seeders utilizados
    public function run()
    {
        $this->call(AreaConhecimentoTableSeeder::class);
        $this->call(AreaAtuacaoTableSeeder::class);    
        $this->call(MetodologiaSeeder::class);    
        $this->call(UserSeeder::class);    
    }
}
