<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstudiosPostdoctorales;

class EstudiosPostdoctoralesController extends Controller
{
    public function nuevo(){
        return view('admin.estudiospostdoctorales');
    }

    public function crear(){
        $d=auth()->user()->Docente();

        $data=request()->all();

        //dd($data);
        
        $estudio=EstudiosPostdoctorales::create([
        ]);
        

        $productividad=$estudio->productividad()->create([
            'id_docente' => $d->id,
            'titulo' => $data['titulo'],
        ]); 

        $pa=$estudio->puntaje();
        $convocatoria=auth()->user()->convocatoria()->first();
        $estudio->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria);

        return redirect()->route('dashboard');
    }
}
