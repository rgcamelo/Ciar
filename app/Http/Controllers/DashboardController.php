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
            ->select('solicituds.*', 'productividads.*')->where('productividads.id_docente','=',auth()->user()->docente()->id )
            ->get();

            $solicitudes=$solicitudes->sortByDesc('idsolicitud');
    
        return view ('admin.missolicitudes',compact('solicitudes'));

        
        
    }

    public function reclamos(){
        $reclamos = DB::table('solicituds')
            ->join('productividads', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('reclamos', 'reclamos.id_solicitud', '=', 'solicituds.idsolicitud')
            ->select('solicituds.*', 'productividads.*','reclamos.*')->where('productividads.id_docente','=',auth()->user()->docente()->id )
            ->get();

            $reclamos=$reclamos->sortByDesc('idsolicitud');
    
        return view ('admin.misreclamos',compact('reclamos'));

        
    }


    public function revisarreclamos(){
        $reclamos = DB::table('solicituds')
            ->join('productividads', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('reclamos', 'reclamos.id_solicitud', '=', 'solicituds.idsolicitud')
            ->join('docentes', 'docentes.id', '=','productividads.id_docente')
            ->select('solicituds.*', 'productividads.*','reclamos.*')
            ->get();

            $reclamos=$reclamos->sortByDesc('idsolicitud');
    
        return view ('admin.revisarreclamos',compact('reclamos'));
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

        $Articulos = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('articulos', 'articulos.id_articulo', '=', 'productividads.productividadable_id')
            ->join('articulo_soportes', 'articulo_soportes.idarticulo',"=", 'articulos.id_articulo')
            ->select('productividads.*','solicituds.*','articulos.*','articulo_soportes.*')->where('productividads.id_docente','=',auth()->user()->docente()->id)->where('productividads.productividadable_type','=','App\Articulo')
            ->get();

        $Ponencias = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('ponencias', 'ponencias.idponencia', '=', 'productividads.productividadable_id')
            ->join('ponencia_soportes', 'ponencia_soportes.idponencia',"=", 'ponencias.idponencia')
            ->select('productividads.*','solicituds.*','ponencias.*','ponencia_soportes.*')->where('productividads.id_docente','=',auth()->user()->docente()->id)->where('productividads.productividadable_type','=','App\Ponencia')
            ->get();
        //$=array($libros,$Software);
        
        foreach($Ponencias as $p){
            $productividades->push($p);
        }

        foreach($Articulos as $a){
            $productividades->push($a);
        }

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
        $productividades = collect();
        $Software = DB::table('productividads')
        ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
        ->join('docentes', 'docentes.id', '=','productividads.id_docente')
        ->join('software', 'software.idsoftware', '=', 'productividads.productividadable_id')
        ->join('soporte_software', 'soporte_software.id_software','=','software.idsoftware')
        ->select('productividads.*', 'software.*', 'soporte_software.*','solicituds.*','docentes.*')->where('productividads.productividadable_type','=','App\Software')
        ->get();

        $libros = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.id', '=','productividads.id_docente')
            ->join('libros', 'libros.idlibro', '=', 'productividads.productividadable_id')
            ->join('libro_soportes', 'libro_soportes.id_libro',"=", 'libros.idlibro')
            ->select('productividads.*','solicituds.*','libros.*','libro_soportes.*','docentes.*')->where('productividads.productividadable_type','=','App\Libro')
            ->get();

        $Articulos = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.id', '=','productividads.id_docente')
            ->join('articulos', 'articulos.id_articulo', '=', 'productividads.productividadable_id')
            ->join('articulo_soportes', 'articulo_soportes.idarticulo',"=", 'articulos.id_articulo')
            ->select('productividads.*','solicituds.*','articulos.*','articulo_soportes.*','docentes.*')->where('productividads.productividadable_type','=','App\Articulo')
            ->get();

        $Ponencias = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.id', '=','productividads.id_docente')
            ->join('ponencias', 'ponencias.idponencia', '=', 'productividads.productividadable_id')
            ->join('ponencia_soportes', 'ponencia_soportes.idponencia',"=", 'ponencias.idponencia')
            ->select('productividads.*','solicituds.*','ponencias.*','ponencia_soportes.*','docentes.*')->where('productividads.productividadable_type','=','App\Ponencia')
            ->get();
        //$=array($libros,$Software);
        foreach($Ponencias as $p){
            $productividades->push($p);
        }

        foreach($Articulos as $a){
            $productividades->push($a);
        }

        foreach($libros as $l){
            $productividades->push($l);
        }

        foreach($Software as $s){
            $productividades->push($s);
        }

        $productividades=$productividades->sortByDesc('idproductividad');

        //dd($productividades);
        
        

        return view ('admin.revisarsolicitudes',compact('productividades'));
    }
}
