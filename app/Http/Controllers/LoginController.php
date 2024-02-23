<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function index() {
        return view('log.login', [
            "active" => "login",
            "title" => "Login"
        ]);
    }
    public function authenticate(Request $request) {
        $request->validate([
            'Email' => 'required|email',
            'Password' => 'required',
        ]);
        $user = User::where('Email', $request->Email)->first();

        if ($user) {
            if (Hash::check($request->Password, $user->Password)) {
                $this->manualLogin($user, $request);
                return redirect()->intended('/home');
            }
        }
        return back()->with('loginError', 'Email atau password salah!');
    }
    private function manualLogin($user, $request)
    {
        $request->session()->regenerate();
        $request->session()->put('user_id', $user->id);
    }
}