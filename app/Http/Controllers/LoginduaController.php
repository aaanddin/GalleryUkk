<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Hash;

class LoginduaController extends Controller
{
    public function index() {
        return view('log.login', [
            "active" => "login",
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('home');
        }

        return back()->with('loginError', 'Login gagal');
        return redirect('/home');


        // dd($credentials);

    }

    public function logout() {
        Auth::logout();
        return redirect()->route('page.welcome');
    }
}
