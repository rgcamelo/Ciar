<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PremiosNacionalesController extends Controller
{
    public function nuevo(){
        return view('admin.premio');
    }
}
