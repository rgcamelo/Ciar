<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PublicacionImpresa;

class PublicacionImpresaController extends Controller
{
    public function nuevo(){
        return view('admin.publicacionimpresa');
    }

    public function crear(){
        $d=auth()->user()->Docente();

        $data=request()->all();

        //dd($data);
        
        $publicacion=PublicacionImpresa::create([
            'noautores' => $data['noautores'],
        ]);
        

        $productividad=$publicacion->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        
        $pa=round($pa=$publicacion->puntaje(),3);
        $convocatoria=auth()->user()->convocatoria()->first();
        $publicacion->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria);

        return redirect()->route('solicitudes');
    }

    public function guardar(){
        $d=auth()->user()->Docente();

        $data=request()->all();

        //dd($data);
        
        $publicacion=PublicacionImpresa::create([
            'noautores' => $data['noautores'],
        ]);
        

        $productividad=$publicacion->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        
        
        $convocatoria=auth()->user()->convocatoria()->first();
        $publicacion->solicitud($productividad->idproductividad, 0, $convocatoria->idconvocatoria,'Incompleta');

        return redirect()->route('productividades');
    }
}
