<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    protected $primaryKey = 'idconvocatoria';
    protected $fillable=[
        'titulo','fecha_inicio','fecha_final','estado','solicitudes','aprobadas','rechazadas'
    ];
}
