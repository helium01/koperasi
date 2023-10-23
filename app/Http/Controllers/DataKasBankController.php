<?php

namespace App\Http\Controllers;

use App\Models\data_kas_bank;
use Illuminate\Http\Request;

class DataKasBankController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data_kas_banks = data_kas_bank::all();
        return view('admin.masukan_data_harian.koreksi_data_kas_bank.index', compact('data_kas_banks'));
    }

    public function create()
    {
        return view('admin.masukan_data_harian.koreksi_data_kas_bank.create');
    }

    public function store(Request $request)
    {
        data_kas_bank::create($request->all());
        return redirect()->route('data_kas_banks.index');
    }

    public function show(data_kas_bank $data_kas_bank)
    {
        return view('admin.masukan_data_harian.koreksi_data_kas_bank.show', compact('data_kas_bank'));
    }

    public function edit(data_kas_bank $data_kas_bank)
    {
        return view('admin.masukan_data_harian.koreksi_data_kas_bank.edit', compact('data_kas_bank'));
    }

    public function update(Request $request, data_kas_bank $data_kas_bank)
    {
        $data_kas_bank->update($request->all());
        return redirect()->route('data_kas_banks.index');
    }

    public function destroy(data_kas_bank $data_kas_bank)
    {
        $data_kas_bank->delete();
        return redirect()->route('data_kas_banks.index');
    }
}