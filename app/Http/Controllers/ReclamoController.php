<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use App\Reclamo;
use App\Productividad;
use Illuminate\Support\Facades\File;

class ReclamoController extends Controller
{
    public function reclamar (Solicitud $solicitud, Productividad $productividad){
        $d=auth()->user()->Docente();
        $data=request()->all();

        $folder = 'archivos/reclamos/'.$d->NombreCompleto.'_'.$d->id.'_'.$productividad['titulo'].'_'.time();
        File::makeDirectory($folder);

        if(request()->hasFile('soportereclamo'))
        {
            $reclamo = request()->file('soportereclamo');
            $soportereclamo= time()."_1SoporteReclamo_".$reclamo->getClientOriginalName();
            $reclamo->move($folder,$soportereclamo);            
        }

        Reclamo::create([
            'id_solicitud' => $solicitud->idsolicitud,
            'contenido' => $data['reclamo'],
            'soporte' => $soportereclamo,
            'estado' => 'Enviado'
        ]);

        return redirect()->route('solicitudes');

    }
}
