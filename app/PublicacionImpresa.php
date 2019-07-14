<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicacionImpresa extends Model
{
    protected $primaryKey = 'idpublicacionimpresa';

    protected $fillable =[
        'titulo','noautores'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }
}
