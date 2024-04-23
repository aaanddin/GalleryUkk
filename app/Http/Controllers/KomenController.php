<?php

namespace App\Http\Controllers;
use App\Models\Komen;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Date;

class KomenController extends Controller
{
    public function index() {
        $komens = Komen::all();
        return view('page.foto', [
            "komens" => $komens
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'isi_komentar' => 'required',
            'fotos_id' => 'required'

        ]);
        $validated['tanggal_komentar'] = Date::now();
        $validated['users_id'] = auth()->user()->id;

        Komen::create($validated);

        return redirect()->route('page.foto');
    }
}