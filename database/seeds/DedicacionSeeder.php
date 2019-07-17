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
            'TipoDedicacion' => 'Tiempo Completo',
        ]);

        Dedicacion::create([
            'TipoDedicacion' => 'Medio Tiempo',
        ]);

    }
}
