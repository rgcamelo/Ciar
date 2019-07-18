<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productividad extends Model
{
    protected $primaryKey = 'idproductividad';
    protected $fillable = [
        'id_docente','titulo',
    ];

    public function productividadable(){
        return $this->morphTo();
    }

    public function Tipo(){
        return $this->productividadable_type;
    }

    public function Docente(){
        $idu=auth()->user()->id_docente;
        $d=Docente::find($idu);
        return $d;
    }
    
}
