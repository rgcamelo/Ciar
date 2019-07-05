<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ponencia_Soportes extends Model
{
    protected $primaryKey = 'idponenciasoporte';
    protected $table = 'ponencia_soportes';
    protected $fillable = [
        'idponencia','memoriaevento','certificadoponente','Cvlacponencia','Gruplacponencia',
        'Zipponencia'
    ];
}
