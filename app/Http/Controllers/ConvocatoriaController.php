<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Convocatoria;

class ConvocatoriaController extends Controller
{
    function nuevo(){
            return view('admin.convocatoria');
    }
    function convocatoria(){
        $c=auth()->user()->convocatoria()->first();

        $convocatoria = DB::table('convocatorias')
            ->where('convocatorias.estado','=','Actual')
            ->take(1)->get();
        $solicituds = DB::table('solicituds')
        ->join('convocatorias','solicituds.idconvocatoria','=','convocatorias.idconvocatoria')
            ->where('convocatorias.idconvocatoria','=',$c->idconvocatoria)
            ->count();
        $aprobado = DB::table('solicituds')
        ->join('convocatorias','solicituds.idconvocatoria','=','convocatorias.idconvocatoria')
        ->where('convocatorias.idconvocatoria','=',$c->idconvocatoria)
            ->where('solicituds.estado','=','Aprobado')
            ->orWhere('solicituds.estado','=','Aprobado2')
            ->count();
        $reprobado = DB::table('solicituds')
        ->join('convocatorias','solicituds.idconvocatoria','=','convocatorias.idconvocatoria')
            ->where('convocatorias.idconvocatoria','=',$c->idconvocatoria)
            ->where('solicituds.estado','=','No Aprobado')
            ->orWhere('solicituds.estado','=','Rechazado2')
            ->count();

        //dd($convocatoria);
        return view('admin.convocatoria2',compact('convocatoria','reprobado','aprobado','solicituds'));
    }

    public function crear(){
        $data=request()->all();
        //dd($data);
        Convocatoria::create([
            'titulo' => $data['titulo'],
            'fecha_inicio' => $data['fechainicio'],
            'fecha_final' => $data['fechafinal'],
            'estado' => 'Actual',
        ]);
        
        return view('admin.dashboard');
    }

    public function cerrar(Convocatoria $convocatoria){

        $solicituds = DB::table('solicituds')
            ->join('convocatorias','solicituds.idconvocatoria','=','convocatorias.idconvocatoria')
            ->where('convocatorias.idconvocatoria','=',$convocatoria->idconvocatoria)
            ->count();
        $aprobado = DB::table('solicituds')
        ->join('convocatorias','solicituds.idconvocatoria','=','convocatorias.idconvocatoria')
            ->where('convocatorias.idconvocatoria','=',$convocatoria->idconvocatoria)
            ->where('solicituds.estado','=','Aprobado')
            ->orWhere('solicituds.estado','=','Aprobado2')
            ->count();
        $reprobado = DB::table('solicituds')
        ->join('convocatorias','solicituds.idconvocatoria','=','convocatorias.idconvocatoria')
            ->where('convocatorias.idconvocatoria','=',$convocatoria->idconvocatoria)
            ->where('solicituds.estado','=','No Aprobado')
            ->orWhere('solicituds.estado','=','Rechazado2')
            ->count();

        
        $e=([
            'solicitudes' => $solicituds,
            'estado' => 'Cerrada',
            'aprobadas' => $aprobado,
            'rechazadas' => $reprobado
        ]);

        $convocatoria->update($e);
        return view('admin.dashboard');
    }

    
}
