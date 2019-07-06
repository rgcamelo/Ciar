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

    public function puntaje(){
        //dd($this->tipo_libro);
        
        switch($this->tipo_libro){
            case 'libro de texto':
            if($this->noautores <= 3){
                return 15;               
            }
            elseif($this->noautores <= 5){
               return 15/2; 
            }
            else{
                return 15/($this->noautores/2);   
            }
            break;
            case 'libro de ensayo':
            if($this->noautores <= 3){
                return 15;               
            }
            elseif($this->noautores <= 5){
               return 15/2; 
            }
            else{
                return 15/($this->noautores/2);   
            }
            break;
            case 'libro resultado de un labor de investigacion':
            if($this->noautores <= 3){
                return 20;               
            }
            elseif($this->noautores <= 5){
               return 20/2; 
            }
            else{
                return 20/($this->noautores/2);   
            }
            break;
        }
        
        
    }

    public function solicitud($idp,$pa){
        Solicitud::create([
            'productividad_id' => $idp,
            'estado' => 'Enviado',
            'puntos_aprox' => $pa,

        ]);
    }
}
