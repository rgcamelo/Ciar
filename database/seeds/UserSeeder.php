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
        $docente= Docente::find(1);
        User::create([
            'id_docente' => $docente->id,
            'email'=> 'rafaelguillermock@gmail.com',
            'password'=> bcrypt('laravel'),
        ]);
    }
}
