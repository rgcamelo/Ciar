<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReseñasCriticas extends Model
{
    protected $primaryKey = 'idreseña';

    protected $fillable =[
        'titulo','noautores'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }
}
