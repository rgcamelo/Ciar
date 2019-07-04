<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use App\Libro;
use App\Software;

class SolicitudController extends Controller
{
    
    public function reprobar(Solicitud $solicitud){
        
        

        $data=request()->validate([
            'comentario'=>''
        ]);

        $e=([
            'estado'=> 'No Aprobado',
            'observaciones' => $data['comentario']
        ]);
        $solicitud->update($e);
        
        //Crear notificacion
        //dd($solicitud);
        //$solicitud->estado='Enviado a Pares';
        
        return redirect()->route('revisarsolicitudes');
    }

    public function calificar(Solicitud $solicitud){
        
        $data=request()->validate([
            'puntos_asignados' => '',
            'comentario' => ''
        ]);
        $e=([
            'estado'=> 'Aprobado',
            'puntos_asignados' => $data['puntos_asignados'],
            'observaciones' => $data['comentario']
        ]);
        $solicitud->update($e);
        
        //Crear notificacion
        return redirect()->route('revisarsolicitudes');
    }

    public function pares(Solicitud $solicitud){
        $e=([
            'estado'=> 'Enviado a Pares'
        ]);
        $solicitud->update($e);
        
        //Crear notificacion
        //dd($solicitud);
        //$solicitud->estado='Enviado a Pares';
        
        return redirect()->route('revisarsolicitudes');
    }

    public function calificarparessoft(Solicitud $solicitud, Software $software){
        
        $data=request()->validate([
            'resultadoPares' => ''
        ]);

        $software->update($data);
        $e=([
            'estado'=> 'Calificado por Pares'
        ]);
        $solicitud->update($e);
        
        //Crear notificacion
        return redirect()->route('revisarsolicitudes');
    }

    public function calificarpareslibro(Solicitud $solicitud, Libro $libro){
        
        $data=request()->validate([
            'resultadoPares' => ''
        ]);

        $libro->update($data);

        $e=([
            'estado'=> 'Calificado por Pares'
        ]);
        $solicitud->update($e);
        
        //Crear notificacion
        return redirect()->route('revisarsolicitudes');
    }
}
