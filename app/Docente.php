<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Docente extends Model
{
    protected $primaryKey = 'iddocente';

    public function Productividad(){
        $data = DB::table('docente_productividads')
            ->where('iddocente','=',$this->iddocente)
            ->where('año','=',(date('Y')) )
            ->get();
        return $data->first();
    }
}
