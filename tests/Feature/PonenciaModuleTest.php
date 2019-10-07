<?php

namespace Tests\Feature;

use App\Ponencia;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PonenciaModuleTest extends TestCase
{
    /** @test */
    public function PonenciaInternacionalmenos3()
    {
        $time=time();

        $ponencia=Ponencia::create([
            'nombreevento' => 'Rafa',
            'fechaevento' => date('Y-m-d',$time),
            'lugarevento' => 'Rafa',
            'tipoevento' => 'Internacional',
            'idiomaponencia' => 'Español',
            'noautores_ponencia' => 1,
            'paginaevento' => 'www.rafa.com',
            'creditoUpc_ponencia' => 'si',
            'memorias' => 'si',
            'issn' => 'rafa',
            'isbn' => 'rafa',
            'ponenciasreconocidas' => 1,
        ]);

        $puntaje=$ponencia->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(84.0,$puntaje);
    }

    /** @test */
    public function PonenciaInternacionalmenos5()
    {
        $time=time();

        $ponencia=Ponencia::create([
            'nombreevento' => 'Rafa',
            'fechaevento' => date('Y-m-d',$time),
            'lugarevento' => 'Rafa',
            'tipoevento' => 'Internacional',
            'idiomaponencia' => 'Español',
            'noautores_ponencia' => 4,
            'paginaevento' => 'www.rafa.com',
            'creditoUpc_ponencia' => 'si',
            'memorias' => 'si',
            'issn' => 'rafa',
            'isbn' => 'rafa',
            'ponenciasreconocidas' => 1,
        ]);

        $puntaje=$ponencia->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(42.0,$puntaje);
    }

    /** @test */
    public function PonenciaInternacionalmas5()
    {
        $time=time();

        $ponencia=Ponencia::create([
            'nombreevento' => 'Rafa',
            'fechaevento' => date('Y-m-d',$time),
            'lugarevento' => 'Rafa',
            'tipoevento' => 'Internacional',
            'idiomaponencia' => 'Español',
            'noautores_ponencia' => 6,
            'paginaevento' => 'www.rafa.com',
            'creditoUpc_ponencia' => 'si',
            'memorias' => 'si',
            'issn' => 'rafa',
            'isbn' => 'rafa',
            'ponenciasreconocidas' => 1,
        ]);

        $puntaje=$ponencia->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(28.0,$puntaje);
    }

    //Nacional

    /** @test */
    public function PonenciaNacionalmenos3()
    {
        $time=time();

        $ponencia=Ponencia::create([
            'nombreevento' => 'Rafa',
            'fechaevento' => date('Y-m-d',$time),
            'lugarevento' => 'Rafa',
            'tipoevento' => 'Nacional',
            'idiomaponencia' => 'Español',
            'noautores_ponencia' => 1,
            'paginaevento' => 'www.rafa.com',
            'creditoUpc_ponencia' => 'si',
            'memorias' => 'si',
            'issn' => 'rafa',
            'isbn' => 'rafa',
            'ponenciasreconocidas' => 1,
        ]);

        $puntaje=$ponencia->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(48.0,$puntaje);
    }

    /** @test */
    public function PonenciaNacionalmenos5()
    {
        $time=time();

        $ponencia=Ponencia::create([
            'nombreevento' => 'Rafa',
            'fechaevento' => date('Y-m-d',$time),
            'lugarevento' => 'Rafa',
            'tipoevento' => 'Nacional',
            'idiomaponencia' => 'Español',
            'noautores_ponencia' => 4,
            'paginaevento' => 'www.rafa.com',
            'creditoUpc_ponencia' => 'si',
            'memorias' => 'si',
            'issn' => 'rafa',
            'isbn' => 'rafa',
            'ponenciasreconocidas' => 1,
        ]);

        $puntaje=$ponencia->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(24.0,$puntaje);
    }

    /** @test */
    public function PonenciaNacionalmas5()
    {
        $time=time();

        $ponencia=Ponencia::create([
            'nombreevento' => 'Rafa',
            'fechaevento' => date('Y-m-d',$time),
            'lugarevento' => 'Rafa',
            'tipoevento' => 'Nacional',
            'idiomaponencia' => 'Español',
            'noautores_ponencia' => 6,
            'paginaevento' => 'www.rafa.com',
            'creditoUpc_ponencia' => 'si',
            'memorias' => 'si',
            'issn' => 'rafa',
            'isbn' => 'rafa',
            'ponenciasreconocidas' => 1,
        ]);

        $puntaje=$ponencia->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(16.0,$puntaje);
    }

    //Regional

    /** @test */
    public function PonenciaRegionalmenos3()
    {
        $time=time();

        $ponencia=Ponencia::create([
            'nombreevento' => 'Rafa',
            'fechaevento' => date('Y-m-d',$time),
            'lugarevento' => 'Rafa',
            'tipoevento' => 'Regional',
            'idiomaponencia' => 'Español',
            'noautores_ponencia' => 1,
            'paginaevento' => 'www.rafa.com',
            'creditoUpc_ponencia' => 'si',
            'memorias' => 'si',
            'issn' => 'rafa',
            'isbn' => 'rafa',
            'ponenciasreconocidas' => 1,
        ]);

        $puntaje=$ponencia->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(24.0,$puntaje);
    }

    /** @test */
    public function PonenciaRegionalmenos5()
    {
        $time=time();

        $ponencia=Ponencia::create([
            'nombreevento' => 'Rafa',
            'fechaevento' => date('Y-m-d',$time),
            'lugarevento' => 'Rafa',
            'tipoevento' => 'Regional',
            'idiomaponencia' => 'Español',
            'noautores_ponencia' => 4,
            'paginaevento' => 'www.rafa.com',
            'creditoUpc_ponencia' => 'si',
            'memorias' => 'si',
            'issn' => 'rafa',
            'isbn' => 'rafa',
            'ponenciasreconocidas' => 1,
        ]);

        $puntaje=$ponencia->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(12.0,$puntaje);
    }

    /** @test */
    public function PonenciaRegionalmas5()
    {
        $time=time();

        $ponencia=Ponencia::create([
            'nombreevento' => 'Rafa',
            'fechaevento' => date('Y-m-d',$time),
            'lugarevento' => 'Rafa',
            'tipoevento' => 'Regional',
            'idiomaponencia' => 'Español',
            'noautores_ponencia' => 6,
            'paginaevento' => 'www.rafa.com',
            'creditoUpc_ponencia' => 'si',
            'memorias' => 'si',
            'issn' => 'rafa',
            'isbn' => 'rafa',
            'ponenciasreconocidas' => 1,
        ]);

        $puntaje=$ponencia->puntaje();
        $puntaje=round($puntaje,3);
        $this->assertSame(8.0,$puntaje);
    }
}
