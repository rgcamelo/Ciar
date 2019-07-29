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
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class SoftwareController extends Controller
{
    public function nuevo(){
        return view('admin.software');
    }

    public function crear(){
       
        $idu=auth()->user()->id_docente;
        $d=Docente::find($idu);
        
        //$data=request()->all();
        /*$data=request()->validate([
            'titulo' => 'required',
            'noautores' => 'required',
            'titulares' => 'required',
            'credito' => '',
            'impacto' => '', 
        ],[
            'titulo.required' => 'Titulo es un campo requerido',
            'noautores.required' => 'No. Autores es un campo requerido', 
            'autores.required' => 'Autores es un campo requerido',
            'titulares.required' => 'Titulares es un campo requerido'
        ]);
        */
        
        $data=request()->all();
        //dd($todos);

        $folder = 'archivos/software/'.$d->NombreCompleto.'_'.$d->id.'_'.$data['titulo'].'_'.time();
        $path = 'archivos/software/'.$folder.'/';
        File::makeDirectory($folder);
        
        //File::makeDirectory("/archivos/software/$folder");

        if(request()->hasFile('codigo'))
        {
            $filec = request()->file('codigo');
            $namec= time()."_1".'CodigoFuente_'.$filec->getClientOriginalName();
            $filec->move($folder,$namec); 
                       
        }

        $autores='';
        for($i=1; $i<=$data['noautores'];$i++){
            if ($i == $data['noautores']) {
                $autores=$autores." ".$data['autor'.$i.''];
            }
            else{
                $autores=$autores." ".$data['autor'.$i.''].";";
            }
            
        }

        
        $software=Software::create([
            'autores' => $autores,
            'noautores' => $data['noautores'],
            'titulares' => $data['titulares'],
            'creditoUpc' => $data['credito'],
            'impactanivelU' =>$data['impacto'],
            'codigo' => $namec,
        ]);


        if(request()->hasFile('instrucciones'))
        {
            $filei = request()->file('instrucciones');
            $namei= time()."_2".'Instrucciones_'.$filei->getClientOriginalName();
            $filei->move($folder,$namei);            
        }
        if(request()->hasFile('manualusuario'))
        {
            $filem = request()->file('manualusuario');
            $namem= time()."_3".'ManualUsuario_'.$filem->getClientOriginalName();
            $filem->move($folder,$namem);            
        }
        if(request()->hasFile('ejecutable'))
        {
            $filee = request()->file('ejecutable');
            $namee= time()."_4".'Ejecutable_'.$filee->getClientOriginalName();
            $filee->move($folder,$namee);            
        }
        if(request()->hasFile('certisoft'))
        {
            $filecer = request()->file('certisoft');
            $namecer= time()."_5Certificado de Software_".$filecer->getClientOriginalName();
            $filecer->move($folder,$namecer);            
        }
        if(request()->hasFile('cvlac'))
        {
            $filecv = request()->file('cvlac');
            $namecv= time()."_6CvLac_".$filecv->getClientOriginalName();
            $filecv->move($folder,$namecv);            
        }
        if(request()->hasFile('gruplac'))
        {
            $filegru = request()->file('gruplac');
            $namegru= time()."_7GrupLac_".$filegru->getClientOriginalName();
            $filegru->move($folder,$namegru);            
        }
        $nameimp='';
        if(request()->hasFile('certimpacto'))
        {
            $fileimp = request()->file('certimpacto');
            $nameimp= time()."_8Certificado de Impacto_".$fileimp->getClientOriginalName();
            $fileimp->move($folder,$nameimp);            
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
            'Zip' => $folder
        ]);

        $idu=auth()->user()->id_docente;
        $d=Docente::find($idu);

        $productividad=$software->productividad()->create([
            'id_docente' => $d->iddocente,
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

        $pa=round($pa,3);
        $convocatoria=auth()->user()->convocatoria()->first();
        $solicitud=$software->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria);
        $software->pdf($folder,$solicitud);
        
        return redirect()->route('solicitudes');

        //$data=request()->all();
        //dd($data);
        //return view('admin.prueba');
    }

    

}
