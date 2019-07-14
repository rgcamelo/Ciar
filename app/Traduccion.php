<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Traduccion extends Model
{
    protected $primaryKey = 'idtraduccion';

    protected $fillable =[
        'titulo','tipo','noautores'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }
}
