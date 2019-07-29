<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Video extends Model
{
    protected $primaryKey = 'idvideo';

    protected $fillable =[
        'tipo','impacto','noautores_video'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }

    public function puntaje(){
        $a=$this->autores();
        $i=$this->impacto();
        $t=$this->tipo();

        $p=($i*$t)/$a;
        return $p;
    }

    public function autores(){
        switch($this->noautores_video){
            case $this->noautores_video <= 3:
            $p=1;
            return $p;
            break;
            case $this->noautores_video <=5:
            $p=2;
            return $p;
            default:
            $p=$this->noautores_video/2;
            return $p;
             break;
        }
    }

    public function impacto(){
        switch ($this->impacto) {
            case 'Internacional':
                return 12;
                break;
            case 'Nacional':
                return 7;
                break;
            case 'Regional':
                return 48;
                break;
            case 'Local':
                return 48;
                break;
            default:

        }
    }

    public function tipo(){
        switch ($this->tipo) {
            case 'Didactico':
                return 1;
                break;
            case 'Documental':
                return 0.8;
                break;
        }
    }

    public function solicitud($idp,$pa,$idc){

        $productividad=Productividad::find($idp)->Docente()->Productividad();

        switch ($this->impacto) {
            case 'Internacional':
            case 'Nacional':
            if (isset(auth()->user()->Docente()->Productividad()->idprodoc)) {
                if ($productividad->videos > 5) {
                    // Decirle al usuario que no puede registrar mas esta productividad
                }
                else {
                    $solicitud=$this->hacersolicitudpuntos($idp,$pa,$idc,'Enviado');
                }
            } else {
                $solicitud=$this->hacersolicitudpuntos($idp,$pa,$idc,'Enviado');
                $solicitud->ProDoc();
            }   
            break;
            case 'Regional':
            case 'Local':
            if (isset(auth()->user()->Docente()->Productividad()->idprodoc)) {
                if($productividad->videosbon > 5){
                    // Decirle al usuario que no puede registrar mas esta productividad
                }else {
                    $solicitud=$this->hacersolicitud($idp,$pa,$idc,'Enviado');
                }
            } else {
                $solicitud=$this->hacersolicitud($idp,$pa,$idc,'Enviado');
                $solicitud->ProDoc();
            }
            break;
        }
    }

    public function hacersolicitud($idp,$pa,$idc,$estado ){
        $solicitud=Solicitud::create([
            'productividad_id' => $idp,
            'estado' => $estado,
            'bonificacion_calculada' => $pa,
            'idconvocatoria' => $idc,
            'fechasolicitud' => (date('Y-m-d'))
        ]);

        return $solicitud;
        
    }

    public function hacersolicitudpuntos($idp,$pa,$idc,$estado ){
        $solicitud=Solicitud::create([
            'productividad_id' => $idp,
            'estado' => $estado,
            'puntos_aprox' => $pa,
            'idconvocatoria' => $idc,
            'fechasolicitud' => (date('Y-m-d'))
        ]);

        return $solicitud;
        
    }
    
}
