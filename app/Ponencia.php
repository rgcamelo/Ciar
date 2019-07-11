<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ponencia extends Model
{
    protected $primaryKey = 'idponencia';

    protected $fillable =[
        'nombreevento','fechaevento','tipoevento','idiomaponencia','lugarevento','paginaevento','creditoUpc_ponencia',
        'memorias','isbn','issn','ponenciasreconocidas','noautores_ponencia'
    ];
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }

    public function soportes($m,$cp,$cl,$gl,$f){
        Ponencia_Soportes::create([
            'idponencia' => $this->idponencia,
            'memoriaevento' => $m,
            'certificadoponente' => $cp,
            'Cvlacponencia' => $cl,
            'Gruplacponencia' => $gl,
            'Zipponencia' => $f, 
        ]);
    }

    public function puntaje(){
        switch($this->tipoevento){
            case 'Internacional':
            if($this->noautores_ponencia <= 3){
                return 84;               
            }
            elseif($this->noautores_ponencia <= 5){
               return 84/2; 
            }
            else{
                return 84/($this->noautores_ponencia/2);   
            }
            break;
            case 'Nacional':
            if($this->noautores_ponencia <= 3){
                return 48;               
            }
            elseif($this->noautores_ponencia <= 5){
               return 48/2; 
            }
            else{
                return 48/($this->noautores_ponencia/2);   
            }
            break;
            case 'Regional':
            if($this->noautores_ponencia <= 3){
                return 24;               
            }
            elseif($this->noautores_ponencia <= 5){
               return 24/2; 
            }
            else{
                return 24/($this->noautores_ponencia/2);   
            }
            break;
        }
    }

    public function solicitud($idp,$pa,$idc){
        Solicitud::create([
            'productividad_id' => $idp,
            'estado' => 'Enviado',
            'bonificacion_calculada' => $pa,
            'idconvocatoria' => $idc,
        ]);
    }

}
