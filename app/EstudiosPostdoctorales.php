<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstudiosPostdoctorales extends Model
{
    protected $primaryKey = 'idestudiopost';

    protected $fillable =[
        'titulo',
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }
}
