<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstudiosPostdoctorales extends Model
{
    protected $primaryKey = 'idestudiopost';

    protected $fillable =[
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }

    public function puntaje(){
        $p=120;
        return $p;
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
