<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }
}
