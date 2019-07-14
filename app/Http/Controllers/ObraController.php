<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObraController extends Controller
{
    public function nuevo(){
        return view('admin.obra');
    }
}
