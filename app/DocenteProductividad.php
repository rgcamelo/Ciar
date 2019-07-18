<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocenteProductividad extends Model
{
    protected $primaryKey = 'idprodoc';

    protected $fillable =[
        'iddocente','año','software','libro','articulo','ponencia','videos','videosbon','premios','patentes','traducciones',
        'traduccionesbon','obras','obrasbon','producciontecnica','estudios',
        'reseñas','direccion','publicacion'
    ];
}
