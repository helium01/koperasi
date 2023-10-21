<?php

namespace App\Http\Controllers;

use App\Models\suplement;
use Illuminate\Http\Request;

class SuplementController extends Controller
{
    public function index()
    {
        $suplements = Suplement::all();
        return view('suplements.index', compact('suplements'));
    }

    public function create()
    {
        return view('suplements.create');
    }

    public function store(Request $request)
    {
        Suplement::create($request->all());
        return redirect()->route('suplements.index');
    }

    public function show(Suplement $suplement)
    {
        return view('suplements.show', compact('suplement'));
    }

    public function edit(Suplement $suplement)
    {
        return view('suplements.edit', compact('suplement'));
    }

    public function update(Request $request, Suplement $suplement)
    {
        $suplement->update($request->all());
        return redirect()->route('suplements.index');
    }

    public function destroy(Suplement $suplement)
    {
        $suplement->delete();
        return redirect()->route('suplements.index');
    }
}
