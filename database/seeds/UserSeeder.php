<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //Cria usuarios fakes para testes
    public function run()
    {
        User::insert([
            'nome' => 'Admin',
            'matricula' => 7,
            'email' => 'admin@admin.com',
            'password' => bcrypt('74107410'),
            'is_admin' => 1,
            'is_registered' => 1,
            ]);
            
            User::insert([
                'nome' => 'Normal',
                'matricula' => 17,
                'email' => 'normal@normal.com',
                'password' => bcrypt('74107410'),
                'is_admin' => 0,
                'is_registered' => 1,
                ]);
                
    }
}
