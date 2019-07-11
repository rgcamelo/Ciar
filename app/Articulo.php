<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $primaryKey = 'id_articulo';

    protected $fillable = [
        'fechapublicacion_articulo','nombrerevista','issn','idioma_articulo',
        'noautores_articulo','evidenciafiliacionUpc','puntos_solicitados',
        'bonificacion_solicitada','tipo_publicacion','tiporevista'
    ];

    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }

    public function soportes($ej, $cvlac, $gruplac, $ce, $z){
        Articulo_Soporte::create([
            'idarticulo' => $this->id_articulo,         
            'ejemplar_articulo' => $ej,
            'Cvlac_articulo' => $cvlac,
            'Gruplac_articulo' => $gruplac,
            'Evidenciarevista' => $ce,
            'Zip_articulo' => $z
        ]);
    }

    public function puntaje(){       
        switch($this->tipo_publicacion){
            case 'Articulo Tradicional':
            switch($this->tiporevista){
                case 'A1':
                if($this->noautores_articulo <= 3){
                    return 15;               
                }
                elseif($this->noautores_articulo <= 5){
                   return 15/2; 
                }
                else{
                    return 15/($this->noautores_articulo/2);   
                }
                break;
                case 'A2':
                if($this->noautores_articulo <= 3){
                    return 12;               
                }
                elseif($this->noautores_articulo <= 5){
                   return 12/2; 
                }
                else{
                    return 12/($this->noautores_articulo/2);   
                }
                break;
                case 'B':
                if($this->noautores_articulo <= 3){
                    return 8;               
                }
                elseif($this->noautores_articulo <= 5){
                   return 8/2; 
                }
                else{
                    return 8/($this->noautores_articulo/2);   
                }
                break;
                case 'C':
                if($this->noautores_articulo <= 3){
                    return 3;               
                }
                elseif($this->noautores_articulo <= 5){
                   return 3/2; 
                }
                else{
                    return 3/($this->noautores_articulo/2);   
                }
                break;
            }
            break;
            case 'Articulo Corto':
            switch($this->tiporevista){
                case 'A1':
                if($this->noautores_articulo <= 3){
                    return 15*0.6;               
                }
                elseif($this->noautores_articulo <= 5){
                   return 15*0.6/2; 
                }
                else{
                    return 15*0.6/($this->noautores_articulo/2);   
                }
                break;
                case 'A2':
                if($this->noautores_articulo <= 3){
                    return 12*0.6;               
                }
                elseif($this->noautores_articulo <= 5){
                   return 12*0.6/2; 
                }
                else{
                    return 12*0.6/($this->noautores_articulo/2);   
                }
                break;
                case 'B':
                if($this->noautores_articulo <= 3){
                    return 8*0.6;               
                }
                elseif($this->noautores_articulo <= 5){
                   return 8*0.6/2; 
                }
                else{
                    return 8*0.6/($this->noautores_articulo/2);   
                }
                break;
                case 'C':
                if($this->noautores_articulo <= 3){
                    return 3*0.6;               
                }
                elseif($this->noautores_articulo <= 5){
                   return 3*0.6/2; 
                }
                else{
                    return 3*0.6/($this->noautores_articulo/2);   
                }
                break;
            }
            break;
            case 'Reporte de Caso':
            case 'Revision de Tema':
            case 'Carta al Editor':
            case 'Editorial':
            switch($this->tiporevista){
                case 'A1':
                if($this->noautores_articulo <= 3){
                    return 15*0.3;               
                }
                elseif($this->noautores_articulo <= 5){
                   return 15*0.3/2; 
                }
                else{
                    return 15*0.3/($this->noautores_articulo/2);   
                }
                break;
                case 'A2':
                if($this->noautores_articulo <= 3){
                    return 12*0.3;               
                }
                elseif($this->noautores_articulo <= 5){
                   return 12*0.3/2; 
                }
                else{
                    return 12*0.3/($this->noautores_articulo/2);   
                }
                break;
                case 'B':
                if($this->noautores_articulo <= 3){
                    return 8*0.3;               
                }
                elseif($this->noautores_articulo <= 5){
                   return 8*0.3/2; 
                }
                else{
                    return 8*0.3/($this->noautores_articulo/2);   
                }
                break;
                case 'C':
                if($this->noautores_articulo <= 3){
                    return 3*0.3;               
                }
                elseif($this->noautores_articulo <= 5){
                   return 3*0.3/2; 
                }
                else{
                    return 3*0.3/($this->noautores_articulo/2);   
                }
                break;
            }
            break;
        }
    }

    public function solicitud($idp,$pa,$idc){
        Solicitud::create([
            'productividad_id' => $idp,
            'estado' => 'Enviado',
            'puntos_aprox' => $pa,
            'idconvocatoria' => $idc

        ]);
    }
}
