<?php
use App\Docente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DocenteSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Docente::create([
            'NombreCompleto'=>'RafaelCamelo',
            'tipoIdentificacion_id'=>1,
            'Identificacion'=>'1065846150',
            'dedicacion_id' =>1,
            'Departamento'=>1,
            'grupoInvestigacion_id'=>1,
            'categoria_id'=>1,
            'Correo'=>'rafaelgcamelo@gmail.com',
            'Telefono' =>'3042136318',
        ]);

        Docente::create([
            'NombreCompleto'=>'RafaelCamelo',
            'tipoIdentificacion_id'=>1,
            'Identificacion'=>'1065846150',
            'dedicacion_id' =>1,
            'Departamento'=>1,
            'grupoInvestigacion_id'=>1,
            'categoria_id'=>1,
            'Correo'=>'rafaelgcamelo@gmail.com',
            'Telefono' =>'3042136318',
        ]);

    }
}
