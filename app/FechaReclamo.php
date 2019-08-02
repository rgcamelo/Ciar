<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FechaReclamo extends Model
{
    protected $primaryKey = 'idfechareclamo';
    protected $fillable=[
        'titulo','fecha_inicio','fecha_final','estado','idconvocatoria'
    ];
}
