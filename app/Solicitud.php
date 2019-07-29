<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $primaryKey = 'idsolicitud';
    protected $fillable = [
        'productividad_id', 'estado', 'puntos_aprox', 'puntos_asignados','observaciones',
        'bonificacion_calculada','bonificacion_asignada','idconvocatoria','puntaje_par',
        'fechasolicitud','fechaCalificada','formatoenviado','formatorecibido','folder'
    ];

    public function Productividad(){
        $p=Productividad::find($this->productividad_id);
        return $p;
    }

    public function ProDoc(){

        $año = date('Y');   
        $data = DB::table('docente_productividads')
        ->where('docente_productividads.iddocente','=',$this->Productividad()->id_docente)
        ->where('docente_productividads.año','=',$año)
        ->get();

        if( empty($data->first())){
            $prodoc = DocenteProductividad::Create([
                'iddocente' => $this->Productividad()->id_docente,
                'año' => $año
            ]);
        }
    }
}
