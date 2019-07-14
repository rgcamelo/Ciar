<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProduccionTecnicaController extends Controller
{
    public function nuevo(){
        return view('admin.producciontecnica');
    }
}
