<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DireccionTesis extends Model
{
    protected $primaryKey = 'iddireccion';

    protected $fillable =[
        'noautores','tipo'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }

    public function puntaje(){
        $a=$this->autores();
        $i=$this->tipo();

        $p=($i)/$a;
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
            case 'De Maestria':
                return 36;
                break;
            case 'De Doctorado o Equivalentes':
                return 72;
                break;
        }
    }

    public function solicitud($idp,$pa,$idc,$estado){
        $productividad=Productividad::find($idp)->Docente()->Productividad();
        if (isset($productividad->idprodoc)){
            if($productividad->direccion <3){
                $solicitud=Solicitud::create([
                    'productividad_id' => $idp,
                    'estado' => $estado,
                    'bonificacion_calculada' => $pa,
                    'idconvocatoria' => $idc,
                    'fechasolicitud' => (date('Y-m-d'))
                ]);
            }
        
        }
        else {
            $solicitud=Solicitud::create([
                'productividad_id' => $idp,
                'estado' => $estado,
                'bonificacion_calculada' => $pa,
                'idconvocatoria' => $idc,
                'fechasolicitud' => (date('Y-m-d'))
            ]);
            $solicitud->ProDoc();
        }
            

        
}



}
