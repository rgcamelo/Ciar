<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\ServiceProvider;
use App\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Solicitud;
use Dompdf\Dompdf;
use App\Video;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Collection as IlluminateCollection;

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
        $c=auth()->user()->convocatoria()->first();

        $solicitudes= collect();
        if(isset($c)){
            $solicitudes = DB::table('solicituds')
            ->join('productividads', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docente_productividads','productividads.id_docente','=','docente_productividads.iddocente')
            ->select('solicituds.*', 'productividads.*','docente_productividads.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente )
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get();

            
            $solicitudes=$solicitudes->sortByDesc('idsolicitud');
            
        }
        

        return view ('admin.missolicitudes',compact('solicitudes'));

        
        
    }

    public function reclamos(){
        $c=auth()->user()->convocatoria()->first();
        $reclamos = collect();
        if(isset($c)){
            $reclamos = DB::table('solicituds')
            ->join('productividads', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('reclamos', 'reclamos.id_solicitud', '=', 'solicituds.idsolicitud')
            ->select('solicituds.*', 'productividads.*','reclamos.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente )
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get();
        }
        

            $reclamos=$reclamos->sortByDesc('idsolicitud');
    
        return view ('admin.misreclamos',compact('reclamos'));

        
    }


    public function revisarreclamos(){
        $c=auth()->user()->convocatoria()->first();
        $reclamos = collect();
        if(isset($c)){
            $reclamos = DB::table('solicituds')
            ->join('productividads', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('reclamos', 'reclamos.id_solicitud', '=', 'solicituds.idsolicitud')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('docente_productividads','docentes.iddocente','=','docente_productividads.iddocente')
            ->select('solicituds.*', 'productividads.*','reclamos.*')
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get();
            $reclamos=$reclamos->sortByDesc('idsolicitud');
    
        
        }
        return view ('admin.revisarreclamos',compact('reclamos'));  
    }

    public function productividades(){
        $productividades = collect();
        $Software = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('software', 'software.idsoftware', '=', 'productividads.productividadable_id')
            ->join('soporte_software', 'soporte_software.id_software','=','software.idsoftware')
            ->select('productividads.*', 'software.*', 'soporte_software.*','solicituds.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente )->where('productividads.productividadable_type','=','App\Software')
        
            ->get();
        
        $libros = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('libros', 'libros.idlibro', '=', 'productividads.productividadable_id')
            ->join('libro_soportes', 'libro_soportes.id_libro',"=", 'libros.idlibro')
            ->select('productividads.*','solicituds.*','libros.*','libro_soportes.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente)->where('productividads.productividadable_type','=','App\Libro')
            
            ->get();

        $Articulos = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('articulos', 'articulos.id_articulo', '=', 'productividads.productividadable_id')
            ->join('articulo_soportes', 'articulo_soportes.idarticulo',"=", 'articulos.id_articulo')
            ->select('productividads.*','solicituds.*','articulos.*','articulo_soportes.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente)->where('productividads.productividadable_type','=','App\Articulo')
            
            ->get();

        $Ponencias = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('ponencias', 'ponencias.idponencia', '=', 'productividads.productividadable_id')
            ->join('ponencia_soportes', 'ponencia_soportes.idponencia',"=", 'ponencias.idponencia')
            ->select('productividads.*','solicituds.*','ponencias.*','ponencia_soportes.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente)->where('productividads.productividadable_type','=','App\Ponencia')
            
            ->get();

        $Videos = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('videos', 'videos.idvideo', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','videos.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente)->where('productividads.productividadable_type','=','App\Video')
            
            ->get();
            
        $Premios= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('premios_nacionales', 'premios_nacionales.idpremio', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','premios_nacionales.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente)->where('productividads.productividadable_type','=','App\Premios_Nacionales')
            
            ->get();
        
        $Patentes= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('patentes', 'patentes.idpatente', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','patentes.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente)->where('productividads.productividadable_type','=','App\Patente')
            
            ->get();

        $Traducciones= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('traduccions', 'traduccions.idtraduccion', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','traduccions.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente)->where('productividads.productividadable_type','=','App\Traduccion')
            
            ->get();    
        
        $Obras= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('obras', 'obras.idobra', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','obras.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente)->where('productividads.productividadable_type','=','App\Obra')
            
            ->get();  

        $Produccion= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('produccion_tecnicas', 'produccion_tecnicas.idproducciontecnica', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','produccion_tecnicas.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente)->where('productividads.productividadable_type','=','App\ProduccionTecnica')
            
            ->get();  

        $Estudios= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('estudios_postdoctorales', 'estudios_postdoctorales.idestudiopost', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','estudios_postdoctorales.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente)->where('productividads.productividadable_type','=','App\EstudiosPostdoctorales')
            
            ->get();  

        $Publicacion= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('publicacion_impresas', 'publicacion_impresas.idpublicacionimpresa', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','publicacion_impresas.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente)->where('productividads.productividadable_type','=','App\PublicacionImpresa')
            
            ->get(); 

        $Reseña= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('reseñas_criticas', 'reseñas_criticas.idreseña', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','reseñas_criticas.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente)->where('productividads.productividadable_type','=','App\ReseñasCriticas')
            
            ->get(); 

        $Direccion= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('direccion_teses', 'direccion_teses.iddireccion', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','direccion_teses.*')->where('productividads.id_docente','=',auth()->user()->docente()->iddocente)->where('productividads.productividadable_type','=','App\DireccionTesis')
            
            ->get(); 
        //$=array($libros,$Software);
        foreach($Direccion as $d){
            $productividades->push($d);
        }

        foreach($Reseña as $d){
            $productividades->push($d);
        }

        foreach($Publicacion as $pu){
            $productividades->push($pu);
        }

        foreach($Estudios as $e){
            $productividades->push($e);
        }

        foreach($Produccion as $pro){
            $productividades->push($pro);
        }

        foreach($Obras as $o){
            $productividades->push($o);
        }

        foreach($Traducciones as $t){
            $productividades->push($t);
        }

        foreach($Patentes as $pa){
            $productividades->push($pa);
        }

        foreach($Premios as $pre){
            $productividades->push($pre);
        }

        foreach($Videos as $v){
            $productividades->push($v);
        }

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
        $c=auth()->user()->convocatoria()->first();
        $productividades = collect();

        if(isset($c)){
            $Software = DB::table('productividads')
        ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
        ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
        ->join('software', 'software.idsoftware', '=', 'productividads.productividadable_id')
        ->join('soporte_software', 'soporte_software.id_software','=','software.idsoftware')
        ->select('productividads.*', 'software.*', 'soporte_software.*','solicituds.*','docentes.*')->where('productividads.productividadable_type','=','App\Software')
        ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
        ->get();

        $libros = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('libros', 'libros.idlibro', '=', 'productividads.productividadable_id')
            ->join('libro_soportes', 'libro_soportes.id_libro',"=", 'libros.idlibro')
            ->select('productividads.*','solicituds.*','libros.*','libro_soportes.*','docentes.*')->where('productividads.productividadable_type','=','App\Libro')
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get();

        $Articulos = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('articulos', 'articulos.id_articulo', '=', 'productividads.productividadable_id')
            ->join('articulo_soportes', 'articulo_soportes.idarticulo',"=", 'articulos.id_articulo')
            ->select('productividads.*','solicituds.*','articulos.*','articulo_soportes.*','docentes.*')->where('productividads.productividadable_type','=','App\Articulo')
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get();

        $Ponencias = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('docente_productividads','docentes.iddocente','=','docente_productividads.iddocente')
            ->join('ponencias', 'ponencias.idponencia', '=', 'productividads.productividadable_id')
            ->join('ponencia_soportes', 'ponencia_soportes.idponencia',"=", 'ponencias.idponencia')
            ->select('productividads.*','solicituds.*','ponencias.*','ponencia_soportes.*','docentes.*','docente_productividads.*')->where('productividads.productividadable_type','=','App\Ponencia')
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get();

        //$Videos=$this->videos($c);

        $Videos = DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('docente_productividads','docentes.iddocente','=','docente_productividads.iddocente')
            ->join('videos', 'videos.idvideo', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','videos.*','docente_productividads.*')->where('productividads.productividadable_type','=','App\Video')
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get();
        
        
        //$Videos = $this->revision($c);

        //dd($Videos);
        
        $Premios= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('premios_nacionales', 'premios_nacionales.idpremio', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','premios_nacionales.*')->where('productividads.productividadable_type','=','App\Premios_Nacionales')
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->where('solicituds.estado','!=','Incompleta')
            ->get();
        
        $Patentes= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('patentes', 'patentes.idpatente', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','patentes.*')->where('productividads.productividadable_type','=','App\Patente')
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get();

        $Traducciones= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('docente_productividads','docentes.iddocente','=','docente_productividads.iddocente')
            ->join('traduccions', 'traduccions.idtraduccion', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','traduccions.*','docente_productividads.*')->where('productividads.productividadable_type','=','App\Traduccion')
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get();    
        
        $Obras= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('docente_productividads','docentes.iddocente','=','docente_productividads.iddocente')
            ->join('obras', 'obras.idobra', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','obras.*','docente_productividads.*')->where('productividads.productividadable_type','=','App\Obra')
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get();  

        $Produccion= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('produccion_tecnicas', 'produccion_tecnicas.idproducciontecnica', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','produccion_tecnicas.*')->where('productividads.productividadable_type','=','App\ProduccionTecnica')
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get();  

        $Estudios= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('estudios_postdoctorales', 'estudios_postdoctorales.idestudiopost', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','estudios_postdoctorales.*')->where('productividads.productividadable_type','=','App\EstudiosPostdoctorales')
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get();  

        $Publicacion= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('docente_productividads','docentes.iddocente','=','docente_productividads.iddocente')
            ->join('publicacion_impresas', 'publicacion_impresas.idpublicacionimpresa', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','publicacion_impresas.*','docente_productividads.*')->where('productividads.productividadable_type','=','App\PublicacionImpresa')
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get(); 

        $Reseña= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('docente_productividads','docentes.iddocente','=','docente_productividads.iddocente')
            ->join('reseñas_criticas', 'reseñas_criticas.idreseña', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','reseñas_criticas.*','docente_productividads.*')->where('productividads.productividadable_type','=','App\ReseñasCriticas')
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get(); 

        $Direccion= DB::table('productividads')
            ->join('solicituds', 'solicituds.productividad_id', '=', 'productividads.idproductividad')
            ->join('docentes', 'docentes.iddocente', '=','productividads.id_docente')
            ->join('docente_productividads','docentes.iddocente','=','docente_productividads.iddocente')
            ->join('direccion_teses', 'direccion_teses.iddireccion', '=', 'productividads.productividadable_id')
            ->select('productividads.*','solicituds.*','direccion_teses.*','docente_productividads.*')->where('productividads.productividadable_type','=','App\DireccionTesis')
            ->where('solicituds.idconvocatoria','=',$c->idconvocatoria)
            ->get(); 
        //$=array($libros,$Software);

        foreach($Direccion as $d){
            $productividades->push($d);
        }

        foreach($Reseña as $d){
            $productividades->push($d);
        }

        foreach($Publicacion as $pu){
            $productividades->push($pu);
        }

        foreach($Estudios as $e){
            $productividades->push($e);
        }

        foreach($Produccion as $pro){
            $productividades->push($pro);
        }

        foreach($Obras as $o){
            $productividades->push($o);
        }

        foreach($Traducciones as $t){
            $productividades->push($t);
        }

        foreach($Patentes as $pa){
            $productividades->push($pa);
        }

        foreach($Premios as $pre){
            $productividades->push($pre);
        }

        foreach($Videos as $v){
            $productividades->push($v);
        }
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


        }
        

        //dd($productividades);
        
        

        return view ('admin.revisarsolicitudes',compact('productividades'));
    }

    public function registros(){

        $convocatorias = DB::table('convocatorias')->get();
        $convocatorias = $convocatorias->sortByDesc('idconvocatoria');
        return view ('admin.registros',compact('convocatorias'));
    }

    
}
