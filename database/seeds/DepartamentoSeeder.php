<?php

use Illuminate\Database\Seeder;
use App\Departamento;
use App\Facultad;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facultad=Facultad::find(1);
        Departamento::create([
            'nombre'=> 'Departamento de tecnologia',
            'facultad_id' => $facultad->id,
        ]);
    }
}
