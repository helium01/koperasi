<?php

namespace App\Http\Controllers;

use App\Models\rab_tahunan;
use Illuminate\Http\Request;

class RabTahunanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $rab_tahunans = Rab_tahunan::all();
        return view('admin.proses_awal.rab_tahunan.index', compact('rab_tahunans'));
    }

    public function create()
    {
        return view('admin.proses_awal.rab_tahunan.create');
    }

    public function store(Request $request)
    {
        Rab_tahunan::create($request->all());
        return redirect()->route('rab_tahunans.index');
    }

    public function show(Rab_tahunan $rab_tahunan)
    {
        return view('rab_tahunans.show', compact('rab_tahunan'));
    }

    public function edit(Rab_tahunan $rab_tahunan)
    {
        return view('admin.proses_awal.rab_tahunan.index', compact('rab_tahunan'));
    }

    public function update(Request $request, Rab_tahunan $rab_tahunan)
    {
        $rab_tahunan->update($request->all());
        return redirect()->route('rab_tahunans.index');
    }

    public function destroy(Rab_tahunan $rab_tahunan)
    {
        $rab_tahunan->delete();
        return redirect()->route('rab_tahunans.index');
    }
}
