<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traduccion;

class TraduccionController extends Controller
{
    public function nuevo(){
        return view('admin.traduccion');
    }

    public function crear(){
        $d=auth()->user()->Docente();

        $data=request()->all();

        //dd($data);
        
        $traduccion=Traduccion::create([
            'noautores' => $data['noautores'],
        ]);
        

        $productividad=$traduccion->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $pa=round($pa=$traduccion->puntaje(),3);
        $convocatoria=auth()->user()->convocatoria()->first();
        $traduccion->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria,'Enviado');

        return redirect()->route('solicitudes');
    }

    public function guardar(){
        $d=auth()->user()->Docente();

        $data=request()->all();

        //dd($data);

        $traduccion=Traduccion::create([
            'tipo' => $data['tipo'],
            'noautores' => $data['noautores'],
        ]);
        

        $productividad=$traduccion->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $convocatoria=auth()->user()->convocatoria()->first();
        $traduccion->solicitud($productividad->idproductividad, 0, $convocatoria->idconvocatoria,'Incompleta');

        return redirect()->route('productividades');
    }
}
