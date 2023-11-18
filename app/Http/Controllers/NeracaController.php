<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use Dompdf\Dompdf;
use App\Models\memorial;

class NeracaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$pdf = new Dompdf($options);
        $image = file_get_contents(public_path('logo.jpg'));
        $base64 = 'data:image/png;base64,' . base64_encode($image);
        // return view('admin.cetak.neraca.neraca',compact('base64'));
        $data = memorial::join('nomor_perkiraans','kode','=','memorials.nomor_perkiraan')
        ->select("memorials.*","nomor_perkiraans.*")->get();
        $groupedData = [];
        $totalDebit = 0;
$totalKredit = 0;

// Mengelompokkan data berdasarkan nomor bukti
foreach ($data as $item) {
    $nomorBukti = $item->nomor_bukti;

    if (!isset($groupedData[$nomorBukti])) {
        $groupedData[$nomorBukti] = [
            'debit' => 0,
            'kredit' => 0,
            'items' => [],
        ];
    }

    $groupedData[$nomorBukti]['items'][] = $item;

    // Menambahkan jumlah debit atau kredit berdasarkan jenis
    if ($item->jenis == 'debit') {
        $groupedData[$nomorBukti]['debit'] += $item->jumlah_uang;
        $totalDebit += $item->jumlah_uang;
    } elseif ($item->jenis == 'kredit') {
        $groupedData[$nomorBukti]['kredit'] += $item->jumlah_uang;
        $totalKredit += $item->jumlah_uang;
    }
}

// Mengonversi hasil pengelompokan ke dalam array
$data = array_values($groupedData);

        $pageNumber=null;
        $totalPages=null;
    $html= view('admin.cetak.neraca.neraca', compact('base64', 'data','totalDebit','totalKredit', 'pageNumber', 'totalPages'));
    $pdf->loadHtml($html);

        $pdf->setPaper('a3', 'landscape')->render();
        $totalPages = $pdf->getCanvas()->get_page_count();

        
       
        $pdf->render();
        
        return $pdf->stream('neraca.pdf', array('Attachment' => 0));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
