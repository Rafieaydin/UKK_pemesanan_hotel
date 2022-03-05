<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(){
        return view('auth.login');
    }

    public function postlogin(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        }else if(Auth::guard('resepsionis')->attempt(['email'=>$request->email,'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect('/resepsionis/dashboard');
        }else if(Auth::guard('tamu')->attempt(['email'=>$request->email,'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect('/tamu/dashboard');
        }

        return redirect('/login')->with('error','Email atau Password Salah');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
