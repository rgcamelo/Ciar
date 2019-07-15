<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{
    public function nuevo(){
        return view('admin.video');
    }

    public function crear(){
        $d=auth()->user()->Docente();

        $data=request()->all();

        //dd($data);
        
        $video=Video::create([
            'tipo' => $data['tipo'],
            'impacto' => $data['impacto'],
            'noautores_video' => $data['noautores'],
        ]);
        

        $productividad=$video->productividad()->create([
            'id_docente' => $d->id,
            'titulo' => $data['titulo'],
        ]); 

        $pa=$video->puntaje();
        $convocatoria=auth()->user()->convocatoria()->first();
        $video->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria);

        return redirect()->route('dashboard');
    }
}
