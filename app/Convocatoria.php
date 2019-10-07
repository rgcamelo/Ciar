<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Convocatoria extends Model
{
    protected $primaryKey = 'idconvocatoria';
    protected $fillable=[
        'titulo','fecha_inicio','fecha_final','estado','solicitudes','aprobadas','rechazadas'
    ];

    public function Reclamos(){
        $data = DB::table('fecha_reclamos')->
            where('idconvocatoria','=',$this->idconvocatoria)
            ->where('estado','=','Actual')
                ->get();
            return $data->first();
    }
        

}
