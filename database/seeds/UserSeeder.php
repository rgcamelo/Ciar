<?php
use Illuminate\Database\Seeder;
use App\User;
use App\Docente;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id_docente' =>1,
            'tipo' => 'Administrador',
            'email'=> 'rafaelguillermock@gmail.com',
            'password'=> bcrypt('laravel'),
        ]);

        User::create([
            'id_docente' =>2,
            'tipo' => 'Docente',
            'email'=> 'rafaelguillermo@gmail.com',
            'password'=> bcrypt('laravel'),
        ]);
    }
}
