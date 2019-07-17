<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use Illuminate\Support\Facades\File;

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
        $folder = 'archivos/libro/'.$d->NombreCompleto.'_'.$d->id.'_'.$data['titulo'].'_'.time();
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
        $libro->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria);

        return redirect()->route('dashboard');
        //dd($productividad->idproductividad);
    }
}
