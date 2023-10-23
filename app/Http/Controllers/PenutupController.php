<?php

namespace App\Http\Controllers;

use App\Models\penutup;
use Illuminate\Http\Request;

class PenutupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $penutups = Penutup::all();
        return view('admin.masukan_data_harian.memo_penutup.index', compact('penutups'));
    }

    public function create()
    {
        return view('admin.masukan_data_harian.memo_penutup.index');
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
        return view('admin.masukan_data_harian.memo_penutup.index', compact('penutup'));
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
