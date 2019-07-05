<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $primaryKey = 'idsolicitud';
    protected $fillable = [
        'productividad_id', 'estado', 'puntos_aprox', 'puntos_asignados','observaciones',
        'bonificacion_calculada','bonificacion_asignada'
    ];
}
