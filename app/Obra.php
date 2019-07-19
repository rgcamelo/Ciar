<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Obra extends Model
{
    protected $primaryKey = 'idobra';

    protected $fillable =[
        'tipo','noautores','impacto'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }

    public function puntaje(){
        $a=$this->autores();
        $i=$this->impacto();

        $p=($i)/$a;
        return $p;
    }

    public function autores(){
        switch($this->noautores){
            case $this->noautores <= 3:
            $p=1;
            return $p;
            break;
            case $this->noautores <=5:
            $p=2;
            return $p;
            default:
            $p=$this->noautores/2;
            return $p;
             break;
        }
    }

    public function impacto(){
        switch ($this->impacto) {
            case 'Internacional':
            switch ($this->tipo) {
                case 'Original':
                    return 20;
                    break;
                case 'Complementaria':
                    return 12;
                    break;
                case 'Interpretacion':
                    return 14;
                    break;
            }
                break;
            case 'Nacional':
            switch ($this->tipo) {
                case 'Original':
                    return 14;
                    break;
                case 'Complementaria':
                    return 8;
                    break;
                case 'Interpretacion':
                    return 8;
                    break;
            }
                break;
            case 'Regional':
            case 'Local':
            switch ($this->tipo) {
                case 'Original':
                    return 72;
                    break;
                case 'Complementaria':
                case 'Interpretacion':
                    return 48;
                    break;
            }
                break;
            default:

        }
    }

    public function solicitud($idp,$pa,$idc){
        
        switch ($this->impacto) {
            case 'Internacional':
            case 'Nacional':
            
            Solicitud::create([
                'productividad_id' => $idp,
                'estado' => 'Enviado',
                'puntos_aprox' => $pa,
                'idconvocatoria' => $idc,
                'fechasolicitud' => (date('Y-m-d'))
            ]);
            break;
            case 'Regional':
            case 'Local':
            
            Solicitud::create([
                'productividad_id' => $idp,
                'estado' => 'Enviado',
                'bonificacion_calculada' => $pa,
                'idconvocatoria' => $idc,
                'fechasolicitud' => (date('Y-m-d'))
            ]);
            break;
        }
    }

    public function ProDoc($productividad){

        $año = date('Y');   
        $data = DB::table('docente_productividads')
        ->where('docente_productividads.iddocente','=',$productividad->id_docente)
        ->where('docente_productividads.año','=',$año)
        ->get();

        if( empty($data->first())){
            $prodoc = DocenteProductividad::Create([
                'iddocente' => $productividad->id_docente,
                'año' => $año
            ]);
        }
    }
}
