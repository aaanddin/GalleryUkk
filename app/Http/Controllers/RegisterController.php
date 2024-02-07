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
        'Username' => ['required', 'unique:App\Models\User,Username', 'max:255'],
        'Password' => ['required', 'max:255', 'min:5'],
        'Email' => ['required', 'email:dns', 'unique:App\Models\User,Email'],
        'NamaLengkap' => ['required'],
        'Alamat' => ['required'],
    ]);

    $validatedData['Password'] = Hash::make($validatedData['Password']);

    User::create($validatedData);

    return redirect('/login')->with('success', 'horrayy ! registration succesfull. now, u have to login >y<');
    }
}