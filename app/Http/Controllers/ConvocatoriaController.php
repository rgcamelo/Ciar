<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Convocatoria;

class ConvocatoriaController extends Controller
{
    function nuevo(){
        $convocatoria = DB::table('convocatorias')
            ->where('convocatorias.estado','=','Actual')
            ->take(1)->get();
        $solicituds = DB::table('solicituds')
            ->count();
        $aprobado = DB::table('solicituds')
            ->where('solicituds.estado','=','Aprobado')
            ->orWhere('solicituds.estado','=','Aprobado2')
            ->count();
        $reprobado = DB::table('solicituds')
            ->where('solicituds.estado','=','No Aprobado')
            ->orWhere('solicituds.estado','=','Rechazado2')
            ->count();

        //dd($convocatoria);
        return view('admin.convocatoria',compact('convocatoria','reprobado','aprobado','solicituds'));
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

        $convocatoria = DB::table('convocatorias')
            ->where('convocatorias.estado','=','Actual')
            ->take(1)->get();

        $solicituds = DB::table('solicituds')
            ->count();
        
        $aprobado = DB::table('solicituds')
            ->where('solicituds.estado','=','Aprobado')
            ->orWhere('solicituds.estado','=','Aprobado2')
            ->count();
        
        $reprobado = DB::table('solicituds')
            ->where('solicituds.estado','=','No Aprobado')
            ->orWhere('solicituds.estado','=','Rechazado2')
            ->count();

        
        return view('admin.convocatoria',compact('convocatoria','reprobado','aprobado','solicituds'));
    }
}
