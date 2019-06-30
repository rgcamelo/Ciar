<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Chumper\Zipper\Zipper;
use App\Soporte_Software;
use Chumper\Zipper\Facades\Zipper as ChumperZipper;

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
}
