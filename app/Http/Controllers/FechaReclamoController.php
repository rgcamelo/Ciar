<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FechaReclamo;
use App\Convocatoria;

class FechaReclamoController extends Controller
{
    function nuevo(){
        return view('admin.fechareclamo');
    }
    
    public function crear(){
        $data=request()->all();
        $convocatoria=auth()->user()->convocatoria()->first();
        FechaReclamo::create([
            'titulo' => $data['titulo'],
            'idconvocatoria' => $convocatoria->idconvocatoria,
            'fecha_inicio' => $data['fechainicio'],
            'fecha_final' => $data['fechafinal'],
            'estado' => 'Actual',
        ]);
        
        return view('admin.dashboard');
    }

    public function cerrar(){
        
        $convocatoria=auth()->user()->convocatoria()->first();
        $reclamo=Convocatoria::find($convocatoria->idconvocatoria)->Reclamos();
        $r=FechaReclamo::find($reclamo->idfechareclamo);
        $r->update([
            'estado' => 'Finalizado',
        ]);

        return view('admin.dashboard');
    }

    
}
