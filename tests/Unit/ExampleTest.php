<?php

namespace Tests\Unit;

use App\Articulo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A1',
            'tipo_publicacion' => 'Articulo Tradicional',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 1 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $this->assertSame(15,$puntaje);
    }
}
