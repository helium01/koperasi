<?php

namespace App\Http\Controllers;

use App\Models\saldo_awal;
use Illuminate\Http\Request;

class SaldoAwalController extends Controller
{
    public function index()
    {
        $saldo_awals = SaldoAwal::all();
        return view('saldo_awals.index', compact('saldo_awals'));
    }

    public function create()
    {
        return view('saldo_awals.create');
    }

    public function store(Request $request)
    {
        SaldoAwal::create($request->all());
        return redirect()->route('saldo_awals.index');
    }

    public function show(SaldoAwal $saldoAwal)
    {
        return view('saldo_awals.show', compact('saldoAwal'));
    }

    public function edit(SaldoAwal $saldoAwal)
    {
        return view('saldo_awals.edit', compact('saldoAwal'));
    }

    public function update(Request $request, SaldoAwal $saldoAwal)
    {
        $saldoAwal->update($request->all());
        return redirect()->route('saldo_awals.index');
    }

    public function destroy(SaldoAwal $saldoAwal)
    {
        $saldoAwal->delete();
        return redirect()->route('saldo_awals.index');
    }
}