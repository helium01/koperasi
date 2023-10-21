<?php

namespace App\Http\Controllers;

use App\Models\memorial;
use Illuminate\Http\Request;

class MemorialController extends Controller
{
    public function index()
    {
        $memorials = Memorial::all();
        return view('memorials.index', compact('memorials'));
    }

    public function create()
    {
        return view('memorials.create');
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
        return view('memorials.edit', compact('memorial'));
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