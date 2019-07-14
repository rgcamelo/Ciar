<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatenteController extends Controller
{
    public function nuevo(){
        return view('admin.patente');
    }
}
