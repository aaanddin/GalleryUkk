<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\AlbumFoto;
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
            'nama_album' => ['required'],
            'deskripsi' => ['required'],
        ]);

        $imageName = $request->file('cover')->hashName();

        // Taruh nama gambar baru ke array validated untuk nanti disimpan ke database
        $validated['cover'] = $imageName;
        
        // Simpan gambar di folder public/news dengan nama yang diacak tadi
        $fotoDirectory = public_path() . '/albumcover';
        $request->file('cover')->move($fotoDirectory, $imageName);

        $validated['tanggal_dibuat'] = Date::now();

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

    public function edit(string $id)
    {
        $albums = Album::find($id);

        return view('page.albumaction.edit', compact('albums'), [
            "title" => "edit"
        ]);
    }

    public function update(Request $request, string $id)
    {
        
        $validated = $request->validate([
            'nama_album' => ['required'],
            'deskripsi' => ['required'],
        ]);

        
        $albums = Album::find($id);

        
        Album::delete(public_path() . "/albumcover/$albums->cover");

        
        $imageName = $request->file('cover')->hashName();

        
        $validated['cover'] = $imageName;
        
        
        $newsDirectory = public_path() . '/albumcover';
        $request->file('cover')->move($fotoDirectory, $imageName);
        
        
        $fotos->update($validated);

        
        return redirect()->route('admin.pageadmin.listberita')->with('success', 'Data berhasil diedit.');
    }

    public function destroy(string $id)
    {
        $albums = Album::find($id);

        // Foto::delete(public_path() . "/foto/$fotos->LokasiFile");

        $albums= Album::where('id', $id)->delete();

        return redirect()->route('page.album')->with('delete', 'Data berhasil dihapus.');        
    }

    public function albumfoto(Request $request)
    {
        // Validasi, 3 field ini diperlukan
        // Jika ada yang kurang, di redirect ke halaman sebelumnya dengan error
        $validated = $request->validate([
            'albumfoto' => ['required'],
        ]);

        $imageName = $request->file('albumfoto')->hashName();

        // Taruh nama gambar baru ke array validated untuk nanti disimpan ke database
        $validated['albumfoto'] = $imageName;
        
        // Simpan gambar di folder public/news dengan nama yang diacak tadi
        $fotoDirectory = public_path() . '/albumfoto';
        $request->file('album')->move($fotoDirectory, $imageName);


        // insert row baru di table news dengan data didalam validated
        AlbumFoto::create($validated);

        // Redirect ke halaman index
        return redirect()->route('page.albumaction.detail')->with('success', 'Post To Album Succesfull >y<');
        return redirect()->route('page.albumaction.detail')->with('error', 'Post To Album Failed :(');
    }
}
