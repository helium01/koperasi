<?php

namespace App\Http\Controllers;

use App\Models\suplement;
use Illuminate\Http\Request;

class SuplementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $suplements = Suplement::all();
        return view('admin.masukan_data_harian.memo_suplement.index', compact('suplements'));
    }

    public function create()
    {
        return view('admin.masukan_data_harian.memo_suplement.index');
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
        return view('admin.masukan_data_harian.memo_suplement.index', compact('suplement'));
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
