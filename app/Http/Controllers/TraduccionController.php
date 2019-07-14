<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TraduccionController extends Controller
{
    public function nuevo(){
        return view('admin.traduccion');
    }
}
