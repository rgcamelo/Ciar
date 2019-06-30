<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\ServiceProvider;
use App\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Solicitud;
use Dompdf\Dompdf;

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
            ->join('productividads', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->select('solicituds.*', 'productividads.titulo')->where('productividads.id_docente','=',auth()->user()->docente()->id )
            ->get();

    
        return view ('admin.missolicitudes',compact('solicitudes'));

        
        
    }

    public function productividades(){
        $productividades = collect();
        $Software = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('software', 'software.idsoftware', '=', 'productividads.productividadable_id')
            ->join('soporte_software', 'soporte_software.id_software','=','software.idsoftware')
            ->select('productividads.*', 'software.*', 'soporte_software.*','solicituds.*')->where('productividads.id_docente','=',auth()->user()->docente()->id )->where('productividads.productividadable_type','=','App\Software')
            ->get();
        
        $libros = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('libros', 'libros.idlibro', '=', 'productividads.productividadable_id')
            ->join('libro_soportes', 'libro_soportes.id_libro',"=", 'libros.idlibro')
            ->select('productividads.*','solicituds.*','libros.*','libro_soportes.*')->where('productividads.id_docente','=',auth()->user()->docente()->id)->where('productividads.productividadable_type','=','App\Libro')
            ->get();

        //$=array($libros,$Software);
        
        foreach($libros as $l){
            $productividades->push($l);
        }

        foreach($Software as $s){
            $productividades->push($s);
        }

        $productividades=$productividades->sortByDesc('idsolicitud');
        

        return view ('admin.miproductividad',compact('productividades'));
    }

    public function solicitudes2(){
        $productividades = DB::table('productividads')
        ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
        ->join('docentes', 'docentes.id', '=','productividads.id_docente')
        ->join('software', 'software.idsoftware', '=', 'productividads.productividadable_id')
        ->join('soporte_software', 'soporte_software.id_software','=','software.idsoftware')
        ->select('productividads.*', 'software.*', 'soporte_software.*','solicituds.*','docentes.*')
        ->get();

        //dd($productividades);
        
        

        return view ('admin.revisarsolicitudes',compact('productividades'));
    }
}
