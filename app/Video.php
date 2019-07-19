<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Video extends Model
{
    protected $primaryKey = 'idvideo';

    protected $fillable =[
        'tipo','impacto','noautores_video'
    ];
    
    public function productividad(){
        return $this->morphOne(Productividad::class,'productividadable');
    }

    public function puntaje(){
        $a=$this->autores();
        $i=$this->impacto();
        $t=$this->tipo();

        $p=($i*$t)/$a;
        return $p;
    }

    public function autores(){
        switch($this->noautores_video){
            case $this->noautores_video <= 3:
            $p=1;
            return $p;
            break;
            case $this->noautores_video <=5:
            $p=2;
            return $p;
            default:
            $p=$this->noautores_video/2;
            return $p;
             break;
        }
    }

    public function impacto(){
        switch ($this->impacto) {
            case 'Internacional':
                return 12;
                break;
            case 'Nacional':
                return 7;
                break;
            case 'Regional':
                return 48;
                break;
            case 'Local':
                return 48;
                break;
            default:

        }
    }

    public function tipo(){
        switch ($this->tipo) {
            case 'Didactico':
                return 1;
                break;
            case 'Documental':
                return 0.8;
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

    public function solicitud($idp,$pa,$idc){

        $productividad=Productividad::find($idp)->Docente()->Productividad();

        switch ($this->impacto) {
            case 'Internacional':
            case 'Nacional':
            if (isset(auth()->user()->Docente()->Productividad()->idprodoc)) {
                if ($productividad->videos > 5) {
                    Solicitud::create([
                        'productividad_id' => $idp,
                        'estado' => 'Tope Maximo',
                        'puntos_aprox' => 0,
                        'idconvocatoria' => $idc,
                        'fechasolicitud' => (date('Y-m-d'))
                    ]);
                }
                else {
                    Solicitud::create([
                        'productividad_id' => $idp,
                        'estado' => 'Enviado',
                        'puntos_aprox' => $pa,
                        'idconvocatoria' => $idc,
                        'fechasolicitud' => (date('Y-m-d'))
                    ]);
                }
            } else {
                Solicitud::create([
                    'productividad_id' => $idp,
                    'estado' => 'Enviado',
                    'puntos_aprox' => $pa,
                    'idconvocatoria' => $idc,
                    'fechasolicitud' => (date('Y-m-d'))
                ]);
            }   
            break;
            case 'Regional':
            case 'Local':
            if (isset(auth()->user()->Docente()->Productividad()->idprodoc)) {
                if($productividad->videosbon > 5){
                    Solicitud::create([
                        'productividad_id' => $idp,
                        'estado' => 'Tope Maximo',
                        'bonificacion_calculada' => $pa,
                        'idconvocatoria' => $idc,
                        'fechasolicitud' => (date('Y-m-d'))
                    ]);
                }else {
                    Solicitud::create([
                        'productividad_id' => $idp,
                        'estado' => 'Enviado',
                        'bonificacion_calculada' => $pa,
                        'idconvocatoria' => $idc,
                        'fechasolicitud' => (date('Y-m-d'))
                    ]);
                }
            } else {
                Solicitud::create([
                    'productividad_id' => $idp,
                    'estado' => 'Enviado',
                    'bonificacion_calculada' => $pa,
                    'idconvocatoria' => $idc,
                    'fechasolicitud' => (date('Y-m-d'))
                ]);
            }
            break;
        }
    }
}
