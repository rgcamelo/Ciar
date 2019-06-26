<?php

use App\GrupoInvestigacion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Facultad;

class GrupoInvestigacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facultad= Facultad::find(1);
        GrupoInvestigacion::create([
            'Nombre' => 'Ciarp',
            'departamento_id' => $facultad->id,
        ]);
    }
}
