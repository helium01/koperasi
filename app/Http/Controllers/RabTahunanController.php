<?php

namespace App\Http\Controllers;

use App\Models\rab_tahunan;
use Illuminate\Http\Request;

class RabTahunanController extends Controller
{
    public function index()
    {
        $rab_tahunans = RabTahunan::all();
        return view('rab_tahunans.index', compact('rab_tahunans'));
    }

    public function create()
    {
        return view('rab_tahunans.create');
    }

    public function store(Request $request)
    {
        RabTahunan::create($request->all());
        return redirect()->route('rab_tahunans.index');
    }

    public function show(RabTahunan $rabTahunan)
    {
        return view('rab_tahunans.show', compact('rabTahunan'));
    }

    public function edit(RabTahunan $rabTahunan)
    {
        return view('rab_tahunans.edit', compact('rabTahunan'));
    }

    public function update(Request $request, RabTahunan $rabTahunan)
    {
        $rabTahunan->update($request->all());
        return redirect()->route('rab_tahunans.index');
    }

    public function destroy(RabTahunan $rabTahunan)
    {
        $rabTahunan->delete();
        return redirect()->route('rab_tahunans.index');
    }
}
