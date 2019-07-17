<?php

use App\Facultad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facultad::create([
            'nombreFacultad'=> 'Faculta de ciencias y tecnologia',
        ]);

    }
}
