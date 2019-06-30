<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productividad extends Model
{
    protected $primaryKey = 'idproductividad';
    protected $fillable = [
        'id_docente','titulo',
    ];

    public function productividadable(){
        return $this->morphTo();
    }

    public function Quesoy(){
        switch($this->productividadable_type){
            case 'App\Libro':
            $libro = Libro::find($this->productividadable_id);
            return $libro;
            break;
        }
        
    }
    
    
}
