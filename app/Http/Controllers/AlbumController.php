<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Date;

class AlbumController extends Controller
{
    public function index() {
        $albums = Album::all();
        return view('page.album', [
            "active" => "album",
            "title" => "Album",
            "albums" => $albums
        ]);
    }

    public function create()
    {
        return view('page.albumaction.create', [
            "title" => "Create Album"
        ]);
    }

    public function store(Request $request)
    {
        // Validasi, 3 field ini diperlukan
        // Jika ada yang kurang, di redirect ke halaman sebelumnya dengan error
        $validated = $request->validate([
            'NamaAlbum' => ['required'],
            'Deskripsi' => ['required'],
        ]);

        $imageName = $request->file('Cover')->hashName();

        // Taruh nama gambar baru ke array validated untuk nanti disimpan ke database
        $validated['Cover'] = $imageName;
        
        // Simpan gambar di folder public/news dengan nama yang diacak tadi
        $fotoDirectory = public_path() . '/albumcover';
        $request->file('Cover')->move($fotoDirectory, $imageName);

        $validated['TanggalDibuat'] = Date::now();

        // insert row baru di table news dengan data didalam validated
        Album::create($validated);

        // Redirect ke halaman index
        return redirect()->route('page.album')->with('success', 'Create Album Succesfull >y<');
        return redirect()->route('page.album')->with('error', 'Create Album Failed :(');
    }

    public function detail() {
        return view('page.albumaction.detail', [
            "title"=>"Album"
        ]);
    }
}
