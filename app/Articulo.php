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
        
        $s=Articulo_Soporte::create([
            'idarticulo' => $this->id_articulo,         
            'ejemplar_articulo' => $ej,
            'Cvlac_articulo' => $cvlac,
            'Gruplac_articulo' => $gruplac,
            'Evidenciarevista' => $ce,
            'Zip_articulo' => $z
        ]);

        return $s;
    }

    public function puntaje2(){
        switch($this->tipo_publicacion){
            case 'Articulo Tradicional':
             return $this->ArticuloTradicionalTipo();
            break;
            case 'Articulo Corto':
             return $this->ArticuloCortoTipo();
            break;
            case 'Reporte de Caso':
            case 'Revision de Tema':
            case 'Carta al Editor':
            case 'Editorial':
             return $this->OtrosTipos();
            break;
        }
    }

    public function ArticuloTradicionalA1(){
        if($this->noautores_articulo <= 3){

            return 15;               
        }
        elseif($this->noautores_articulo <= 5){
           return 15/2; 
        }
        else{
            return 15/($this->noautores_articulo/2);   
        }
    }

    public function ArticuloTradicionalA2(){
        if($this->noautores_articulo <= 3){
            return 12;               
        }
        elseif($this->noautores_articulo <= 5){
           return 12/2; 
        }
        else{
            return 12/($this->noautores_articulo/2);   
        }
    }

    public function ArticuloTradicionalB(){
        if($this->noautores_articulo <= 3){
            return 8;               
        }
        elseif($this->noautores_articulo <= 5){
           return 8/2; 
        }
        else{
            return 8/($this->noautores_articulo/2);   
        }
    }


    public function ArticuloTradicionalC(){
        if($this->noautores_articulo <= 3){
            return 3;               
        }
        elseif($this->noautores_articulo <= 5){
           return 3/2; 
        }
        else{
            return 3/($this->noautores_articulo/2);   
        }
    }


    public function ArticuloTradicionalTipo(){
        switch($this->tiporevista){
            case 'A1':
             return $this->ArticuloTradicionalA1();
            break;
            case 'A2':
             return $this->ArticuloTradicionalA2();
            break;
            case 'B':
             return $this->ArticuloTradicionalB();
            break;
            case 'C':
             return $this->ArticuloTradicionalC();
            break;
        }
    }

    public function ArticuloCortoA1(){
        if($this->noautores_articulo <= 3){
            return 15*0.6;               
        }
        elseif($this->noautores_articulo <= 5){
           return 15*0.6/2; 
        }
        else{
            return 15*0.6/($this->noautores_articulo/2);   
        }
    }

    public function ArticuloCortoA2(){
        if($this->noautores_articulo <= 3){
            return 12*0.6;               
        }
        elseif($this->noautores_articulo <= 5){
           return 12*0.6/2; 
        }
        else{
            return 12*0.6/($this->noautores_articulo/2);   
        }
    }

    public function ArticuloCortoB(){
        if($this->noautores_articulo <= 3){
            return 8*0.6;               
        }
        elseif($this->noautores_articulo <= 5){
           return 8*0.6/2; 
        }
        else{
            return 8*0.6/($this->noautores_articulo/2);   
        }
    }

    public function ArticuloCortoC(){
        if($this->noautores_articulo <= 3){
            return 3*0.6;               
        }
        elseif($this->noautores_articulo <= 5){
           return 3*0.6/2; 
        }
        else{
            return 3*0.6/($this->noautores_articulo/2);   
        }
    }
    public function ArticuloCortoTipo(){
        switch($this->tiporevista){
            case 'A1':
             return $this->ArticuloCortoA1();
            break;
            case 'A2':
             return $this->ArticuloCortoA2();
            break;
            case 'B':
             return $this->ArticuloCortoB();
            break;
            case 'C':
             return $this->ArticuloCortoC();
            break;
        }
    }

    public function OtrosA1(){
        if($this->noautores_articulo <= 3){
            return 15*0.3;               
        }
        elseif($this->noautores_articulo <= 5){
           return 15*0.3/2; 
        }
        else{
            return 15*0.3/($this->noautores_articulo/2);   
        }
    }

    public function OtrosA2(){
        if($this->noautores_articulo <= 3){
            return 12*0.3;               
        }
        elseif($this->noautores_articulo <= 5){
           return 12*0.3/2; 
        }
        else{
            return 12*0.3/($this->noautores_articulo/2);   
        }
    }

    public function OtrosB(){
        if($this->noautores_articulo <= 3){
            return 8*0.3;               
        }
        elseif($this->noautores_articulo <= 5){
           return 8*0.3/2; 
        }
        else{
            return 8*0.3/($this->noautores_articulo/2);   
        }
    }

    public function OtrosC(){
        if($this->noautores_articulo <= 3){
            return 3*0.3;               
        }
        elseif($this->noautores_articulo <= 5){
           return 3*0.3/2; 
        }
        else{
            return 3*0.3/($this->noautores_articulo/2);   
        }
    }

    public function OtrosTipos(){
        switch($this->tiporevista){
            case 'A1':
             return $this->OtrosA1();
            break;
            case 'A2':
             return $this->OtrosA2();
            break;
            case 'B':
             return $this->OtrosB();
            break;
            case 'C':
             return $this->OtrosC();
            break;
        }
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

    public function solicitud($idp,$pa,$idc,$estado){
        $solicitud=Solicitud::create([
            'productividad_id' => $idp,
            'estado' => $estado,
            'puntos_aprox' => $pa,
            'idconvocatoria' => $idc,
            'fechasolicitud' => (date('Y-m-d'))

        ]);

        $solicitud->Prodoc();
    }

    public function miSoportes(){
      $s=Articulo_Soporte::where('idarticulo', '=', $this->id_articulo)->firstOrFail();
        return $s;
    }
}
