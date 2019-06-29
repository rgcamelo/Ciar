<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $primaryKey = 'idsoftware';
    protected $fillable = [
        'titulo', 'noautores', 'autores', 'resultadoPares', 'titulares', 'creditoUpc', 'impactanivelU','codigo'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }
}
