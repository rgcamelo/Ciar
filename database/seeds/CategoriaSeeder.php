<?php
use App\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'NombreCategoria' => 'A1',
        ]);

        Categoria::create([
            'NombreCategoria' => 'A2',
        ]);
        Categoria::create([
            'NombreCategoria' => 'B',
        ]);

        Categoria::create([
            'NombreCategoria' => 'C',
        ]);

    }
}
