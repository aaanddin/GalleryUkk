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

        $fotos = Foto::latest()->get();
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
            'judul_foto' => ['required'],
            'deskripsi_foto' => ['required'],
            'lokasi_file' => ['required'],
        ]);

        // Acak nama gambar
        // Alasan acak nama gambar agar tidak ada 2 gambar dengan nama yang sama
        $imageName = $request->file('lokasi_file')->hashName();

        // Taruh nama gambar baru ke array validated untuk nanti disimpan ke database
        $validated['lokasi_file'] = $imageName;
        
        // Simpan gambar di folder public/news dengan nama yang diacak tadi
        $fotoDirectory = public_path() . '/foto';
        $request->file('lokasi_file')->move($fotoDirectory, $imageName);
        $validated['tanggal_unggah'] = Date::now();

        // insert row baru di table news dengan data didalam validated
        Foto::create($validated);

        // Redirect ke halaman index
        return redirect()->route('page.foto')->with('success', 'Post Photo Succesfull >y<');
        return redirect()->route('page.foto')->with('error', 'Post Photo Failed :(');
    }

    public function edit(string $id)
    {
        $fotos = Foto::find($id);

        return view('page.fotoaction.edit', compact('fotos'), [
            "title" => "edit"
        ]);
    }

    public function update(Request $request, string $id)
    {
        
        $validated = $request->validate([
            'judul_foto' => ['required'],
            'deskripsi_foto' => ['required'],
            'lokasi_file' => ['required'],
        ]);

        
        $fotos = Foto::find($id);

        
        Foto::destroy(public_path() . "/foto/$fotos->lokasi_file");

        
        $imageName = $request->file('lokasi_file')->hashName();

        
        $validated['lokasi_file'] = $imageName;
        
        
        $fotoDirectory = public_path() . '/foto';
        $request->file('lokasi_file')->move($fotoDirectory, $imageName);
        
        
        $fotos->update($validated);

        
        return redirect()->route('page.foto')->with('success', 'Post has been edited >y<');
    }

    public function destroy(string $id)
    {
        $fotos = Foto::find($id);

        $fotos = Foto::destroy(public_path() . '/foto/$fotos->lokasi_file');

        $fotos= Foto::where('id', $id)->delete();

        return redirect()->route('page.foto')->with('delete', 'Photo has been deleted >y<');        
        return redirect()->route('page.foto')->with('deleteerror', 'Photo delete failed:(');        
    }



    
}
