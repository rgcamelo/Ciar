<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patente extends Model
{
    protected $primaryKey = 'idpatente';
    protected $table = 'patentes';

    protected $fillable =[
        'titulo','noautores'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }
}
