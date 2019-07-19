<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patente;

class PatenteController extends Controller
{
    public function nuevo(){
        return view('admin.patente');
    }

    public function crear(){
        $d=auth()->user()->Docente();

        $data=request()->all();

        //dd($data);
       
        $patente=Patente::create([
            'noautores' => $data['noautores'],
        ]);
        

        $productividad=$patente->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $pa=round($pa=$patente->puntaje(),3);
        $convocatoria=auth()->user()->convocatoria()->first();
        $patente->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria);

        return redirect()->route('solicitudes');
    }
}