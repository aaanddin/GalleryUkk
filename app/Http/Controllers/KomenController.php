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
            'IsiKomentar' => 'required',
            'FotoID' => 'required'

        ]);
        $validated['TanggalKomentar'] = Date::now();
        $validated['UserID'] = auth()->user()->id;

        Komen::create($validated);

        return redirect()->route('page.foto');
    }
}