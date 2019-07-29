<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReseñasCriticas extends Model
{
    protected $primaryKey = 'idreseña';

    protected $fillable =[
        'noautores'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }

    public function puntaje(){
        $a=$this->autores();

        $p=(12)/$a;
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
        $productividad=Productividad::find($idp)->Docente()->Productividad();
        if (isset($productividad->idprodoc)){
            if($productividad->reseñas < 5){
                $solicitud=Solicitud::create([
                    'productividad_id' => $idp,
                    'estado' => 'Enviado',
                    'bonificacion_calculada' => $pa,
                    'idconvocatoria' => $idc,
                    'fechasolicitud' => (date('Y-m-d'))
                ]);
            }
        }
        else {
            $solicitud=Solicitud::create([
                'productividad_id' => $idp,
                'estado' => 'Enviado',
                'bonificacion_calculada' => $pa,
                'idconvocatoria' => $idc,
                'fechasolicitud' => (date('Y-m-d'))
            ]);
            $solicitud->ProDoc();
        }
            
            
    }
}
