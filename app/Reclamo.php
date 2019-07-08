<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    protected $primaryKey = 'idreclamo';

    protected $fillable = [
        'id_solicitud', 'contenido', 'estado','soporte','soporte_respuesta'
    ];

}
