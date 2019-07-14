<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicacionImpresaController extends Controller
{
    public function nuevo(){
        return view('admin.publicacionimpresa');
    }
}
