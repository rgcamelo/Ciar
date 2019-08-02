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
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $pa=round($pa=$obra->puntaje(),3);
        $convocatoria=auth()->user()->convocatoria()->first();
        $obra->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria,'Enviado');

        return redirect()->route('solicitudes');
    }

    public function guardar(){
        $d=auth()->user()->Docente();

        $data=request()->all();

        
        $tipo=null;
            if(isset($data['tipo'])){
            $tipo=$data['tipo'];
            }

        $obra=Obra::create([
            'tipo' => $tipo,
            'impacto' => $data['impacto'],
            'noautores' => $data['noautores'],
        ]);
        

        $productividad=$obra->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $convocatoria=auth()->user()->convocatoria()->first();
        $obra->solicitud($productividad->idproductividad, 0, $convocatoria->idconvocatoria,'Incompleta');
        return redirect()->route('productividades');
    }
}
