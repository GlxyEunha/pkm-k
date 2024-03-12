<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('Login.index');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::Attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/login');
        }
    }

    public function actionlogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}