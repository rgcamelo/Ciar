<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traduccion extends Model
{
    protected $primaryKey = 'idtraduccion';

    protected $fillable =[
        'tipo','noautores'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }

    public function puntaje(){
        $a=$this->autores();
        $t=$this->tipo();

        $p=($t)/$a;
        return $p;
    }

    public function autores(){
        switch($this->noautores){
            case $this->noautores <= 3:
            $p=1;
            return $p;
            break;
            case $this->noautores <=5:
            $p=2;
            return $p;
            default:
            $p=$this->noautores/2;
            return $p;
             break;
        }
    }


    public function tipo(){
        switch ($this->tipo) {
            case 'De Libro':
                return 15;
                break;
            case 'De Articulo':
                return 36;
                break;
        }
    }

    public function solicitud($idp,$pa,$idc){
        switch ($this->tipo) {
            case 'De Libro':
            Solicitud::create([
                'productividad_id' => $idp,
                'estado' => 'Enviado',
                'puntos_aprox' => $pa,
                'idconvocatoria' => $idc,
                'fechasolicitud' => (date('Y-m-d'))
            ]);
            break;
            case 'De Articulo':
            Solicitud::create([
                'productividad_id' => $idp,
                'estado' => 'Enviado',
                'bonificacion_calculada' => $pa,
                'idconvocatoria' => $idc,
                'fechasolicitud' => (date('Y-m-d'))
            ]);
            break;
        }
    }
}
