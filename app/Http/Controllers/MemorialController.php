<?php

namespace App\Http\Controllers;

use App\Models\memorial;
use Illuminate\Http\Request;

class MemorialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $memorials = Memorial::all();
        return view('admin.masukan_data_harian.koreksi_data_memorial.index', compact('memorials'));
    }

    public function create()
    {
        return view('admin.masukan_data_harian.koreksi_data_memorial.create');
    }

    public function store(Request $request)
    {
        Memorial::create($request->all());
        return redirect()->route('memorials.index');
    }

    public function show(Memorial $memorial)
    {
        return view('memorials.show', compact('memorial'));
    }

    public function edit(Memorial $memorial)
    {
        return view('admin.masukan_data_harian.koreksi_data_memorial.edit', compact('memorial'));
    }

    public function update(Request $request, Memorial $memorial)
    {
        $memorial->update($request->all());
        return redirect()->route('memorials.index');
    }

    public function destroy(Memorial $memorial)
    {
        $memorial->delete();
        return redirect()->route('memorials.index');
    }
}