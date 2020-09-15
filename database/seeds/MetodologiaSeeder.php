<?php

use Illuminate\Database\Seeder;
use App\Model\Metodologia;

class MetodologiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Define a qtd de posiçoes fakes gerados
        factory(Metodologia::class, 50)->create();
    }
}
