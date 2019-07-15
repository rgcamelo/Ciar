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
            'id_docente' => $d->id,
            'titulo' => $data['titulo'],
        ]); 

        $pa=$direccion->puntaje();
        $convocatoria=auth()->user()->convocatoria()->first();
        $direccion->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria);

        return redirect()->route('dashboard');
    }
}
