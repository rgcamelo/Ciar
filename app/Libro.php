<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $primaryKey = 'idlibro';
    protected $fillable=[
        'idlibro','fecha_publicacion','tipo_libro','resultadoPares','editorial','isbn','idioma','noautores','creditoUpc_libro'
    ];

    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }

    public function soportes($ej, $cli, $cvlac, $gruplac, $ce, $z){
        Libro_Soportes::create([
            'id_libro' => $this->idlibro,         
            'ejemplar' => $ej,
            'Cvlac_libro' => $cvlac,
            'Gruplac_libro' => $gruplac,
            'Certificadolibrodeinvestigacion' => $cli,
            'Certificadoeditorial' => $ce,
            'Zip_libro' => $z
        ]);
    }

    public function PuntajeLTTLLE(){
        if($this->noautores <= 3){
            return 15;               
        }
        elseif($this->noautores <= 5){
           return 15/2; 
        }
        else{
            return 15/($this->noautores/2);   
        }
    }

    public function LibroInvestigacion(){
        if($this->noautores <= 3){
            return 20;               
        }
        elseif($this->noautores <= 5){
           return 20/2; 
        }
        else{
            return 20/($this->noautores/2);   
        }
    }
    public function puntaje(){
        //dd($this->tipo_libro);
        
        switch($this->tipo_libro){
            case 'Libro de texto':
            case 'Traduccion de Libro':
            case 'Libro de ensayo':
             return $this->PuntajeLTTLLE();
            break;
            case 'Libro resultado de un labor de investigacion':
             return $this->LibroInvestigacion();
            break;
        }
        
        
    }

    public function solicitud($idp,$pa,$idc,$estado){
        $solicitud=Solicitud::create([
            'productividad_id' => $idp,
            'estado' => $estado,
            'puntos_aprox' => $pa,
            'idconvocatoria' => $idc,
            'fechasolicitud' => (date('Y-m-d'))
        ]);

        $solicitud->ProDoc();
    }

    public function miSoportes(){
        $l=Libro_Soportes::where('id_libro', '=', $this->idlibro)->firstOrFail();
        return $l;
    }
}
