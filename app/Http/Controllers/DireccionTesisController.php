<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DireccionTesis;

class DireccionTesisController extends Controller
{
    public function nuevo(){
        return view('admin.direccion');
    }

    public function crear(){
        $d=auth()->user()->Docente();

        $data=request()->all();

        //dd($data);
        
        $direccion=DireccionTesis::create([
            'tipo' => $data['tipo'],
            'noautores' => $data['noautores'],
        ]);
        

        $productividad=$direccion->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 
        $pa=round($pa=$direccion->puntaje(),3);
        $convocatoria=auth()->user()->convocatoria()->first();
        $direccion->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria,'Enviado');

        return redirect()->route('solicitudes');
    }

    public function guardar(){
        $d=auth()->user()->Docente();

        $data=request()->all();
        
        $tipo=null;
            if(isset($data['tipo'])){
            $tipo=$data['tipo'];
            }
        
    
        $direccion=DireccionTesis::create([
            'tipo' => $tipo,
            'noautores' => $data['noautores'],
        ]);
        

        $productividad=$direccion->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $convocatoria=auth()->user()->convocatoria()->first();
        $direccion->solicitud($productividad->idproductividad, 0, $convocatoria->idconvocatoria,'Incompleta');

        return redirect()->route('productividades');
    }
}
