<?php

namespace App\Http\Controllers;

use App\Models\saldo_awal;
use Illuminate\Http\Request;

class SaldoAwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $saldo_awals = saldo_awal::all();
        return view('admin.proses_awal.saldo_proses_awal.index', compact('saldo_awals'));
    }

    public function create()
    {
        return view('admin.proses_awal.saldo_proses_awal.index');
    }

    public function store(Request $request)
    {
        saldo_awal::create($request->all());
        return redirect()->route('saldo_awals.index');
    }

    public function show(saldo_awal $saldo_awal)
    {
        return view('saldo_awals.show', compact('saldo_awal'));
    }

    public function edit(saldo_awal $saldo_awal)
    {
        return view('admin.proses_awal.saldo_proses_awal.index', compact('saldo_awal'));
    }

    public function update(Request $request, saldo_awal $saldo_awal)
    {
        $saldo_awal->update($request->all());
        return redirect()->route('saldo_awals.index');
    }

    public function destroy(saldo_awal $saldo_awal)
    {
        $saldo_awal->delete();
        return redirect()->route('saldo_awals.index');
    }
}