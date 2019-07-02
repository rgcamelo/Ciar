<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Chumper\Zipper\Zipper;
use App\Soporte_Software;
use Chumper\Zipper\Facades\Zipper as ChumperZipper;
use App\Articulo_Soporte;

class Descargar extends Controller
{
    public function comprimirDescargar(Soporte_Software $ruta)
    {
        
        //dd($ruta);
        /* Le indicamos en que carpeta queremos que se genere el zip y los comprimimos*/
        ChumperZipper::make(storage_path('app/public/'.$ruta->Zip.'.zip'))->add($ruta->Zip)->close();
        
        /* Por último, si queremos descarlos, indicaremos la ruta del archiv, su nombre
        y lo descargaremos*/
        return response()->download(storage_path('app/public/'.$ruta->Zip.'.zip'));
    }

    public function comprimirDescargarArticulo(Articulo_Soporte $ruta)
    {
        
        //dd($ruta);
        /* Le indicamos en que carpeta queremos que se genere el zip y los comprimimos*/
        ChumperZipper::make(storage_path('app/public/'.$ruta->Zip_articulo.'.zip'))->add($ruta->Zip_articulo)->close();
        
        /* Por último, si queremos descarlos, indicaremos la ruta del archiv, su nombre
        y lo descargaremos*/
        return response()->download(storage_path('app/public/'.$ruta->Zip_articulo .'.zip'));
    }
}
