<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use Illuminate\Support\Facades\File;

class ArticuloController extends Controller
{
    public function nuevo(){
        return view('admin.articulo');
    }

    public function crear(){

        $d=auth()->user()->Docente();
        $data=request()->validate([
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

            $folder = 'archivos/articulo/'.$d->NombreCompleto.'_'.$d->id.'_'.$data['titulo'].'_'.time();
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
            'id_docente' => $d->id,
            'titulo' => $data['titulo'],
        ]); 

        $pa=$articulo->puntaje();
        $convocatoria=auth()->user()->convocatoria()->first();
        $articulo->solicitud($productividad->idproductividad, $pa,$convocatoria->idconvocatoria);
        
        return redirect()->route('dashboard');
    }
}
