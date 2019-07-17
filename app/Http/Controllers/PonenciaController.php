<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ponencia;
use Illuminate\Support\Facades\File;

class PonenciaController extends Controller
{
    public function nuevo(){
        return view('admin.ponencia');
    }

    public function crear(){
        $d=auth()->user()->Docente();

        $data=request()->validate([
            'titulo' => 'required',
            'nombreevento' => 'required',
            'fechaevento' => 'required',
            'lugarevento' => 'required',
            'tipoevento' => 'required',
            'idioma' => 'required',
            'noautores' => 'required',
            'paginaevento' => 'required',
            'credito' => 'required',
            'memoria' => 'required',
            'issn' => '',
            'isbn' => '',
            'ponencias' => '',

        ],[
            'titulo.required' => 'El titulo del evento es un campo requerdio',
            'nombreevento.required' => 'El nombre del evento  es un campo requerdio',
            'fechaevento.required' => 'La fecha del evento  es un campo requerdio',
            'lugarevento.required' => 'El lugar del evento  es un campo requerdio',
            'tipoevento.required' => 'El tipo de evento  es un campo requerdio',
            'idioma.required' => 'El idioma  es un campo requerdio',
            'noautores.required' => 'El numero de autores es un campo requerdio',
            'paginaevento.required' => 'La pagina del evento es un campo requerdio',
            'credito.required' => 'Indicar si hay credito a la Upc es un campo requerdio',
            'memoria.required' => 'Indicar si hay memorias es un campo requerdio',
        ]);


        $folder = 'archivos/ponencia/'.$d->NombreCompleto.'_'.$d->id.'_'.$data['titulo'].'_'.time();
        File::makeDirectory($folder);

        $ponencia=Ponencia::create([
            'nombreevento' => $data['nombreevento'],
            'fechaevento' => $data['fechaevento'],
            'lugarevento' => $data['lugarevento'],
            'tipoevento' => $data['tipoevento'],
            'idiomaponencia' => $data['idioma'],
            'noautores_ponencia' => $data['noautores'],
            'paginaevento' => $data['paginaevento'],
            'creditoUpc_ponencia' => $data['credito'],
            'memorias' => $data['memoria'],
            'issn' => $data['issn'],
            'isbn' => $data['isbn'],
            'ponenciasreconocidas' => $data['ponencias'],
        ]);

        if(request()->hasFile('memoria'))
        {
            $fileimp = request()->file('memoria');
            $memoria= time()."_1Memoria_".$fileimp->getClientOriginalName();
            $fileimp->move($folder,$memoria);            
        }
        if(request()->hasFile('cvlac'))
        {
            $filecv = request()->file('cvlac');
            $cvlac= time()."_2CvLac_".$filecv->getClientOriginalName();
            $filecv->move($folder,$cvlac);            
        }
        if(request()->hasFile('gruplac'))
        {
            $filegru = request()->file('gruplac');
            $gruplac= time()."_3GrupLac_".$filegru->getClientOriginalName();
            $filegru->move($folder,$gruplac);            
        }
        $certieponente='';
        if(request()->hasFile('certieponente'))
        {
            $fileimp = request()->file('certieponente');
            $certieponente= time()."_4CertificadoPonente_".$fileimp->getClientOriginalName();
            $fileimp->move($folder,$certieponente);            
        }

        $ponencia->soportes($memoria,$certieponente, $cvlac,$gruplac,$folder);

        $productividad=$ponencia->productividad()->create([
            'id_docente' => $d->iddocente,
            'titulo' => $data['titulo'],
        ]); 

        $pa=round($pa=$ponencia->puntaje(),3);
        $convocatoria=auth()->user()->convocatoria()->first();
        $ponencia->solicitud($productividad->idproductividad, $pa, $convocatoria->idconvocatoria);

        return redirect()->route('dashboard');
    }

}
