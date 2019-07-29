<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Premios_Nacionales;

class PremiosNacionalesController extends Controller
{
    public function nuevo(){
        return view('admin.premio');
    }

    public function crear(){
        $d=auth()->user()->Docente();

        $data=request()->all();

        //dd($data);
        
        $premio=Premios_Nacionales::create([
            'noautores' => $data['noautores'],
        ]);
        

        $productividad=$premio->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $pa=round($pa=$premio->puntaje(),3);
        $convocatoria=auth()->user()->convocatoria()->first();
        $premio->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria, 'Enviado');

        return redirect()->route('solicitudes');
    }
    
    public function guardar(){
        $d=auth()->user()->Docente();
        $data=request()->all();
        
        $premio=Premios_Nacionales::create([
            'noautores' => $data['noautores'],
        ]);
        
        $productividad=$premio->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 
        
        $pa=round($pa=$premio->puntaje(),3);
        $convocatoria=auth()->user()->convocatoria()->first();
        
        $premio->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria,'Incompleta');
        
        return redirect()->route('solicitudes');
    }
}
