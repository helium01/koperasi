<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use Dompdf\Dompdf;
use App\Models\memorial;
use App\Models\saldo_awal;
use App\Models\nomor_perkiraan;
use App\Models\data_kas_bank;

class NeracaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request);
        $memori=memorial::join('nomor_perkiraans','nomor_perkiraans.kode','=','memorials.nomor_perkiraan')->get(); 
        //dd($memori);
        foreach($memori as $memo){
            $saldo_awal=saldo_awal::where('nomor_perkiraan',$memo->nomor_perkiraan)->first();
            if(!$saldo_awal){
                saldo_awal::create([
                    'nomor_perkiraan'=>$memo->nomor_perkiraan,
                    'nama_perkiraan'=>$memo->uraian,
                    'jenis'=>$memo->jenis,
                    'saldo_awal'=>0,
                    'created_by'=>$memo->created_by
                ]);
            }
        }
        $nomor_perkiraan = nomor_perkiraan::join('saldo_awals','saldo_awals.nomor_perkiraan','=','nomor_perkiraans.kode')->select('saldo_awals.*','nomor_perkiraans.*')->orderBy('kode', 'asc')->get();
       
// Inisialisasi array untuk menyimpan hasil per golongan
$totalsPerGolongan = [];
$debit=0;
$kredit=0;

foreach ($nomor_perkiraan as $perkiraan) {
    // Pisahkan kode menjadi golongan (misal: "080" menjadi "00")
    $golongan = substr($perkiraan->kode, 0, 3);
    $golongan2=substr($perkiraan->kode,0,2);


    // Tambahkan jumlah perkiraan utama ke array hasil per golongan
    if (!isset($totalsPerGolongan[$golongan2][$golongan]['details'])) {
        $totalsPerGolongan[$golongan2][$golongan]['details'] = [];
    }
    $data_kas_bank =data_kas_bank::where('nomor_perkiraan_lawan',$perkiraan->kode)->get();
    if ($data_kas_bank->count() >0 ){
        foreach($data_kas_bank as $data){
            if($data->jenis=='Masuk'){
                $debit=$data->jumlah_uang;
            }else{
                $kredit=$data->jumlah_uang;
            }
        }
    }else{
        $debit=0;
        $kredit=0;
    }
    $memorial=memorial::where('nomor_perkiraan',$perkiraan->kode)->get();
    if($memorial->count()>0){
        foreach($memorial as $memori){
            $kasbank=data_kas_bank::where('nomor_perkiraan',$memori->nomor_perkiraan)->first();
           if($memori->jenis=='debit'){
            $debit=$memori->jumlah_uang;
           }else if($memori->jenis=='kredit '){
            $kredit=$memori->jumlah_uang;
           }
        }
    }else{
        $debit=0;
        $kredit=0;
    }

    $totalsPerGolongan[$golongan2][$golongan]['details'][] = [
        'kode' => $perkiraan->kode,
        'uraian' => $perkiraan->uraian,
        'jenis'=>$perkiraan->jenis,
        'saldo_awal'=>$perkiraan->saldo_awal,
        'kasbank_debit'=>$debit,
        'kasbank_kredit'=>$kredit,
        'sampaibulaninikasbank_debit'=>$debit,
        'sampaibulaninikasbank_kredit'=>$kredit
    ];

}

// Tampilkan hasil
// foreach ($totalsPerGolongan as $golongan => $totalPerGolongan) {
//     echo "Golongan: $golongan\n";
//     foreach ($totalPerGolongan['details'] as $detail) {
//         echo " - {$detail['kode']}: {$detail['uraian']}\n";
//     }
//     echo "\n";
// }

// Tampilkan hasil
 // dd($totalsPerGolongan);
return view('admin.cetak.neraca.neraca',compact('totalsPerGolongan'));
        $saldo_awal=saldo_awal::join('nomor_perkiraans','nomor_perkiraans.kode','=','saldo_awals.nomor_perkiraan')->select('saldo_awals.*','nomor_perkiraans.*')->get();
        dd($saldo_awal);
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
    public function indexview()
    {
        return view('admin.cetak.neraca.index');
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
