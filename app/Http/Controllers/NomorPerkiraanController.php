<?php

namespace App\Http\Controllers;

use App\Models\nomor_perkiraan;
use Illuminate\Http\Request;

class NomorPerkiraanController extends Controller
{
    public function index()
    {
        $nomor_perkiraans = nomor_perkiraan::all();
        return view('admin.nomor_perkiraan.index', compact('nomor_perkiraans'));
    }

    public function create()
    {
        return view('admin.nomor_perkiraan.create');
    }

    public function store(Request $request)
    {
        $existingNomorPerkiraan = nomor_perkiraan::where('kode', $request->kode)->first();
        $existinguraianPerkiraan = nomor_perkiraan::where('uraian', $request->uraian)->first();

    if ($existingNomorPerkiraan) {
        return back()->withErrors(['kode' => 'Kode sudah digunakan.']);
    }
    if ($existinguraianPerkiraan) {
        return back()->withErrors(['uraian' => 'uraian sudah digunakan.']);
    }
        nomor_perkiraan::create($request->all());
        return redirect()->route('nomor_perkiraans.index');
    }

    public function show(nomor_perkiraan $nomor_perkiraan)
    {
        return view('nomor_perkiraans.show', compact('nomor_perkiraan'));
    }

    public function edit(nomor_perkiraan $nomor_perkiraan)
    {
        return view('admin.nomor_perkiraan.edit', compact('nomor_perkiraan'));
    }

    public function update(Request $request, nomor_perkiraan $nomor_perkiraan)
    {
        $nomor_perkiraan->update($request->all());
        return redirect()->route('nomor_perkiraans.index');
    }

    public function destroy(nomor_perkiraan $nomor_perkiraan)
    {
        $nomor_perkiraan->delete();
        return redirect()->route('nomor_perkiraans.index');
    }
}
