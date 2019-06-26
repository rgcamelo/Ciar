<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function __construct()
    {
        $this->middleware('guest',['only' => 'showLoginForm']);    
    }

   

    public function showLoginForm(){
        return view('auth.entrar');
    }
    public function login(){
        $credentials = $this->validate(request(),[
            'email'=>'email|required|string',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        }
        
            return back()->withErrors(['email'=> 'Estas credenciales no coinciden con nuestros registros'])
            ->withInput(request(['email']));
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
