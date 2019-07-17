<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicacionImpresa extends Model
{
    protected $primaryKey = 'idpublicacionimpresa';

    protected $fillable =[
        'noautores'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }

    public function puntaje(){
        $a=$this->autores();

        $p=(60)/$a;
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

    public function solicitud($idp,$pa,$idc){
            Solicitud::create([
                'productividad_id' => $idp,
                'estado' => 'Enviado',
                'bonificacion_calculada' => $pa,
                'idconvocatoria' => $idc,
                'fechasolicitud' => (date('Y-m-d'))
            ]);
    }
}
