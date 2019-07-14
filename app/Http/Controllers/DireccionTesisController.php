<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DireccionTesisController extends Controller
{
    public function nuevo(){
        return view('admin.direccion');
    }
}
