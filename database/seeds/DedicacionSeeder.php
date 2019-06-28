<?php

use Illuminate\Database\Seeder;
use App\Dedicacion;

class DedicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dedicacion::create([
            'Tipo' => 'Tiempo Completo',
        ]);

        Dedicacion::create([
            'Tipo' => 'Medio Tiempo',
        ]);

    }
}
