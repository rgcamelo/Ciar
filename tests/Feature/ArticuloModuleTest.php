<?php

namespace Tests\Feature;

use App\Articulo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticuloModuleTest extends TestCase
{
    /** @test */
    public function ArticuloTradicionalA1menos3()
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

    /** @test */
    public function ArticuloTradicionalA1menos5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A1',
            'tipo_publicacion' => 'Articulo Tradicional',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 4 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $this->assertSame(7.5,$puntaje);
    }

    /** @test */
    public function ArticuloTradicionalA1mas5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A1',
            'tipo_publicacion' => 'Articulo Tradicional',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 6 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $this->assertSame(5,$puntaje);
    }

    /** @test */
    public function ArticuloTradicionalA2menos3()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A2',
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
        $this->assertSame(12,$puntaje);
    }

    /** @test */
    public function ArticuloTradicionalA2menos5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A2',
            'tipo_publicacion' => 'Articulo Tradicional',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 4 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $this->assertSame(6,$puntaje);
    }

    /** @test */
    public function ArticuloTradicionalA2mas5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A2',
            'tipo_publicacion' => 'Articulo Tradicional',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 6 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $this->assertSame(4,$puntaje);
    }

    /** @test */
    public function ArticuloTradicionalBmenos3()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'B',
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
        $this->assertSame(8,$puntaje);
    }

    /** @test */
    public function ArticuloTradicionaBmenos5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'B',
            'tipo_publicacion' => 'Articulo Tradicional',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 4 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $this->assertSame(4,$puntaje);
    }

    /** @test */
    public function ArticuloTradicionalBmas5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'B',
            'tipo_publicacion' => 'Articulo Tradicional',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 6 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(2.667,$puntaje);
    }

    /** @test */
    public function ArticuloTradicionalCmenos3()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'C',
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
        $this->assertSame(3,$puntaje);
    }

    /** @test */
    public function ArticuloTradicionaCmenos5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'C',
            'tipo_publicacion' => 'Articulo Tradicional',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 4 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $this->assertSame(1.5,$puntaje);
    }

    /** @test */
    public function ArticuloTradicionalCmas5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'C',
            'tipo_publicacion' => 'Articulo Tradicional',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 6 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $this->assertSame(1,$puntaje);
    }

    //ARTICULO CORTO //

    /** @test */
    public function ArticuloCortoA1menos3()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A1',
            'tipo_publicacion' => 'Articulo Corto',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 1 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $this->assertSame(9.0,$puntaje);
    }

    /** @test */
    public function ArticuloCortoA1menos5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A1',
            'tipo_publicacion' => 'Articulo Corto',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 4 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $this->assertSame(4.5,$puntaje);
    }

    /** @test */
    public function ArticuloCortoA1mas5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A1',
            'tipo_publicacion' => 'Articulo Corto',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 6 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $this->assertSame(3.0,$puntaje);
    }

    /** @test */
    public function ArticuloCortoA2menos3()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A2',
            'tipo_publicacion' => 'Articulo Corto',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 1 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(7.2,$puntaje);
    }

    /** @test */
    public function ArticuloCortoA2menos5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A2',
            'tipo_publicacion' => 'Articulo Corto',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 4 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(3.6,$puntaje);
    }

    /** @test */
    public function ArticuloCortoA2mas5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A2',
            'tipo_publicacion' => 'Articulo Corto',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 6 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $this->assertSame(2.4,$puntaje);
    }

    /** @test */
    public function ArticuloCortoBmenos3()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'B',
            'tipo_publicacion' => 'Articulo Corto',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 1 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $this->assertSame(4.8,$puntaje);
    }

    /** @test */
    public function ArticuloCortoBmenos5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'B',
            'tipo_publicacion' => 'Articulo Corto',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 4 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $this->assertSame(2.4,$puntaje);
    }

    /** @test */
    public function ArticuloCortoBmas5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'B',
            'tipo_publicacion' => 'Articulo Corto',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 6 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(1.6,$puntaje);
    }

    /** @test */
    public function ArticuloCortoCmenos3()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'C',
            'tipo_publicacion' => 'Articulo Corto',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 1 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(1.8,$puntaje);
    }

    /** @test */
    public function ArticuloCortoCmenos5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'C',
            'tipo_publicacion' => 'Articulo Corto',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 4 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(0.9,$puntaje);
    }

    /** @test */
    public function ArticuloCortoCmas5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'C',
            'tipo_publicacion' => 'Articulo Corto',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 6 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(0.6,$puntaje);
    }

    //Otro Tipo de Articulos 

    /** @test */
    public function ArticuloOtroA1menos3()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A1',
            'tipo_publicacion' => 'Reporte de Caso',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 1 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(4.5,$puntaje);
    }

    /** @test */
    public function ArticuloOtroA1menos5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A1',
            'tipo_publicacion' => 'Reporte de Caso',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 4 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(2.25,$puntaje);
    }

    /** @test */
    public function ArticuloOtroA1mas5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A1',
            'tipo_publicacion' => 'Reporte de Caso',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 6 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(1.5,$puntaje);
        
    }

    /** @test */
    public function ArticuloOtroA2menos3()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A2',
            'tipo_publicacion' => 'Reporte de Caso',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 1 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(3.6,$puntaje);
    }

    /** @test */
    public function ArticuloOtroA2menos5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A2',
            'tipo_publicacion' => 'Reporte de Caso',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 4 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(1.8,$puntaje);
    }

    /** @test */
    public function ArticuloOtroA2mas5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'A2',
            'tipo_publicacion' => 'Reporte de Caso',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 6 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(1.2,$puntaje);
        
    }

    /** @test */
    public function ArticuloOtroBmenos3()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'B',
            'tipo_publicacion' => 'Reporte de Caso',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 1 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(2.4,$puntaje);
    }

    /** @test */
    public function ArticuloOtroBmenos5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'B',
            'tipo_publicacion' => 'Reporte de Caso',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 4 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(1.2,$puntaje);
    }

    /** @test */
    public function ArticuloOtroBmas5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'B',
            'tipo_publicacion' => 'Reporte de Caso',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 6 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(0.8,$puntaje);
        
    }

    /** @test */
    public function ArticuloOtroCmenos3()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'C',
            'tipo_publicacion' => 'Reporte de Caso',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 1 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(0.9,$puntaje);
    }

    /** @test */
    public function ArticuloOtroCmenos5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'C',
            'tipo_publicacion' => 'Reporte de Caso',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 4 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(0.45,$puntaje);
    }

    /** @test */
    public function ArticuloOtroCmas5()
    {
        $time=time();

        $articulo=Articulo::create([
            'fechapublicacion_articulo' => date('Y-m-d',$time),
            'tiporevista' => 'C',
            'tipo_publicacion' => 'Reporte de Caso',
            'nombrerevista' => 'rafa' ,
            'issn' => 'rafa' ,
            'idioma_articulo' => 'Español' ,
            'noautores_articulo' => 6 ,
            'evidenciafiliacionUpc' => 'si' ,
            'puntos_solicitados' => 1 ,
            'bonificacion_solicitada' => 1
        ]);

        $puntaje=$articulo->puntaje2();
        $puntaje=round($puntaje,3);
        $this->assertSame(0.3,$puntaje);
        
    }
}
