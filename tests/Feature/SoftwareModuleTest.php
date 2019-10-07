<?php

namespace Tests\Feature;

use App\Software;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SoftwareModuleTest extends TestCase
{
    /** @test */
    public function Softwaremenos3()
    {
        $software=Software::create([
            'autores' => 'Rafa',
            'noautores' => 1,
            'titulares' => 'Rafa',
            'creditoUpc' => 'si',
            'impactanivelU' =>'si',
            'codigo' => 'aca.jpg',
        ]);

        $puntaje=$software->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(15.0,$puntaje);
    }

    /** @test */
    public function Softwaremenos5()
    {
        $software=Software::create([
            'autores' => 'Rafa',
            'noautores' => 4,
            'titulares' => 'Rafa',
            'creditoUpc' => 'si',
            'impactanivelU' =>'si',
            'codigo' => 'aca.jpg',
        ]);

        $puntaje=$software->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(7.5,$puntaje);
    }

    /** @test */
    public function Softwaremas5()
    {
        $software=Software::create([
            'autores' => 'Rafa',
            'noautores' => 6,
            'titulares' => 'Rafa',
            'creditoUpc' => 'si',
            'impactanivelU' =>'si',
            'codigo' => 'aca.jpg',
        ]);

        $puntaje=$software->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(5.0,$puntaje);
    }



}
