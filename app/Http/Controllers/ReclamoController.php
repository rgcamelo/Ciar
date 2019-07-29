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
        $prodoc=DocenteProductividad::find($d->Productividad());
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
        //$this->restarp($solicitud,$prodoc);
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

    public function restarp(Solicitud $solicitud, DocenteProductividad $prodoc){

        switch ($solicitud->Productividad()->Tipo()) {
            case 'App\Software':
            $valor=$prodoc->software;
            $e=([
                'software' => $valor-1
            ]);
            $prodoc->update($e);
            break;
            case 'App\Libro':
            $valor=$prodoc->libro;
            $e=([
                'libro' => $valor-1
            ]);
            $prodoc->update($e);
            break;
            case 'App\Articulo':
            $valor=$prodoc->articulo;
            $e=([
                'articulo' => $valor-1
            ]);
            $prodoc->update($e);
            break;
            case 'App\Ponencia':
            $valor=$prodoc->ponencia;
            $e=([
                'ponencia' => $valor-1
            ]);
            $prodoc->update($e);
            break;
            case 'App\Video':
            if ($solicitud->bonificacion_calculada == null) {
                $valor=$prodoc->videos;
            $e=([
                'videos' => $valor-1
            ]);
            $prodoc->update($e);
            }
            else {
                $valor=$prodoc->videosbon;
            $e=([
                'videosbon' => $valor-1
            ]);
            $prodoc->update($e);
            }
            break;
            case 'App\Premios_Nacionales':
            $valor=$prodoc->premios;
            $e=([
                'premios' => $valor-1
            ]);
            $prodoc->update($e);
            break;
            case 'App\Patente':
            $valor=$prodoc->patentes;
            $e=([
                'patentes' => $valor-1
            ]);
            $prodoc->update($e);
            break;
            case 'App\Traduccion':
            if ($solicitud->bonificacion_calculada == null) {
                $valor=$prodoc->traducciones;
            $e=([
                'traducciones' => $valor-1
            ]);
            $prodoc->update($e);
            }
            else {
                $valor=$prodoc->traduccionesbon;
            $e=([
                'traduccionesbon' => $valor-1
            ]);
            $prodoc->update($e);
            }
            break;
            case 'App\Obra':
            if ($solicitud->bonificacion_calculada == null) {
                $valor=$prodoc->obras;
            $e=([
                'obras' => $valor-1
            ]);
            $prodoc->update($e);
            }
            else {
                $valor=$prodoc->obrasbon;
            $e=([
                'obrasbon' => $valor-1
            ]);
            $prodoc->update($e);
            }
            break;
            case 'App\ProduccionTecnica':
            $valor=$prodoc->producciontecnica;
            $e=([
                'producciontecnica' => $valor-1
            ]);
            $prodoc->update($e);
            break;
            case 'App\EstudiosPostdoctorales':
            $valor=$prodoc->estudios;
            $e=([
                'estudios' => $valor-1
            ]);
            $prodoc->update($e);
            break;
            case 'App\PublicacionImpresa':
            $valor=$prodoc->publicacion;
            $e=([
                'publicacion' => $valor-1
            ]);
            $prodoc->update($e);
            break;
            case 'App\ReseñasCriticas':
            $valor=$prodoc->reseñas;
            $e=([
                'reseñas' => $valor-1
            ]);
            $prodoc->update($e);
            break;
            case 'App\DireccionTesis':
            $valor=$prodoc->direccion;
            $e=([
                'direccion' => $valor-1
            ]);
            $prodoc->update($e);
            break;
            default:
                # code...
                break;
        }
    }
}
