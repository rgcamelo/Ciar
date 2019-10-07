<?php

namespace Tests\Feature;

use App\Libro;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LibroModuleTest extends TestCase
{
    /** @test */
    public function LibroOtromenos3()
    {
        $time=time();

        $libro=Libro::create([
            'fecha_publicacion' =>date('Y-m-d',$time),
            'editorial' => 'Rafa',
            'tipo_libro' => 'Libro de texto' ,
            'isbn' => 'Rafa',
            'idioma' => 'Español',
            'noautores' => 1,
            'creditoUpc_libro' => 'si',
        ]);

        $puntaje=$libro->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(15.0,$puntaje);
    }

    /** @test */
    public function LibroOtromenos5()
    {
        $time=time();

        $libro=Libro::create([
            'fecha_publicacion' =>date('Y-m-d',$time),
            'editorial' => 'Rafa',
            'tipo_libro' => 'Libro de texto' ,
            'isbn' => 'Rafa',
            'idioma' => 'Español',
            'noautores' => 4,
            'creditoUpc_libro' => 'si',
        ]);

        $puntaje=$libro->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(7.5,$puntaje);
    }

    /** @test */
    public function LibroOtromas5()
    {
        $time=time();

        $libro=Libro::create([
            'fecha_publicacion' =>date('Y-m-d',$time),
            'editorial' => 'Rafa',
            'tipo_libro' => 'Libro de texto' ,
            'isbn' => 'Rafa',
            'idioma' => 'Español',
            'noautores' => 6,
            'creditoUpc_libro' => 'si',
        ]);

        $puntaje=$libro->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(5.0,$puntaje);
        
    }

    /** @test */
    public function LibroInvestigacionmenos3()
    {
        $time=time();

        $libro=Libro::create([
            'fecha_publicacion' =>date('Y-m-d',$time),
            'editorial' => 'Rafa',
            'tipo_libro' => 'Libro resultado de un labor de investigacion' ,
            'isbn' => 'Rafa',
            'idioma' => 'Español',
            'noautores' => 1,
            'creditoUpc_libro' => 'si',
        ]);

        $puntaje=$libro->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(20.0,$puntaje);
    }

    /** @test */
    public function LibroInvestigacionmenos5()
    {
        $time=time();

        $libro=Libro::create([
            'fecha_publicacion' =>date('Y-m-d',$time),
            'editorial' => 'Rafa',
            'tipo_libro' => 'Libro resultado de un labor de investigacion' ,
            'isbn' => 'Rafa',
            'idioma' => 'Español',
            'noautores' => 4,
            'creditoUpc_libro' => 'si',
        ]);

        $puntaje=$libro->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(10.0,$puntaje);
    }

    /** @test */
    public function LibroInvestigacionmas5()
    {
        $time=time();

        $libro=Libro::create([
            'fecha_publicacion' =>date('Y-m-d',$time),
            'editorial' => 'Rafa',
            'tipo_libro' => 'Libro resultado de un labor de investigacion' ,
            'isbn' => 'Rafa',
            'idioma' => 'Español',
            'noautores' => 6,
            'creditoUpc_libro' => 'si',
        ]);

        $puntaje=$libro->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(6.667,$puntaje);
        
    }
}
