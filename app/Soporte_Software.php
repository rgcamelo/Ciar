<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soporte_Software extends Model
{
    protected $primaryKey = 'idsoporte';
    protected $table = 'soporte_software';
    protected $fillable = [
        'id_software', 'instrucciones', 'manualusuario', 'ejecutable', 'certificado_software','CvLac',
        'GrupLac','Certificado_impacto','Zip'
    ];
}
