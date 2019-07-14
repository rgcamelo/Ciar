<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionTesis extends Model
{
    protected $primaryKey = 'iddireccion';

    protected $fillable =[
        'titulo','noautores','tipo'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }
}
