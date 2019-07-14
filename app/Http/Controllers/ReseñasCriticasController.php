<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReseñasCriticasController extends Controller
{
    public function nuevo(){
        return view('admin.reseña');
    }
}
