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
            'titulo.required' => 'El es un campo requerido',
            'noautores.required' =>  'El es un campo requerido',
            'tipolibro.required' => 'El es un campo requerido',
            'fecha.required' => 'El es un campo requerido',
            'editorial.required' =>  'El es un campo requerido',
            'isbn.required' =>  'El es un campo requerido',
            'idioma.required' =>  'El es un campo requerido',
            'impacto.required' => 'El es un campo requerido'   ]);

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
            $ejemplar= time()."_2".'Ejemplar_'.$filei->getClientOriginalName();
            $filei->move($folder,$ejemplar);            
        }
        $certilibroinves='';
        if(request()->hasFile('certilibroinves'))
        {
            $filem = request()->file('certilibroinves');
            $certilibroinves= time()."_3".'CertificadoLibroInvestigacion_'.$filem->getClientOriginalName();
            $filem->move($folder,$certilibroinves);            
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
            $fileimp = request()->file('certieditorial');
            $certieditorial= time()."_6CertificadoEditorial_".$fileimp->getClientOriginalName();
            $fileimp->move($folder,$certieditorial);            
        }

        $libro->soportes($ejemplar,$certilibroinves, $cvlac,$gruplac,$certieditorial);

        $productividad=$libro->productividad()->create([
            'id_docente' => $d->id,
            'titulo' => $data['titulo'],
        ]); 

        $pa=$libro->puntaje();

        $libro->solicitud($productividad->idproductividad, $pa);

        return redirect()->route('dashboard');
        //dd($productividad->idproductividad);
    }
}
