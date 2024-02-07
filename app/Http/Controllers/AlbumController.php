<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index() {
        return view('page.album', [
            "active" => "album",
            "title" => "Album"
        ]);
    }

    public function create()
    {
        return view('page.albumaction.create', [
            "title" => "Create Album"
        ]);
    }
}
