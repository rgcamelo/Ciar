<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProduccionTecnica;

class ProduccionTecnicaController extends Controller
{
    public function nuevo(){
        return view('admin.producciontecnica');
    }

    public function crear(){
        $d=auth()->user()->Docente();

        $data=request()->all();

        //dd($data);
        
        $producciontecnica=ProduccionTecnica::create([
            'tipo' => $data['tipo'],
            'noautores' => $data['noautores'],
        ]);
        

        $productividad=$producciontecnica->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $pa=round($pa=$producciontecnica->puntaje(),3);
        $convocatoria=auth()->user()->convocatoria()->first();
        $producciontecnica->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria,'Enviado');

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
        $producciontecnica=ProduccionTecnica::create([
            'tipo' => $tipo,
            'noautores' => $data['noautores'],
        ]);
        

        $productividad=$producciontecnica->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $convocatoria=auth()->user()->convocatoria()->first();
        $producciontecnica->solicitud($productividad->idproductividad, 0, $convocatoria->idconvocatoria,'Incompleta');

        return redirect()->route('productividades');
    }
}
