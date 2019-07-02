<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo_Soporte extends Model
{
    protected $table = 'articulo_soportes';
    protected $primaryKey = 'idsoportearticulo';

    protected $fillable = [
        'idarticulo','ejemplar_articulo','Cvlac_articulo','Evidenciarevista','Zip_articulo','Gruplac_articulo'
    ];

}
