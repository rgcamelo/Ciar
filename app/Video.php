<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $primaryKey = 'idvideo';

    protected $fillable =[
        'tipo','titulo','impacto','noautores_video'
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
        switch ($this->impacto) {
            case 'Internacional':
            case 'Nacional':
            
            Solicitud::create([
                'productividad_id' => $idp,
                'estado' => 'Enviado',
                'puntos_aprox' => $pa,
                'idconvocatoria' => $idc,
            ]);
            break;
            case 'Regional':
            case 'Local':
            
            Solicitud::create([
                'productividad_id' => $idp,
                'estado' => 'Enviado',
                'bonificacion_calculada' => $pa,
                'idconvocatoria' => $idc,
            ]);
            break;
        }
    }
}
