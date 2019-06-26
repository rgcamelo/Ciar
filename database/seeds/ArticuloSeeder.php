<?php
use App\Revista;
use App\Productividad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $revista=Revista::create([
            'numeroAutores' => 5,
        ]);

        $revista->productividad()->create(['titulo' => 'Ciarp2']);    

        $revista=Revista::create([
            'numeroAutores' => 3,
        ]);

        $revista->productividad()->create(['titulo' => 'Ciarp3']); 
    }
}
