<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente;

class ProductividadController extends Controller
{
    public function seleccionar(Docente $docente){
        $data=request()->all;
        return view('admin.seleccionar',compact('docente'));
    }
}
