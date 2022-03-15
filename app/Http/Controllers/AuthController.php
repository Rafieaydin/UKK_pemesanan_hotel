<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin,tamu,resepsionis')->except('logout');
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
            return redirect('/resepsionis/reservasi');
        }else if(Auth::guard('tamu')->attempt(['email'=>$request->email,'password'=>$request->password])){
            $request->session()->regenerate();
            return redirect('/tamu/dashboard');
        }

        return redirect('/login')->with('error','Email atau Password Salah');
    }
    public function register(){
        return view('auth.register');
    }
    public function postregister(Request $request){
        $validated = $request->validate([
            'nama_tamu' => 'required',
            'email' => 'required|email|unique:tamu|unique:admin|unique:resepsionis',
            'no_hp' => 'required|min:8|max:12',
            'alamat' => 'required',
            'jk' => 'required',
            'username' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        Tamu::create([
            'nama_tamu' => $request->nama_tamu,
            'email' => $request->email,
            'no_hp' =>$request->no_hp,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/login')->with('success','Berhasil Registrasi');
    }

    public function forgot_password(){
        return view('auth.forgot-password');
    }

    public function postforgot_password(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
        ]);
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('tamu')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(Request $request){

        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);
        $status = Password::broker('tamu')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user));
            }
        );

        return redirect()->route('auth.login')->with('success','Berhasil Reset Password');
        // return $status == Password::PASSWORD_RESET
        //     ? response()->json([
        //         'status' => 'success',
        //         'message' =>  __($status)
        //     ], 200)
        //     : response()->json([
        //         'status' => 'error',
        //         'message' => __($status),
        //     ], 422);
    }

    public function logout(){
        Auth::logout();
        session()->flush();
        return redirect()->route('auth.login');
    }
}
