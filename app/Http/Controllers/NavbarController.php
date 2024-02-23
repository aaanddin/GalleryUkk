<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class NavbarController extends Controller
{
    public function index() {
        $users = User::all();
        return view('page.home', [
            "active" => "home",
            "title" => "Home"
        ]);
    }
}
