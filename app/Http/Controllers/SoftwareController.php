<?php

namespace App\Http\Controllers;
use App\Docente;
use Illuminate\Http\Request;
use App\Software;
use App\Soporte_Software;
use App\Productividad;
use Illuminate\Support\Facades\Auth;
use App\Solicitud;
//use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Redirect;

class SoftwareController extends Controller
{
    public function nuevo(){
        return view('admin.software');
    }

    public function crear(){

        $idu=auth()->user()->id_docente;
        $d=Docente::find($idu);
        
        //$data=request()->all();
        $data=request()->validate([
            'titulo' => 'required',
            'noautores' => 'required',
            'autores' => 'required',
            'titulares' => 'required',
            'credito' => '',
            'impacto' => '', 
        ],[
            'titulo.required' => 'Titulo es un campo requerido',
            'noautores.required' => 'No. Autores es un campo requerido', 
            'autores.required' => 'Autores es un campo requerido',
            'titulares.required' => 'Titulares es un campo requerido'
        ]);

        //dd($data);

        

        if(request()->hasFile('codigo'))
        {
            $filec = request()->file('codigo');
            $namec= time()."_1".$filec->getClientOriginalName();
            $filec->move('archivos/software',$namec); 
                       
        }

        $software=Software::create([
            'autores' => $data['autores'],
            'noautores' => $data['noautores'],
            'titulares' => $data['titulares'],
            'creditoUpc' => $data['credito'],
            'impactanivelU' =>$data['impacto'],
            'codigo' => $namec,
        ]);


        if(request()->hasFile('instrucciones'))
        {
            $filei = request()->file('instrucciones');
            $namei= time()."_2".$filei->getClientOriginalName();
            $filei->move('archivos/software',$namei);            
        }
        if(request()->hasFile('manualusuario'))
        {
            $filem = request()->file('manualusuario');
            $namem= time()."_3".$filem->getClientOriginalName();
            $filem->move('archivos/software',$namem);            
        }
        if(request()->hasFile('ejecutable'))
        {
            $filee = request()->file('ejecutable');
            $namee= time()."_4".$filee->getClientOriginalName();
            $filee->move('archivos/software',$namee);            
        }
        if(request()->hasFile('certisoft'))
        {
            $filecer = request()->file('certisoft');
            $namecer= time()."_5".$filecer->getClientOriginalName();
            $filecer->move('archivos/software',$namecer);            
        }
        if(request()->hasFile('cvlac'))
        {
            $filecv = request()->file('cvlac');
            $namecv= time()."_6".$filecv->getClientOriginalName();
            $filecv->move('archivos/software',$namecv);            
        }
        if(request()->hasFile('gruplac'))
        {
            $filegru = request()->file('gruplac');
            $namegru= time()."_7".$filegru->getClientOriginalName();
            $filegru->move('archivos/software',$namegru);            
        }
        $nameimp='';
        if(request()->hasFile('certimpacto'))
        {
            $fileimp = request()->file('certimpacto');
            $nameimp= time()."_8".$fileimp->getClientOriginalName();
            $fileimp->move('archivos/software',$nameimp);            
        }

        /*Software::create([
            'autores' => $data['autores'],
            'titulares' => $data['titulares'],
            'creditoUpc' => $data['credito'],
            'impactanivelU' =>$data['impacto'],
            'codigo' => $namec
        ]);*/

        $soporte = Software::all()->last();
        Soporte_Software::create([
            'id_software' => $soporte->idsoftware,
            'instrucciones' => $namei,
            'manualusuario' => $namem,
            'ejecutable' => $namee,
            'certificado_software' => $namecer,
            'CvLac' => $namecv,
            'GrupLac' => $namegru,
            'Certificado_impacto' => $nameimp,
        ]);

        $idu=auth()->user()->id_docente;
        $d=Docente::find($idu);

        $software->productividad()->create([
            'id_docente' => $d->id,
            'titulo' => $data['titulo'],
        ]); 

        if($data['noautores'] <= 3){
            $pa=15;
        }
        elseif($data['noautores'] <= 5){
            $pa=15/2;
        }
        else{
            $pa=15/($data['noautores']/2);
        }

    
        $solicitud = Productividad::all()->last();
        Solicitud::create([
            'productividad_id' => $solicitud->idproductividad,
            'estado' => 'Enviado',
            'puntos_aprox' => round($pa),

        ]);

        /*$data='Hola';
        $pdf = PDF::loadView('pdf.formulariosoftware',compact('data'));
        $pdf->stream('invoice.pdf');
        */
        return redirect()->route('dashboard');

        //$data=request()->all();
        //dd($data);
        //return view('admin.prueba');
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

}
