<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premios_Nacionales extends Model
{
    protected $primaryKey = 'idpremio';
    protected $table = 'premios_nacionales';

    protected $fillable =[
        'titulo','noautores'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }
}
