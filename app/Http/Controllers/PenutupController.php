<?php

namespace App\Http\Controllers;

use App\Models\penutup;
use Illuminate\Http\Request;

class PenutupController extends Controller
{
    public function index()
    {
        $penutups = Penutup::all();
        return view('penutups.index', compact('penutups'));
    }

    public function create()
    {
        return view('penutups.create');
    }

    public function store(Request $request)
    {
        Penutup::create($request->all());
        return redirect()->route('penutups.index');
    }

    public function show(Penutup $penutup)
    {
        return view('penutups.show', compact('penutup'));
    }

    public function edit(Penutup $penutup)
    {
        return view('penutups.edit', compact('penutup'));
    }

    public function update(Request $request, Penutup $penutup)
    {
        $penutup->update($request->all());
        return redirect()->route('penutups.index');
    }

    public function destroy(Penutup $penutup)
    {
        $penutup->delete();
        return redirect()->route('penutups.index');
    }
}
