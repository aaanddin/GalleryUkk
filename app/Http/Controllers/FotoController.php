<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Foto;
use App\Models\Album;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Date;


class FotoController extends Controller
{

    public function index() {

        $fotos = Foto::all();
        return view('page.foto', [
            "active" => "foto",
            "title" => "Photo",
            "fotos" => $fotos
        ]);
    }

    public function create()
    {
        return view('page.fotoaction.create', [
            "title" => "Create Post"
        ]);
    }

     /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi, 3 field ini diperlukan
        // Jika ada yang kurang, di redirect ke halaman sebelumnya dengan error
        $validated = $request->validate([
            'JudulFoto' => ['required'],
            'DeskripsiFoto' => ['required'],
            'LokasiFile' => ['required'],
        ]);

        // Acak nama gambar
        // Alasan acak nama gambar agar tidak ada 2 gambar dengan nama yang sama
        $imageName = $request->file('LokasiFile')->hashName();

        // Taruh nama gambar baru ke array validated untuk nanti disimpan ke database
        $validated['LokasiFile'] = $imageName;
        
        // Simpan gambar di folder public/news dengan nama yang diacak tadi
        $fotoDirectory = public_path() . '/foto';
        $request->file('LokasiFile')->move($fotoDirectory, $imageName);
        $validated['TanggalUnggah'] = Date::now();

        // insert row baru di table news dengan data didalam validated
        Foto::create($validated);

        // Redirect ke halaman index
        return redirect()->route('page.foto')->with('success', 'Fotomu sudah di post');
        return redirect()->route('page.foto')->with('error', 'Post Foto Gagal');
    }

    
}
