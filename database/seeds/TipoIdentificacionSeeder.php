<?php
use App\TipoIdentificacion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TipoIdentificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoIdentificacion::create([
            'TipoIdentificacion' => 'Cedula',
        ]);

        TipoIdentificacion::create([
            'TipoIdentificacion' => 'Cedula Extranjera',
        ]);
    }
}
