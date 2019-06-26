<?php

namespace App\Http\Controllers;
use App\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Solicitud;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        
        return view ('admin.dashboard');
    }

    public function solicitudes(){
        $solicitudes = DB::table('solicituds')
            ->join('productividads', 'solicituds.id', '=', 'productividads.id')
            ->select('solicituds.*', 'productividads.titulo')->where('productividads.id_docente','=',auth()->user()->docente()->id )
            ->get();
        return view ('admin.missolicitudes',compact('solicitudes'));
    }

    public function productividades(){
        $productividades = DB::table('productividads')
            ->join('solicituds', 'solicituds.id', '=', 'productividads.id')
            ->join('software', 'software.id', '=', 'productividads.productividadable_id')
            ->join('soporte_software', 'soporte_software.id_software','=','software.id')
            ->select('productividads.*', 'software.*', 'soporte_software.*','solicituds.*')->where('productividads.id_docente','=',auth()->user()->docente()->id )
            ->get();

        return view ('admin.miproductividad',compact('productividades'));
    }
}
