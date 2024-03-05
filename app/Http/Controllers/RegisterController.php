<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('log.register', [
            "active" => "login",
            "title" => "Register"
        ]);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'username' => ['required', 'unique:App\Models\User,Username', 'max:255'],
        'password' => ['required', 'max:255', 'min:5'],
        'email' => ['required', 'email', 'unique:App\Models\User,Email'],
        'namalengkap' => ['required'],
        'alamat' => ['required'],
    ]);

    $validatedData['password'] = Hash::make($validatedData['password']);

    User::create($validatedData);

    return redirect('/login')->with('success', 'horrayy ! registration succesfull. now, u have to login >y<');
    }
}