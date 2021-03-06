<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class Software extends Model
{
    protected $primaryKey = 'idsoftware';
    protected $fillable = [
        'titulo', 'noautores', 'autores', 'resultadoPares', 'titulares', 'creditoUpc', 'impactanivelU','codigo'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }

    public function solicitud($idp,$pa,$idc,$estado){
        $solicitud=Solicitud::create([
            'productividad_id' => $idp,
            'estado' => $estado,
            'puntos_aprox' => $pa,
            'idconvocatoria' => $idc,
            'fechasolicitud' => (date('Y-m-d'))
        ]);
        $solicitud->ProDoc();

        return $solicitud;
    }
    public function pdf($folder,$solicitud){
        $d=auth()->user()->Docente();

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

        $pdf = PDF::loadView('pdf.formulariosoftware',compact('data'));
        $pdf->save($folder.'/FormatoEnviadoSoftware'.$solicitud->idsolicitud.'.pdf');

        $e=([
            'formatoenviado' => 'FormatoEnviadoSoftware'.$solicitud->idsolicitud.'.pdf',
            'folder' => $folder
        ]);
        $solicitud->update($e);
    }

    public function miSoportes(){
        $a=Soporte_Software::where('id_software','=',$this->idsoftware)->firstOrFail();
        return $a;
    }

    public function puntaje(){
        if($this->noautores <= 3){
            return 15;
        }
        elseif($this->noautores <= 5){
            return 15/2;
        }
        else{
            return 15/($this->noautores/2);
        }
    }
}
