<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudiosPostdoctoralesController extends Controller
{
    public function nuevo(){
        return view('admin.estudiospostdoctorales');
    }
}
