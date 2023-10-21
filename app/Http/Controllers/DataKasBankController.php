<?php

namespace App\Http\Controllers;

use App\Models\data_kas_bank;
use Illuminate\Http\Request;

class DataKasBankController extends Controller
{
    public function index()
    {
        $data_kas_banks = DataKasBank::all();
        return view('data_kas_banks.index', compact('data_kas_banks'));
    }

    public function create()
    {
        return view('data_kas_banks.create');
    }

    public function store(Request $request)
    {
        DataKasBank::create($request->all());
        return redirect()->route('data_kas_banks.index');
    }

    public function show(DataKasBank $dataKasBank)
    {
        return view('data_kas_banks.show', compact('dataKasBank'));
    }

    public function edit(DataKasBank $dataKasBank)
    {
        return view('data_kas_banks.edit', compact('dataKasBank'));
    }

    public function update(Request $request, DataKasBank $dataKasBank)
    {
        $dataKasBank->update($request->all());
        return redirect()->route('data_kas_banks.index');
    }

    public function destroy(DataKasBank $dataKasBank)
    {
        $dataKasBank->delete();
        return redirect()->route('data_kas_banks.index');
    }
}