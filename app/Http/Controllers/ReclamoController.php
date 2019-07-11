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

        $soportereclamo=null;
        if(request()->hasFile('soportereclamo'))
        {
            $reclamo = request()->file('soportereclamo');
            $soportereclamo= time()."_1SoporteReclamo_".$reclamo->getClientOriginalName();
            $reclamo->move($folder,$soportereclamo);            
        }

        $e=([
            'estado'=> 'Reclamado',
        ]);
        $solicitud->update($e);

        Reclamo::create([
            'id_solicitud' => $solicitud->idsolicitud,
            'contenido' => $data['reclamo'],
            'soporte' => $soportereclamo,
            'estado' => 'Enviado',
            'ruta' => $folder
        ]);

        return redirect()->route('solicitudes');

    }

    public function aprobar(Reclamo $reclamo){
        $data=request()->all();

        $soportejustificacion=null;
        if(request()->hasFile('soportejustificacion'))
        {
            $aceptado = request()->file('soportejustificacion');
            $soportejustificacion= time()."_1SoportejustificacionAceptado_".$aceptado->getClientOriginalName();
            $aceptado->move($reclamo->ruta,$soportejustificacion);            
        }

        $solicitud=$reclamo->Solicitud();

        $s=([
            'puntos_asignados' => $solicitud->puntos_aprox,
            'observaciones' => ''
        ]);

        $solicitud->update($s);

        $e=([
            'estado'=> 'Aprobado',
            'soporte_respuesta' => $soportejustificacion,
            'respuesta' => $data['justificacion'],
        ]);
        $reclamo->update($e);
        return redirect()->route('revisarreclamos');
    }

    public function aprobarbonificacion(Reclamo $reclamo){
        $data=request()->all();

        if(request()->hasFile('soportejustificacion'))
        {
            $aceptado = request()->file('soportejustificacion');
            $soportejustificacion= time()."_1SoportejustificacionAceptado_".$aceptado->getClientOriginalName();
            $aceptado->move($reclamo->ruta,$soportejustificacion);            
        }

        $solicitud=$reclamo->Solicitud();

        $s=([
            'bonificacion_asignada' => $solicitud->bonificacion_calculada,
            'observaciones' => ''
        ]);

        $solicitud->update($s);

        $e=([
            'estado'=> 'Aprobado',
            'soporte_respuesta' => $soportejustificacion,
            'respuesta' => $data['justificacion'],
        ]);
        $reclamo->update($e);
        return redirect()->route('revisarreclamos');
    }

    public function rechazar(Reclamo $reclamo){
        $data=request()->all();

        if(request()->hasFile('soportejustificacion'))
        {
            $aceptado = request()->file('soportejustificacion');
            $soportejustificacion= time()."_1SoportejustificacionRechazado_".$aceptado->getClientOriginalName();
            $aceptado->move($reclamo->ruta,$soportejustificacion);            
        }

        $solicitud=$reclamo->Solicitud();

        $s=([
            'observaciones' => ''
        ]);

        $solicitud->update($s);

        $e=([
            'estado'=> 'Rechazado',
            'soporte_respuesta' => $soportejustificacion,
            'respuesta' => $data['justificacion'],
        ]);
        $reclamo->update($e);
        return redirect()->route('revisarreclamos');
    }
}
