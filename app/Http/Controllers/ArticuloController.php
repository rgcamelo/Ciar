<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use Illuminate\Support\Facades\File;
use App\Solicitud;

class ArticuloController extends Controller
{
    public function nuevo(){
        return view('admin.articulo');
    }

    public function crear(){

        $d=auth()->user()->Docente();
        /*$data=request()->validate([
            'titulo' => 'required',
            'noautores' => 'required',
            'tiporevista' => 'required',
            'fechaarticulo' => 'required',
            'tipoarticulo' => 'required',
            'revista' => 'required',
            'issn' => 'required',
            'idioma' => 'required',
            'filiacion' => 'required',
            'puntossolicitados' => 'required',
            'bonificacionsolicitada' => 'required',
        ],[
            'titulo.required' => 'El Titulo es un campo requerido',
            'tipoarticulo.required' => 'El Tipo de articulo es un campo requerido',
            'noautores.required' =>  'El Numero de autores es un campo requerido',
            'tiporevista.required' => 'El Tipo de Revista es un campo requerido',
            'fechaarticulo.required' => 'La Fecha de publicacion es un campo requerido',
            'revista.required' =>  'El Nombre de la Revista es un campo requerido',
            'issn.required' =>  'El ISSN es un campo requerido',
            'idioma.required' =>  'El Idioma es un campo requerido',
            'filiacion.required' => 'La Evidencia de filiacion a la Upc es un campo requerido',
            'puntossolicitados.required' => 'El Puntaje solicitado es un campo requerido',
            'bonificacionsolicitada.required' => 'La Bonificacion solicitada es un campo requerido'
            ]);
        */

            $data=request()->all();
            $folder = 'archivos/articulo/'.$d->NombreCompleto.'_'.$d->iddocente.'_'.$data['titulo'].'_'.time();
            File::makeDirectory($folder);

            
            $articulo=Articulo::create([
                'fechapublicacion_articulo' => $data['fechaarticulo'],
                'tiporevista' => $data['tiporevista'],
                'tipo_publicacion' => $data['tipoarticulo'],
                'nombrerevista' => $data['revista'] ,
                'issn' => $data['issn'] ,
                'idioma_articulo' => $data['idioma'] ,
                'noautores_articulo' => $data['noautores'] ,
                'evidenciafiliacionUpc' => $data['filiacion'] ,
                'puntos_solicitados' => $data['puntossolicitados'] ,
                'bonificacion_solicitada' => $data['bonificacionsolicitada']
            ]);

            if(request()->hasFile('ejemplar'))
        {
            $filei = request()->file('ejemplar');
            $ejemplar= time()."_2".'Ejemplar_'.$filei->getClientOriginalName();
            $filei->move($folder,$ejemplar);            
        }
        if(request()->hasFile('cvlac'))
        {
            $filecv = request()->file('cvlac');
            $cvlac= time()."_4CvLac_".$filecv->getClientOriginalName();
            $filecv->move($folder,$cvlac);            
        }
        if(request()->hasFile('gruplac'))
        {
            $filegru = request()->file('gruplac');
            $gruplac= time()."_5GrupLac_".$filegru->getClientOriginalName();
            $filegru->move($folder,$gruplac);            
        }
        $certieditorial='';
        if(request()->hasFile('certieditorial'))
        {
            $filem = request()->file('certieditorial');
            $certieditorial= time()."_3".'CertificadoEditorial_'.$filem->getClientOriginalName();
            $filem->move($folder,$certieditorial);            
        }

        $articulo->soportes($ejemplar,$cvlac,$gruplac,$certieditorial,$folder);

        $productividad=$articulo->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $pa=$articulo->puntaje2();
        dd($pa);
        $pa=round($pa,3);
        
        $convocatoria=auth()->user()->convocatoria()->first();
        $articulo->solicitud($productividad->idproductividad, $pa,$convocatoria->idconvocatoria,'Enviado');
        
        return redirect()->route('solicitudes');
    }

    public function guardar(){
        $d=auth()->user()->Docente();

            $data=request()->all();

            $folder = 'archivos/articulo/'.$d->NombreCompleto.'_'.$d->iddocente.'_'.$data['titulo'].'_'.time();
            File::makeDirectory($folder);

            $tipo=null;
            if(isset($data['tipoarticulo'])){
            $tipo=$data['tipoarticulo'];
            }

            $tiporevista=null;
            if(isset($data['tiporevista'])){
            $tiporevista=$data['tiporevista'];
            }

            $idioma=null;
            if(isset($data['idioma'])){
            $idioma=$data['idioma'];
            }

            $filiacion=null;
            if(isset($data['filiacion'])){
            $filiacion=$data['filiacion'];
            }

            $tiporevista=null;
            if(isset($data['tiporevista'])){
            $tiporevista=$data['tiporevista'];
            }

            $articulo=Articulo::create([
                'fechapublicacion_articulo' => $data['fechaarticulo'],
                'tiporevista' => $tiporevista,
                'tipo_publicacion' => $tipo,
                'nombrerevista' => $data['revista'] ,
                'issn' => $data['issn'] ,
                'idioma_articulo' => $idioma,
                'noautores_articulo' => $data['noautores'] ,
                'evidenciafiliacionUpc' => $filiacion ,
                'puntos_solicitados' => $data['puntossolicitados'] ,
                'bonificacion_solicitada' => $data['bonificacionsolicitada']
            ]);

            $ejemplar=null;
            if(request()->hasFile('ejemplar'))
        {
            $filei = request()->file('ejemplar');
            $ejemplar= time()."_2".'Ejemplar_'.$filei->getClientOriginalName();
            $filei->move($folder,$ejemplar);            
        }
        
        $cvlac=null;
        if(request()->hasFile('cvlac'))
        {
            $filecv = request()->file('cvlac');
            $cvlac= time()."_4CvLac_".$filecv->getClientOriginalName();
            $filecv->move($folder,$cvlac);            
        }
        $gruplac=null;
        if(request()->hasFile('gruplac'))
        {
            $filegru = request()->file('gruplac');
            $gruplac= time()."_5GrupLac_".$filegru->getClientOriginalName();
            $filegru->move($folder,$gruplac);            
        }
        $certieditorial=null;
        if(request()->hasFile('certieditorial'))
        {
            $filem = request()->file('certieditorial');
            $certieditorial= time()."_3".'CertificadoEditorial_'.$filem->getClientOriginalName();
            $filem->move($folder,$certieditorial);            
        }

        
        $soportes=$articulo->soportes($ejemplar,$cvlac,$gruplac,$certieditorial,$folder);
        $productividad=$articulo->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $convocatoria=auth()->user()->convocatoria()->first();
        $articulo->solicitud($productividad->idproductividad, 0,$convocatoria->idconvocatoria,'Incompleta');
        
        return redirect()->route('productividades');
    }

    public function editar(Solicitud $solicitud, Articulo $articulo ){
        $productividad=$solicitud->Productividad();
        $soportes=$articulo->miSoportes();
        return view('admin.articuloedit',['solicitud' => $solicitud, 'articulo' => $articulo, 'productividad' => $productividad, 'soportes' => $soportes]);
    }


    public function actualizar(Solicitud $solicitud, Articulo $articulo ){
        $productividad=$solicitud->Productividad();
        $soportes=$articulo->miSoportes();
        $data=request()->all();
        $tipo=null;
            if(isset($data['tipoarticulo'])){
            $tipo=$data['tipoarticulo'];
            }

            $tiporevista=null;
            if(isset($data['tiporevista'])){
            $tiporevista=$data['tiporevista'];
            }

            $idioma=null;
            if(isset($data['idioma'])){
            $idioma=$data['idioma'];
            }

            $filiacion=null;
            if(isset($data['filiacion'])){
            $filiacion=$data['filiacion'];
            }

            $tiporevista=null;
            if(isset($data['tiporevista'])){
            $tiporevista=$data['tiporevista'];
            }

            $productividad->update([
                'titulo' => $data['titulo']
            ]);

            $articulo->update([
                'fechapublicacion_articulo' => $data['fechaarticulo'],
                'tiporevista' => $tiporevista,
                'tipo_publicacion' => $tipo,
                'nombrerevista' => $data['revista'] ,
                'issn' => $data['issn'] ,
                'idioma_articulo' => $idioma,
                'noautores_articulo' => $data['noautores'] ,
                'evidenciafiliacionUpc' => $filiacion ,
                'puntos_solicitados' => $data['puntossolicitados'] ,
                'bonificacion_solicitada' => $data['bonificacionsolicitada']
            ]);

        $ejemplar=null;
        if(isset($soportes->ejemplar_articulo)){
            $ejemplar=$soportes->ejemplar_articulo;
        }
        if(request()->hasFile('ejemplar'))
        {
            if(isset($soportes->ejemplar_articulo)){
                unlink("$soportes->Zip_articulo/$soportes->ejemplar_articulo");
            }
            $filei = request()->file('ejemplar');
            $ejemplar= time()."_2".'Ejemplar_'.$filei->getClientOriginalName();
            $filei->move($soportes->Zip_articulo,$ejemplar);            
        }
        

        $cvlac=null;
        if(isset($soportes->Cvlac_articulo)){
            $cvlac=$soportes->Cvlac_articulo;
        }
        if(request()->hasFile('cvlac'))
        {
            if(isset($soportes->Cvlac_articulo)){
                unlink("$soportes->Zip_articulo/$soportes->Cvlac_articulo");
            }
            $filecv = request()->file('cvlac');
            $cvlac= time()."_4CvLac_".$filecv->getClientOriginalName();
            $filecv->move($soportes->Zip_articulo,$cvlac);            
        }
        
        $gruplac=null;
        if(isset($soportes->Gruplac_articulo)){
            $gruplac=$soportes->Gruplac_articulo;
        }
        if(request()->hasFile('gruplac'))
        {
            if(isset($soportes->Gruplac_articulo)){
                unlink("$soportes->Zip_articulo/$soportes->Gruplac_articulo");
            }
            $filegru = request()->file('gruplac');
            $gruplac= time()."_5GrupLac_".$filegru->getClientOriginalName();
            $filegru->move($soportes->Zip_articulo,$gruplac);            
        }


        $certieditorial=null;
        if(isset($soportes->Evidenciarevista)){
            $certieditorial=$soportes->Evidenciarevista;
        }
        if(request()->hasFile('certieditorial'))
        {
            if(isset($soportes->Evidenciarevista)){
                unlink("$soportes->Zip_articulo/$soportes->Evidenciarevista");
            }
            $filem = request()->file('certieditorial');
            $certieditorial= time()."_3".'CertificadoEditorial_'.$filem->getClientOriginalName();
            $filem->move($soportes->Zip_articulo,$certieditorial);            
        }

        $soportes->update([
            'ejemplar_articulo' => $ejemplar,
            'Cvlac_articulo' => $cvlac,
            'Gruplac_articulo'=> $gruplac,
            'Evidenciarevista' => $certieditorial
        ]);

        return redirect()->route('productividades');
    }

    public function enviar(Solicitud $solicitud, Articulo $articulo ){
        $productividad=$solicitud->Productividad();
        $soportes=$articulo->miSoportes();

        $data=request()->all();
        $tipo=null;
            if(isset($data['tipoarticulo'])){
            $tipo=$data['tipoarticulo'];
            }

            $tiporevista=null;
            if(isset($data['tiporevista'])){
            $tiporevista=$data['tiporevista'];
            }

            $idioma=null;
            if(isset($data['idioma'])){
            $idioma=$data['idioma'];
            }

            $filiacion=null;
            if(isset($data['filiacion'])){
            $filiacion=$data['filiacion'];
            }

            $tiporevista=null;
            if(isset($data['tiporevista'])){
            $tiporevista=$data['tiporevista'];
            }

            $productividad->update([
                'titulo' => $data['titulo']
            ]);

            $articulo->update([
                'fechapublicacion_articulo' => $data['fechaarticulo'],
                'tiporevista' => $tiporevista,
                'tipo_publicacion' => $tipo,
                'nombrerevista' => $data['revista'] ,
                'issn' => $data['issn'] ,
                'idioma_articulo' => $idioma,
                'noautores_articulo' => $data['noautores'] ,
                'evidenciafiliacionUpc' => $filiacion ,
                'puntos_solicitados' => $data['puntossolicitados'] ,
                'bonificacion_solicitada' => $data['bonificacionsolicitada']
            ]);

        $ejemplar=null;
        if(isset($soportes->ejemplar_articulo)){
            $ejemplar=$soportes->ejemplar_articulo;
        }
        if(request()->hasFile('ejemplar'))
        {
            if(isset($soportes->ejemplar_articulo)){
                unlink("$soportes->Zip_articulo/$soportes->ejemplar_articulo");
            }
            $filei = request()->file('ejemplar');
            $ejemplar= time()."_2".'Ejemplar_'.$filei->getClientOriginalName();
            $filei->move($soportes->Zip_articulo,$ejemplar);            
        }
        

        $cvlac=null;
        if(isset($soportes->Cvlac_articulo)){
            $cvlac=$soportes->Cvlac_articulo;
        }
        if(request()->hasFile('cvlac'))
        {
            if(isset($soportes->Cvlac_articulo)){
                unlink("$soportes->Zip_articulo/$soportes->Cvlac_articulo");
            }
            $filecv = request()->file('cvlac');
            $cvlac= time()."_4CvLac_".$filecv->getClientOriginalName();
            $filecv->move($soportes->Zip_articulo,$cvlac);            
        }
        
        $gruplac=null;
        if(isset($soportes->Gruplac_articulo)){
            $gruplac=$soportes->Gruplac_articulo;
        }
        if(request()->hasFile('gruplac'))
        {
            if(isset($soportes->Gruplac_articulo)){
                unlink("$soportes->Zip_articulo/$soportes->Gruplac_articulo");
            }
            $filegru = request()->file('gruplac');
            $gruplac= time()."_5GrupLac_".$filegru->getClientOriginalName();
            $filegru->move($soportes->Zip_articulo,$gruplac);            
        }


        $certieditorial=null;
        if(isset($soportes->Evidenciarevista)){
            $certieditorial=$soportes->Evidenciarevista;
        }
        if(request()->hasFile('certieditorial'))
        {
            if(isset($soportes->Evidenciarevista)){
                unlink("$soportes->Zip_articulo/$soportes->Evidenciarevista");
            }
            $filem = request()->file('certieditorial');
            $certieditorial= time()."_3".'CertificadoEditorial_'.$filem->getClientOriginalName();
            $filem->move($soportes->Zip_articulo,$certieditorial);            
        }

        $pa=round($pa=$articulo->puntaje(),3);
        $soportes->update([
            'ejemplar_articulo' => $ejemplar,
            'Cvlac_articulo' => $cvlac,
            'Gruplac_articulo'=> $gruplac,
            'Evidenciarevista' => $certieditorial
        ]);

        $solicitud->update([
            'estado' => 'Enviado',
            'fechasolicitud' => (date('Y-m-d')),
            'puntos_aprox' => $pa
        ]);

        return redirect()->route('productividades');
    }
}
