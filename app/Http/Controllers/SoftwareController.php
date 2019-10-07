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

        $folder = 'archivos/software/'.$d->NombreCompleto.'_'.$d->iddocente.'_'.$data['titulo'].'_'.time();
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

        $pa= $software->puntaje();

        $pa=round($pa,3);
        $convocatoria=auth()->user()->convocatoria()->first();
        $solicitud=$software->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria,'Enviado');
        $software->pdf($folder,$solicitud);
        
        return redirect()->route('solicitudes');

        //$data=request()->all();
        
        //return view('admin.prueba');
    }



    public function editar(Solicitud $solicitud, Software $software ){
        $productividad=$solicitud->Productividad();
        $soportes=$software->miSoportes();
        return view('admin.softwareedit',['solicitud' => $solicitud, 'software' =>$software, 'productividad' => $productividad, 'soportes' => $soportes]);
    }


    public function guardar(){
       
        $idu=auth()->user()->id_docente;
        $d=Docente::find($idu);
        
        $data=request()->all();
        //dd($todos);

        $folder = 'archivos/software/'.$d->NombreCompleto.'_'.$d->iddocente.'_'.$data['titulo'].'_'.time();
        File::makeDirectory($folder);
        
        //File::makeDirectory("/archivos/software/$folder");
        
        $namec=null;
        if(request()->hasFile('codigo'))
        {
            $filec = request()->file('codigo');
            $namec= time()."_1".'CodigoFuente_'.$filec->getClientOriginalName();
            $filec->move($folder,$namec); 
                       
        }

        $autores=null;
        if ($data['noautores'] > 0){
            for($i=1; $i<=$data['noautores'];$i++){
                if ($i == $data['noautores']) {
                    $autores=$autores." ".$data['autor'.$i.''];
                }
                else{
                    $autores=$autores." ".$data['autor'.$i.''].";";
                }
                
            }
        }
        
        $credito=null;
            if(isset($data['credito'])){
            $credito=$data['credito'];
            }

        $impacto=null;
            if(isset($data['impacto'])){
            $impacto=$data['impacto'];
            }
        
        $software=Software::create([
            'autores' => $autores,
            'noautores' => $data['noautores'],
            'titulares' => $data['titulares'],
            'creditoUpc' => $credito,
            'impactanivelU' =>$impacto,
            'codigo' => $namec,
        ]);

        $namei=null;
        if(request()->hasFile('instrucciones'))
        {
            $filei = request()->file('instrucciones');
            $namei= time()."_2".'Instrucciones_'.$filei->getClientOriginalName();
            $filei->move($folder,$namei);            
        }
        $namem=null;
        if(request()->hasFile('manualusuario'))
        {
            $filem = request()->file('manualusuario');
            $namem= time()."_3".'ManualUsuario_'.$filem->getClientOriginalName();
            $filem->move($folder,$namem);            
        }
        $namee=null;
        if(request()->hasFile('ejecutable'))
        {
            $filee = request()->file('ejecutable');
            $namee= time()."_4".'Ejecutable_'.$filee->getClientOriginalName();
            $filee->move($folder,$namee);            
        }
        $namecer=null;
        if(request()->hasFile('certisoft'))
        {
            $filecer = request()->file('certisoft');
            $namecer= time()."_5Certificado de Software_".$filecer->getClientOriginalName();
            $filecer->move($folder,$namecer);            
        }
        $namecv=null;
        if(request()->hasFile('cvlac'))
        {
            $filecv = request()->file('cvlac');
            $namecv= time()."_6CvLac_".$filecv->getClientOriginalName();
            $filecv->move($folder,$namecv);            
        }
        $namegru=null;
        if(request()->hasFile('gruplac'))
        {
            $filegru = request()->file('gruplac');
            $namegru= time()."_7GrupLac_".$filegru->getClientOriginalName();
            $filegru->move($folder,$namegru);            
        }
        $nameimp=null;
        if(request()->hasFile('certimpacto'))
        {
            $fileimp = request()->file('certimpacto');
            $nameimp= time()."_8Certificado de Impacto_".$fileimp->getClientOriginalName();
            $fileimp->move($folder,$nameimp);            
        }

        Soporte_Software::create([
            'id_software' => $software->idsoftware,
            'instrucciones' => $namei,
            'manualusuario' => $namem,
            'ejecutable' => $namee,
            'certificado_software' => $namecer,
            'CvLac' => $namecv,
            'GrupLac' => $namegru,
            'Certificado_impacto' => $nameimp,
            'Zip' => $folder
        ]);

        $productividad=$software->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $convocatoria=auth()->user()->convocatoria()->first();
        $solicitud=$software->solicitud($productividad->idproductividad, 0, $convocatoria->idconvocatoria,'Incompleta');
        
        return redirect()->route('productividades');

        //$data=request()->all();
        
        //return viesw('admin.prueba');
    }

    public function actualizar(Solicitud $solicitud, Software $software ){
        $productividad=$solicitud->Productividad();
        $soportes=$software->miSoportes();
        $idu=auth()->user()->id_docente;
        $d=Docente::find($idu);
        
        $data=request()->all();
        //dd($todos);

        //File::makeDirectory("/archivos/software/$folder");
        
        $namec=null;
        if(isset($software->codigo)){
            $namec=$software->codigo;
        }
        if(request()->hasFile('codigo'))
        {
            if(isset($software->codigo)){
                unlink("$soportes->Zip/$software->codigo");
            }
            $filec = request()->file('codigo');
            $namec= time()."_1".'CodigoFuente_'.$filec->getClientOriginalName();
            $filec->move($soportes->Zip,$namec); 
                       
        }

        $autores=null;
        if(isset($software->autores)){
            $autores=$software->autores;
        }
        if ($data['noautores'] != $software->noautores){
            for($i=1; $i<=$data['noautores'];$i++){
                if($data['autor'.$i.''] != null){
                    if ($i == $data['noautores']) {
                        $autores=$autores." ".$data['autor'.$i.''];
                    }
                    else{
                        $autores=$autores." ".$data['autor'.$i.''].";";
                    }
                }
            }
        }
        else {
            $autores=null;
            for($i=1; $i<=$data['noautores'];$i++){
                if( isset($data['autor'.$i.''])){
                    if ($i == $data['noautores']) {
                        $autores=$autores." ".$data['autor'.$i.''];
                    }
                    else{
                        $autores=$autores." ".$data['autor'.$i.''].";";
                    }
                }
                else {
                    $autores=$software->autores;
                }
            }
        }
        

        $credito=null;
            if(isset($data['credito'])){
            $credito=$data['credito'];
            }

        $impacto=null;
            if(isset($data['impacto'])){
            $impacto=$data['impacto'];
            }
        
        $software->update([
            'autores' => $autores,
            'noautores' => $data['noautores'],
            'titulares' => $data['titulares'],
            'creditoUpc' => $credito,
            'impactanivelU' =>$impacto,
            'codigo' => $namec,
        ]);

        $namei=null;
        if(isset($soportes->instrucciones)){
            $namei=$soportes->instrucciones;
        }
        if(request()->hasFile('instrucciones'))
        {
            if(isset($soportes->instrucciones)){
                unlink("$soportes->Zip/$soportes->instrucciones");
            }
            $filei = request()->file('instrucciones');
            $namei= time()."_2".'Instrucciones_'.$filei->getClientOriginalName();
            $filei->move($soportes->Zip,$namei);            
        }


        $namem=null;
        if(isset($soportes->manualusuario)){
            $namem=$soportes->manualusuario;
        }
        if(request()->hasFile('manualusuario'))
        {
            if(isset($soportes->manualusuario)){
                unlink("$soportes->Zip/$soportes->manualusuario");
            }
            $filem = request()->file('manualusuario');
            $namem= time()."_3".'ManualUsuario_'.$filem->getClientOriginalName();
            $filem->move($soportes->Zip,$namem);            
        }


        $namee=null;
        if(isset($soportes->ejecutable)){
            $namee=$soportes->ejecutable;
        }
        if(request()->hasFile('ejecutable'))
        {
            if(isset($soportes->ejecutable)){
                unlink("$soportes->Zip/$soportes->ejecutable");
            }
            $filee = request()->file('ejecutable');
            $namee= time()."_4".'Ejecutable_'.$filee->getClientOriginalName();
            $filee->move($soportes->Zip,$namee);            
        }


        $namecer=null;
        if(isset($soportes->certificado_software)){
            $namecer=$soportes->certificado_software;
        }
        if(request()->hasFile('certisoft'))
        {
            if(isset($soportes->certificado_software)){
                unlink("$soportes->Zip/$soportes->certificado_software");
            }
            $filecer = request()->file('certisoft');
            $namecer= time()."_5Certificado de Software_".$filecer->getClientOriginalName();
            $filecer->move($soportes->Zip,$namecer);            
        }


        $namecv=null;
        if(isset($soportes->CvLac)){
            $namecv=$soportes->CvLac;
        }
        if(request()->hasFile('cvlac'))
        {
            if(isset($soportes->CvLac)){
                unlink("$soportes->Zip/$soportes->CvLac");
            }
            $filecv = request()->file('cvlac');
            $namecv= time()."_6CvLac_".$filecv->getClientOriginalName();
            $filecv->move($soportes->Zip,$namecv);            
        }


        $namegru=null;
        if(isset($soportes->GrupLac)){
            $namegru=$soportes->GrupLac;
        }
        if(request()->hasFile('gruplac'))
        {
            if(isset($soportes->GrupLac)){
                unlink("$soportes->Zip/$soportes->GrupLac");
            }
            $filegru = request()->file('gruplac');
            $namegru= time()."_7GrupLac_".$filegru->getClientOriginalName();
            $filegru->move($soportes->Zip,$namegru);            
        }


        $nameimp=null;
        if(isset($soportes->Certificado_impacto)){
            $nameimp=$soportes->Certificado_impacto;
        }
        if(request()->hasFile('certimpacto'))
        {
            if(isset($soportes->Certificado_impacto)){
                unlink("$soportes->Zip/$soportes->Certificado_impacto");
            }
            $fileimp = request()->file('certimpacto');
            $nameimp= time()."_8Certificado de Impacto_".$fileimp->getClientOriginalName();
            $fileimp->move($soportes->Zip,$nameimp);            
        }

        $soportes->update([
            'instrucciones' => $namei,
            'manualusuario' => $namem,
            'ejecutable' => $namee,
            'certificado_software' => $namecer,
            'CvLac' => $namecv,
            'GrupLac' => $namegru,
            'Certificado_impacto' => $nameimp,
        ]);

        $productividad->update([
            'titulo' => $data['titulo'],
        ]); 

        $convocatoria=auth()->user()->convocatoria()->first();
        $solicitud=$software->solicitud($productividad->idproductividad, 0, $convocatoria->idconvocatoria,'Incompleta');
        
        return redirect()->route('productividades');

        //$data=request()->all();
        
        //return view('admin.prueba');
    }


    public function enviar(Solicitud $solicitud, Software $software ){
        $productividad=$solicitud->Productividad();
        $soportes=$software->miSoportes();
        $idu=auth()->user()->id_docente;
        $d=Docente::find($idu);
        
        $data=request()->all();
        //dd($todos);

        //File::makeDirectory("/archivos/software/$folder");
        
        $namec=null;
        if(isset($software->codigo)){
            $namec=$software->codigo;
        }
        if(request()->hasFile('codigo'))
        {
            if(isset($software->codigo)){
                unlink("$soportes->Zip/$software->codigo");
            }
            $filec = request()->file('codigo');
            $namec= time()."_1".'CodigoFuente_'.$filec->getClientOriginalName();
            $filec->move($soportes->Zip,$namec); 
                       
        }

        $autores=null;
        if(isset($software->autores)){
            $autores=$software->autores;
        }
        if ($data['noautores'] != $software->noautores){
            for($i=1; $i<=$data['noautores'];$i++){
                if($data['autor'.$i.''] != null){
                    if ($i == $data['noautores']) {
                        $autores=$autores." ".$data['autor'.$i.''];
                    }
                    else{
                        $autores=$autores." ".$data['autor'.$i.''].";";
                    }
                }
            }
        }
        else {
            $autores=null;
            for($i=1; $i<=$data['noautores'];$i++){
                if( isset($data['autor'.$i.''])){
                    if ($i == $data['noautores']) {
                        $autores=$autores." ".$data['autor'.$i.''];
                    }
                    else{
                        $autores=$autores." ".$data['autor'.$i.''].";";
                    }
                }
                else {
                    $autores=$software->autores;
                }
            }
        }
        
        $credito=null;
            if(isset($data['credito'])){
            $credito=$data['credito'];
            }

        $impacto=null;
            if(isset($data['impacto'])){
            $impacto=$data['impacto'];
            }
        
        $software->update([
            'autores' => $autores,
            'noautores' => $data['noautores'],
            'titulares' => $data['titulares'],
            'creditoUpc' => $credito,
            'impactanivelU' =>$impacto,
            'codigo' => $namec,
        ]);

        $namei=null;
        if(isset($soportes->instrucciones)){
            $namei=$soportes->instrucciones;
        }
        if(request()->hasFile('instrucciones'))
        {
            if(isset($soportes->instrucciones)){
                unlink("$soportes->Zip/$soportes->instrucciones");
            }
            $filei = request()->file('instrucciones');
            $namei= time()."_2".'Instrucciones_'.$filei->getClientOriginalName();
            $filei->move($soportes->Zip,$namei);            
        }


        $namem=null;
        if(isset($soportes->manualusuario)){
            $namem=$soportes->manualusuario;
        }
        if(request()->hasFile('manualusuario'))
        {
            if(isset($soportes->manualusuario)){
                unlink("$soportes->Zip/$soportes->manualusuario");
            }
            $filem = request()->file('manualusuario');
            $namem= time()."_3".'ManualUsuario_'.$filem->getClientOriginalName();
            $filem->move($soportes->Zip,$namem);            
        }


        $namee=null;
        if(isset($soportes->ejecutable)){
            $namee=$soportes->ejecutable;
        }
        if(request()->hasFile('ejecutable'))
        {
            if(isset($soportes->ejecutable)){
                unlink("$soportes->Zip/$soportes->ejecutable");
            }
            $filee = request()->file('ejecutable');
            $namee= time()."_4".'Ejecutable_'.$filee->getClientOriginalName();
            $filee->move($soportes->Zip,$namee);            
        }


        $namecer=null;
        if(isset($soportes->certificado_software)){
            $namecer=$soportes->certificado_software;
        }
        if(request()->hasFile('certisoft'))
        {
            if(isset($soportes->certificado_software)){
                unlink("$soportes->Zip/$soportes->certificado_software");
            }
            $filecer = request()->file('certisoft');
            $namecer= time()."_5Certificado de Software_".$filecer->getClientOriginalName();
            $filecer->move($soportes->Zip,$namecer);            
        }


        $namecv=null;
        if(isset($soportes->CvLac)){
            $namecv=$soportes->CvLac;
        }
        if(request()->hasFile('cvlac'))
        {
            if(isset($soportes->CvLac)){
                unlink("$soportes->Zip/$soportes->CvLac");
            }
            $filecv = request()->file('cvlac');
            $namecv= time()."_6CvLac_".$filecv->getClientOriginalName();
            $filecv->move($soportes->Zip,$namecv);            
        }


        $namegru=null;
        if(isset($soportes->GrupLac)){
            $namegru=$soportes->GrupLac;
        }
        if(request()->hasFile('gruplac'))
        {
            if(isset($soportes->GrupLac)){
                unlink("$soportes->Zip/$soportes->GrupLac");
            }
            $filegru = request()->file('gruplac');
            $namegru= time()."_7GrupLac_".$filegru->getClientOriginalName();
            $filegru->move($soportes->Zip,$namegru);            
        }


        $nameimp=null;
        if(isset($soportes->Certificado_impacto)){
            $nameimp=$soportes->Certificado_impacto;
        }
        if(request()->hasFile('certimpacto'))
        {
            if(isset($soportes->Certificado_impacto)){
                unlink("$soportes->Zip/$soportes->Certificado_impacto");
            }
            $fileimp = request()->file('certimpacto');
            $nameimp= time()."_8Certificado de Impacto_".$fileimp->getClientOriginalName();
            $fileimp->move($soportes->Zip,$nameimp);            
        }

        $soportes->update([
            'instrucciones' => $namei,
            'manualusuario' => $namem,
            'ejecutable' => $namee,
            'certificado_software' => $namecer,
            'CvLac' => $namecv,
            'GrupLac' => $namegru,
            'Certificado_impacto' => $nameimp,
        ]);

        $productividad->update([
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

        $solicitud->update([
            'estado' => 'Enviado',
            'fechasolicitud' => (date('Y-m-d')),
            'puntos_aprox' => $pa
        ]);
        
        return redirect()->route('productividades');

        //$data=request()->all();
        
        //return view('admin.prueba');
    }





    




    

}
