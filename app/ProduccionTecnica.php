<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProduccionTecnica extends Model
{
    protected $primaryKey = 'idproducciontecnica';

    protected $fillable =[
        'titulo','noautores','tipo'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }
}
