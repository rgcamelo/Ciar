<?php

use App\Software;
use App\Productividad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $software=Software::create([
            'autores' => 'Rafael'
        ]);

        $software->productividad()->create(['titulo' => 'Ciarp']);      
    }
}
