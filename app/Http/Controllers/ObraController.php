<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obra;

class ObraController extends Controller
{
    public function nuevo(){
        return view('admin.obra');
    }

    public function crear(){
        $d=auth()->user()->Docente();

        $data=request()->all();

        //dd($data);
        
        $obra=Obra::create([
            'tipo' => $data['tipo'],
            'impacto' => $data['impacto'],
            'noautores' => $data['noautores'],
        ]);
        

        $productividad=$obra->productividad()->create([
            'id_docente' => $d->id,
            'titulo' => $data['titulo'],
        ]); 

        $pa=$obra->puntaje();
        $convocatoria=auth()->user()->convocatoria()->first();
        $obra->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria);

        return redirect()->route('dashboard');
    }
}
