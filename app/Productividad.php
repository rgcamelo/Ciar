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

    
    
}
