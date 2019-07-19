<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReseñasCriticas;

class ReseñasCriticasController extends Controller
{
    public function nuevo(){
        return view('admin.reseña');
    }

    public function crear(){
        $d=auth()->user()->Docente();

        $data=request()->all();

        //dd($data);
        
        $reseña=ReseñasCriticas::create([
            'noautores' => $data['noautores'],
        ]);
        

        $productividad=$reseña->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $reseña->ProDoc($productividad);
        $pa=round($pa=$reseña->puntaje(),3);
        $convocatoria=auth()->user()->convocatoria()->first();
        $reseña->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria);

        return redirect()->route('solicitudes');
    }
}
