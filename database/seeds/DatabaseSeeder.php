<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(FacultadSeeder::class);
        $this->call(DepartamentoSeeder::class);
        //$this->call(DocenteSeeder::class);
        //$this->call(SoftwareSeeder::class);
        //$this->call(ArticuloSeeder::class);
        $this->call(GrupoInvestigacionSeeder::class);
        $this->call(TipoIdentificacionSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(UserSeeder::class);
    }
}
