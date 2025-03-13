<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view ('index');
    }

    function store(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('siswa/home');
        }

        return back()->withErrors(['Akun tidak  terdaftar, silahkan coba lagi.'])->onlyInput('email');
    }

    function logout(Request $request) {
         Auth::logout();

         $request->session()->invalidate();

         $request->session()->regenerateToken();

         return redirect('/');
    }
}
