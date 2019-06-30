<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro_Soportes extends Model
{
    protected $primaryKey = 'id_soportelibro';
    protected $table = 'libro_soportes';
    
    protected $fillable = [
        'id_libro','ejemplar','Cvlac_libro','Gruplac_libro','Certificadolibrodeinvestigacion','Certificadoeditorial'
    ];
    
}
