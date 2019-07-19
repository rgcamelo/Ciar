<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Convocatoria;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
class PdfController extends Controller
{
    public function acta(Convocatoria $convocatoria){

        $solicitudes = DB::table('solicituds')
            ->join('productividads', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->select('solicituds.*', 'productividads.titulo','docentes.*')
            ->where('solicituds.idconvocatoria','=',$convocatoria->idconvocatoria)
            ->get();

            $solicitudes=$solicitudes->sortByDesc('idsolicitud');
            $pdf = PDF::loadView('pdf.actasolicitudes',compact('solicitudes'));
        return $pdf->download('ActaSolicitudes.pdf');
        
    }

    public function aprobadas(Convocatoria $convocatoria){

        $solicitudes = DB::table('solicituds')
            ->join('productividads', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->select('solicituds.*', 'productividads.titulo','docentes.*')
            ->where('solicituds.idconvocatoria','=',$convocatoria->idconvocatoria)
            ->where('solicituds.estado','=','Aprobado')
            ->get();

            $solicitudes=$solicitudes->sortByDesc('idsolicitud');
            $pdf = PDF::loadView('pdf.actasolicitudes',compact('solicitudes'));
        return $pdf->download('SolicitudesAprobadas.pdf');
        
    }

    public function reprobadas(Convocatoria $convocatoria){

        $solicitudes = DB::table('solicituds')
            ->join('productividads', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->select('solicituds.*', 'productividads.titulo','docentes.*')
            ->where('solicituds.idconvocatoria','=',$convocatoria->idconvocatoria)
            ->where('solicituds.estado','=','No Aprobado')
            ->get();

            $solicitudes=$solicitudes->sortByDesc('idsolicitud');
            $pdf = PDF::loadView('pdf.actasolicitudes',compact('solicitudes'));
        return $pdf->download('SolicitudesNoAprobadas.pdf');
        
    }
}
