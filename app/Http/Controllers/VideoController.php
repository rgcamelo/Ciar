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
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 


        $pa=round($pa=$video->puntaje(),3);
        $convocatoria=auth()->user()->convocatoria()->first();
        $video->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria,'Enviado');

        return redirect()->route('solicitudes');
    }

    public function guardar(){
        $d=auth()->user()->Docente();

        $data=request()->all();

        //dd($data);
        $tipo=null;
        if(isset($data['tipo'])){
            $tipo=$data['tipo'];
        }

        $impacto=null;
        if(isset($data['impacto'])){
            $impacto=$data['impacto'];
        }

        $video=Video::create([
            'tipo' => $tipo,
            'impacto' => $impacto,
            'noautores_video' => $data['noautores'],
        ]);
        

        $productividad=$video->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 



        $convocatoria=auth()->user()->convocatoria()->first();
        $video->solicitud($productividad->idproductividad, 0, $convocatoria->idconvocatoria,'Incompleta');

        return redirect()->route('productividades');
    }
}
