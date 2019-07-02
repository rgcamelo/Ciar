<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
class SolicitudController extends Controller
{
    
    public function reprobar(Solicitud $solicitud){
        $e=([
            'estado'=> 'No Aprobado'
        ]);
        $solicitud->update($e);
        
        //Crear notificacion
        //dd($solicitud);
        //$solicitud->estado='Enviado a Pares';
        
        return redirect()->route('revisarsolicitudes');
    }
}
