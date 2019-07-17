<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use App\Libro;
use App\Software;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
{
    
    public function reprobar(Solicitud $solicitud){
        $data=request()->validate([
            'comentario'=>''
        ]);

        $e=([
            'estado'=> 'No Aprobado',
            'fechaCalificada' => (date('Y-m-d')),
            'observaciones' => $data['comentario']
        ]);
        $solicitud->update($e);
        $this->pdf($solicitud);
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
            'fechaCalificada' => (date('Y-m-d')),
            'puntos_asignados' => $data['puntos_asignados'],
            'observaciones' => $data['comentario']
        ]);
        $solicitud->update($e);

        $this->pdf($solicitud);

        //Crear notificacion
        return redirect()->route('revisarsolicitudes');
    }

    public function pdf($solicitud){
        $productividad=$solicitud->Productividad()->Tipo();

        $data = DB::table('docentes')
            ->join('productividads', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('dedicacions', 'docentes.dedicacion_id', '=','dedicacions.iddedicacion')
            ->join('departamentos', 'docentes.Departamento', '=','departamentos.iddepartamento')
            ->join('facultad', 'departamentos.facultad_id', '=','facultad.idfacultad')
            ->join('software', 'software.idsoftware', '=', 'productividads.productividadable_id')
            ->join('grupo_investigacions', 'docentes.grupoInvestigacion_id', '=','grupo_investigacions.idgrupo')
            ->join('categorias', 'categorias.idcategoria', '=','grupo_investigacions.categoria_id')

            ->select('docentes.*', 'productividads.*','dedicacions.*','departamentos.*','facultad.*','grupo_investigacions.*','categorias.*','solicituds.*','software.*')
            ->where('solicituds.idsolicitud','=',$solicitud->idsolicitud)
            ->get();

        switch ($productividad) {
            case 'App\Software':
            $pdf = PDF::loadView('pdf.formulariosoftware',compact('data'));
            $pdf->save($data->first()->folder.'/FormatoRecibidoSoftware'.$solicitud->idsolicitud.'.pdf');
                break;      
            default:
                # code...
                break;
        }
        

        $e=([
            'formatorecibido' => 'FormatoRecibidoSoftware'.$solicitud->idsolicitud.'.pdf',
        ]);
        $solicitud->update($e);
    }

    public function calificarbonificacion(Solicitud $solicitud){
        
        $data=request()->validate([
            'bonificacion' => '',
            'comentario' => ''
        ]);
        $e=([
            'fechaCalificada' => (date('Y-m-d')),
            'estado'=> 'Aprobado',
            'bonificacion_asignada' => $data['bonificacion'],
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
            'puntaje_par' => $data['resultadoPares'],
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
            'puntaje_par' => $data['resultadoPares'],
            'estado'=> 'Calificado por Pares'
        ]);
        $solicitud->update($e);
        
        //Crear notificacion
        return redirect()->route('revisarsolicitudes');
    }

    public function cancelar(Solicitud $solicitud){
        $e=([
            'estado'=> 'Cancelado'
        ]);
        $solicitud->update($e);
        return redirect()->route('solicitudes');
    }
}
