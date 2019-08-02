<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use Illuminate\Support\Facades\File;
use App\Solicitud;

class LibroController extends Controller
{
    public function nuevo(){
        return view('admin.libro');
    }

    public function crear(){
        
        $d=auth()->user()->Docente();
        $data=request()->validate([
            'titulo' => 'required',
            'noautores' => 'required',
            'tipolibro' => 'required',
            'fecha' => 'required',
            'editorial' => 'required',
            'isbn' => 'required',
            'idioma' => 'required',
            'credito' => ' ', 
        ],[
            'titulo.required' => 'El Titulo es un campo requerido',
            'noautores.required' =>  'El Numero de Autores es un campo requerido',
            'tipolibro.required' => 'El Tipo de Libro es un campo requerido',
            'fecha.required' => 'La Fecha de publicacion es un campo requerido',
            'editorial.required' =>  'La Editorial es un campo requerido',
            'isbn.required' =>  'El ISBN es un campo requerido',
            'idioma.required' =>  'El Idioma es un campo requerido',
            ]);

            //dd($data);
        $folder = 'archivos/libro/'.$d->NombreCompleto.'_'.$d->iddocente.'_'.$data['titulo'].'_'.time();
        File::makeDirectory($folder);
        
        $libro=Libro::create([
            'fecha_publicacion' => $data['fecha'],
            'editorial' => $data['editorial'],
            'tipo_libro' => $data['tipolibro'],
            'isbn' => $data['isbn'],
            'idioma' => $data['idioma'],
            'noautores' => $data['noautores'],
            'creditoUpc_libro' => $data['credito'],
        ]);


        if(request()->hasFile('ejemplar'))
        {
            $filei = request()->file('ejemplar');
            $ejemplar= time()."_1".'Ejemplar_'.$filei->getClientOriginalName();
            $filei->move($folder,$ejemplar);            
        }
        $certilibroinves='';
        if(request()->hasFile('certilibroinves'))
        {
            $filem = request()->file('certilibroinves');
            $certilibroinves= time()."_2".'CertificadoLibroInvestigacion_'.$filem->getClientOriginalName();
            $filem->move($folder,$certilibroinves);            
        }
        if(request()->hasFile('cvlac'))
        {
            $filecv = request()->file('cvlac');
            $cvlac= time()."_3CvLac_".$filecv->getClientOriginalName();
            $filecv->move($folder,$cvlac);            
        }
        if(request()->hasFile('gruplac'))
        {
            $filegru = request()->file('gruplac');
            $gruplac= time()."_4GrupLac_".$filegru->getClientOriginalName();
            $filegru->move($folder,$gruplac);            
        }
        $certieditorial='';
        if(request()->hasFile('certieditorial'))
        {
            $fileimp = request()->file('certieditorial');
            $certieditorial= time()."_6CertificadoEditorial_".$fileimp->getClientOriginalName();
            $fileimp->move($folder,$certieditorial);            
        }

        $libro->soportes($ejemplar,$certilibroinves, $cvlac,$gruplac,$certieditorial,$folder);

        $productividad=$libro->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $pa=round($pa=$libro->puntaje(),3);
        $convocatoria=auth()->user()->convocatoria()->first();
        $libro->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria,'Enviado');

        return redirect()->route('solicitudes');
        //dd($productividad->idproductividad);
    }



    public function guardar(){
        $d=auth()->user()->Docente();
        $data=request()->all();
            //dd($data);
        $folder = 'archivos/libro/'.$d->NombreCompleto.'_'.$d->iddocente.'_'.$data['titulo'].'_'.time();
        File::makeDirectory($folder);
        
        $tipo=null;
            if(isset($data['tipolibro'])){
            $tipo=$data['tipolibro'];
            }

        $idioma=null;
            if(isset($data['idioma'])){
            $idioma=$data['idioma'];
            }

        $credito=null;
            if(isset($data['credito'])){
            $credito=$data['credito'];
            }

        $libro=Libro::create([
            'fecha_publicacion' => $data['fecha'],
            'editorial' => $data['editorial'],
            'tipo_libro' => $tipo,
            'isbn' => $data['isbn'],
            'idioma' => $idioma,
            'noautores' => $data['noautores'],
            'creditoUpc_libro' => $credito,
        ]);

        $ejemplar=null;
        if(request()->hasFile('ejemplar'))
        {
            $filei = request()->file('ejemplar');
            $ejemplar= time()."_1".'Ejemplar_'.$filei->getClientOriginalName();
            $filei->move($folder,$ejemplar);            
        }
        
        $certilibroinves=null;
        if(request()->hasFile('certilibroinves'))
        {
            $filem = request()->file('certilibroinves');
            $certilibroinves= time()."_2".'CertificadoLibroInvestigacion_'.$filem->getClientOriginalName();
            $filem->move($folder,$certilibroinves);            
        }
        $cvlac=null;
        if(request()->hasFile('cvlac'))
        {
            $filecv = request()->file('cvlac');
            $cvlac= time()."_3CvLac_".$filecv->getClientOriginalName();
            $filecv->move($folder,$cvlac);            
        }
        $gruplac=null;
        if(request()->hasFile('gruplac'))
        {
            $filegru = request()->file('gruplac');
            $gruplac= time()."_4GrupLac_".$filegru->getClientOriginalName();
            $filegru->move($folder,$gruplac);            
        }
        $certieditorial=null;
        if(request()->hasFile('certieditorial'))
        {
            $fileimp = request()->file('certieditorial');
            $certieditorial= time()."_6CertificadoEditorial_".$fileimp->getClientOriginalName();
            $fileimp->move($folder,$certieditorial);            
        }

        $libro->soportes($ejemplar,$certilibroinves, $cvlac,$gruplac,$certieditorial,$folder);

        $productividad=$libro->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $convocatoria=auth()->user()->convocatoria()->first();
        $libro->solicitud($productividad->idproductividad, 0, $convocatoria->idconvocatoria,'Incompleta');

        return redirect()->route('productividades');
        //dd($productividad->idproductividad);
    }

    public function editar(Solicitud $solicitud, Libro $libro ){
        $productividad=$solicitud->Productividad();
        $soportes=$libro->miSoportes();
        return view('admin.libroedit',['solicitud' => $solicitud, 'libro' => $libro, 'productividad' => $productividad, 'soportes' => $soportes]);
    }

    public function actualizar(Solicitud $solicitud, Libro $libro ){
        $productividad=$solicitud->Productividad();
        $soportes=$libro->miSoportes();
        $d=auth()->user()->Docente();
        $data=request()->all();

        $tipo=null;
        if(isset($data['tipolibro'])){
        $tipo=$data['tipolibro'];
        }

        $idioma=null;
            if(isset($data['idioma'])){
            $idioma=$data['idioma'];
            }

        $credito=null;
            if(isset($data['credito'])){
            $credito=$data['credito'];
            }

        $libro->update([
            'fecha_publicacion' => $data['fecha'],
            'editorial' => $data['editorial'],
            'tipo_libro' => $tipo,
            'isbn' => $data['isbn'],
            'idioma' => $idioma,
            'noautores' => $data['noautores'],
            'creditoUpc_libro' => $credito,
        ]);

        $ejemplar=null;
        if(isset($soportes->ejemplar)){
            $ejemplar=$soportes->ejemplar;
        }
        if(request()->hasFile('ejemplar'))
        {
            if(isset($soportes->ejemplar)){
                unlink("$soportes->Zip_libro/$soportes->ejemplar");
            }
            $filei = request()->file('ejemplar');
            $ejemplar= time()."_1".'Ejemplar_'.$filei->getClientOriginalName();
            $filei->move($soportes->Zip_libro,$ejemplar);            
        }

        $certilibroinves=null;
        if(isset($soportes->Certificadolibrodeinvestigacion)){
            $certilibroinves=$soportes->Certificadolibrodeinvestigacion;
        }
        if(request()->hasFile('certilibroinves'))
        {
            if(isset($soportes->Certificadolibrodeinvestigacion)){
                unlink("$soportes->Zip_libro/$soportes->Certificadolibrodeinvestigacion");
            }
            $filem = request()->file('certilibroinves');
            $certilibroinves= time()."_2".'CertificadoLibroInvestigacion_'.$filem->getClientOriginalName();
            $filem->move($soportes->Zip_libro,$certilibroinves);            
        }

        $cvlac=null;
        if(isset($soportes->Cvlac_libro)){
            $cvlac=$soportes->Cvlac_libro;
        }
        if(request()->hasFile('cvlac'))
        {
            if(isset($soportes->Cvlac_libro)){
                unlink("$soportes->Zip_libro/$soportes->Cvlac_libro");
            }
            $filecv = request()->file('cvlac');
            $cvlac= time()."_3CvLac_".$filecv->getClientOriginalName();
            $filecv->move($soportes->Zip_libro,$cvlac);            
        }

        $gruplac=null;
        if(isset($soportes->Gruplac_libro)){
            $gruplac=$soportes->Gruplac_libro;
        }
        if(request()->hasFile('gruplac'))
        {
            if(isset($soportes->Gruplac_libro)){
                unlink("$soportes->Zip_libro/$soportes->Gruplac_libro");
            }
            
            $filegru = request()->file('gruplac');
            $gruplac= time()."_4GrupLac_".$filegru->getClientOriginalName();
            $filegru->move($soportes->Zip_libro,$gruplac);            
        }


        $certieditorial=null;
        if(isset($soportes->Certificadoeditorial)){
            $certieditorial=$soportes->Certificadoeditorial;
        }
        if(request()->hasFile('certieditorial'))
        {
            if(isset($soportes->Certificadoeditorial)){
                unlink("$soportes->Zip_libro/$soportes->Certificadoeditorial");
            }
            $fileimp = request()->file('certieditorial');
            $certieditorial= time()."_6CertificadoEditorial_".$fileimp->getClientOriginalName();
            $fileimp->move($soportes->Zip_libro,$certieditorial);            
        }

        $soportes->update([
            'ejemplar' => $ejemplar,
            'Certificadolibrodeinvestigacion' => $certilibroinves,
            'Cvlac_libro' => $cvlac ,
            'Gruplac_libro' =>  $gruplac,
            'Certificadoeditorial' =>   $certieditorial
        ]);

        $productividad->update([
            'titulo' => $data['titulo'],
        ]); 


        return redirect()->route('productividades');
    }


    public function enviar(Solicitud $solicitud, Libro $libro ){
        $productividad=$solicitud->Productividad();
        $soportes=$libro->miSoportes();
        $d=auth()->user()->Docente();
        $data=request()->all();

            //dd($data);

        $tipo=null;
        if(isset($data['tipolibro'])){
        $tipo=$data['tipolibro'];
        }

        $idioma=null;
            if(isset($data['idioma'])){
            $idioma=$data['idioma'];
            }

        $credito=null;
            if(isset($data['credito'])){
            $credito=$data['credito'];
            }

        $libro->update([
            'fecha_publicacion' => $data['fecha'],
            'editorial' => $data['editorial'],
            'tipo_libro' => $tipo,
            'isbn' => $data['isbn'],
            'idioma' => $idioma,
            'noautores' => $data['noautores'],
            'creditoUpc_libro' => $credito,
        ]);

        $ejemplar=null;
        if(isset($soportes->ejemplar)){
            $ejemplar=$soportes->ejemplar;
        }
        if(request()->hasFile('ejemplar'))
        {
            if(isset($soportes->ejemplar)){
                unlink("$soportes->Zip_libro/$soportes->ejemplar");
            }
            $filei = request()->file('ejemplar');
            $ejemplar= time()."_1".'Ejemplar_'.$filei->getClientOriginalName();
            $filei->move($soportes->Zip_libro,$ejemplar);            
        }

        $certilibroinves=null;
        if(isset($soportes->Certificadolibrodeinvestigacion)){
            $certilibroinves=$soportes->Certificadolibrodeinvestigacion;
        }
        if(request()->hasFile('certilibroinves'))
        {
            if(isset($soportes->Certificadolibroinvestigacion)){
                unlink("$soportes->Zip_libro/$soportes->Certificadolibroinvestigacion");
            }
            $filem = request()->file('certilibroinves');
            $certilibroinves= time()."_2".'CertificadoLibroInvestigacion_'.$filem->getClientOriginalName();
            $filem->move($soportes->Zip_libro,$certilibroinves);            
        }

        $cvlac=null;
        if(isset($soportes->Cvlac_libro)){
            $cvlac=$soportes->Cvlac_libro;
        }
        if(request()->hasFile('cvlac'))
        {
            if(isset($soportes->Cvlac_libro)){
                unlink("$soportes->Zip_libro/$soportes->Cvlac_libro");
            }
            $filecv = request()->file('cvlac');
            $cvlac= time()."_3CvLac_".$filecv->getClientOriginalName();
            $filecv->move($soportes->Zip_libro,$cvlac);            
        }

        $gruplac=null;
        if(isset($soportes->Gruplac_libro)){
            $gruplac=$soportes->Gruplac_libro;
        }
        if(request()->hasFile('gruplac'))
        {
            if(isset($soportes->Gruplac_libro)){
                unlink("$soportes->Zip_libro/$soportes->Gruplac_libro");
            }
            $filegru = request()->file('gruplac');
            $gruplac= time()."_4GrupLac_".$filegru->getClientOriginalName();
            $filegru->move($soportes->Zip_libro,$gruplac);            
        }


        $certieditorial=null;
        if(isset($soportes->Certificadoeditorial)){
            $certieditorial=$soportes->Certificadoeditorial;
        }
        if(request()->hasFile('certieditorial'))
        {
            if(isset($soportes->Certificadoeditorial)){
                unlink("$soportes->Zip_libro/$soportes->Certificadoeditorial");
            }
            $fileimp = request()->file('certieditorial');
            $certieditorial= time()."_6CertificadoEditorial_".$fileimp->getClientOriginalName();
            $fileimp->move($soportes->Zip_libro,$certieditorial);            
        }

        $soportes->update([
            'ejemplar' => $ejemplar,
            'Certificadolibrodeinvestigacion' => $certilibroinves,
            'Cvlac_libro' => $cvlac ,
            'Gruplac_libro' =>  $gruplac,
            'Certificadoeditorial' =>   $certieditorial
        ]);

        $pa=round($pa=$libro->puntaje(),3);

        $solicitud->update([
            'estado' => 'Enviado',
            'fechasolicitud' => (date('Y-m-d')),
            'puntos_aprox' => $pa
        ]);

        $productividad->update([
            'titulo' => $data['titulo'],
        ]); 

        
        return redirect()->route('productividades');
    }


}
