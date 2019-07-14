<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    protected $primaryKey = 'idobra';

    protected $fillable =[
        'titulo','tipo','noautores','impacto'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }
}
