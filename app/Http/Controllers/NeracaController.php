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
        $memori_bulanini=memorial::join('nomor_perkiraans','nomor_perkiraans.kode','=','memorials.nomor_perkiraan')
        ->whereMonth('tanggal', '=', date('m', strtotime($request->tanggal))) // Filter berdasarkan bulan
        ->whereYear('tanggal', '=', date('Y', strtotime($request->tanggal)))  // Filter berdasarkan tahun
        ->get(); 
        //dd($memori_bulanini);
        $memori=memorial::join('nomor_perkiraans','nomor_perkiraans.kode','=','memorials.nomor_perkiraan')
        ->get(); 
        $datakasbank=data_kas_bank::join('nomor_perkiraans','nomor_perkiraans.kode','=','data_kas_banks.nomor_perkiraan_lawan')->get(); 
        foreach($datakasbank as $datakas){
            $saldo_awal=saldo_awal::where('nomor_perkiraan',$datakas->nomor_perkiraan_lawan)->first();
            //dd($datakas);
            if(!$saldo_awal){
                if($datakas->jenis=='Masuk'){
                    saldo_awal::create([
                        'nomor_perkiraan'=>$datakas->nomor_perkiraan_lawan,
                        'nama_perkiraan'=>$datakas->uraian,
                        'jenis'=>'kredit',
                        'saldo_awal'=>0,
                        'created_by'=>$datakas->created_by
                    ]);
                }else{
                    saldo_awal::create([
                        'nomor_perkiraan'=>$datakas->nomor_perkiraan_lawan,
                        'nama_perkiraan'=>$datakas->uraian,
                        'jenis'=>'debit',
                        'saldo_awal'=>0,
                        'created_by'=>$datakas->created_by
                    ]);
                }
                
            }
        }
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
        $pemindahbukuan=data_kas_bank::where('nomor_perkiraan_lawan','like','400%')->sum('jumlah_uang')+memorial::where('nomor_perkiraan','like','400%')->sum('jumlah_uang');
        $nomorkira=nomor_perkiraan::where('kode','491.00')->first();
        if($pemindahbukuan>0){
            $awal=saldo_awal::where('nomor_perkiraan',$nomorkira->kode)->first();
            if(!$awal){
                dd('sini');
                saldo_awal::create([
                    'nomor_perkiraan'=>$nomorkira->kode,
                    'nama_perkiraan'=>$nomorkira->uraian,
                    'jenis'=>'kredit',
                    'saldo_awal'=>0,
                    'created_by'=>$memo->created_by
                ]);

            }
        }
       
// Inisialisasi array untuk menyimpan hasil per golongan
$totalsPerGolongan = [];
$debit=0;
$kredit=0;
$debitmemorial=0;
$kreditmemorial=0;
$jumlahdatakredit=0;
$jumlahdatadebit=0;

foreach ($nomor_perkiraan as $perkiraan) {
    // Pisahkan kode menjadi golongan (misal: "080" menjadi "00")
    $golongan = substr($perkiraan->kode, 0, 3);
    $golongan2=substr($perkiraan->kode,0,2);
    $golongan3=substr($perkiraan->kode,0,1);


    // Tambahkan jumlah perkiraan utama ke array hasil per golongan
    if (!isset($totalsPerGolongan[$golongan3][$golongan2][$golongan]['details'])) {
        $totalsPerGolongan[$golongan3][$golongan2][$golongan]['details'] = [];
    }
        $debit=data_kas_bank::where('nomor_perkiraan_lawan', $perkiraan->kode)->where('jenis', 'Masuk')->sum('jumlah_uang')+memorial::where('nomor_perkiraan',$perkiraan->kode)->where('jenis','debit')->sum('jumlah_uang');
        $kredit=data_kas_bank::where('nomor_perkiraan_lawan', $perkiraan->kode)->where('jenis', 'Keluar')->sum('jumlah_uang')+memorial::where('nomor_perkiraan',$perkiraan->kode)->where('jenis','kredit')->sum('jumlah_uang');
        $debit_total=data_kas_bank::where('nomor_perkiraan_lawan', $perkiraan->kode)->where('jenis', 'Masuk')
        ->whereMonth('tanggal', '=', date('m', strtotime($request->tanggal))) // Filter berdasarkan bulan
        ->whereYear('tanggal', '=', date('Y', strtotime($request->tanggal)))  // Filter berdasarkan tahun
        ->sum('jumlah_uang')+memorial::where('nomor_perkiraan',$perkiraan->kode)->where('jenis','debit')
        ->whereMonth('tanggal', '=', date('m', strtotime($request->tanggal))) // Filter berdasarkan bulan
        ->whereYear('tanggal', '=', date('Y', strtotime($request->tanggal)))  // Filter berdasarkan tahun
        ->sum('jumlah_uang');
        $kredit_total=data_kas_bank::where('nomor_perkiraan_lawan', $perkiraan->kode)->where('jenis', 'Keluar')
        ->whereMonth('tanggal', '=', date('m', strtotime($request->tanggal))) // Filter berdasarkan bulan
        ->whereYear('tanggal', '=', date('Y', strtotime($request->tanggal)))  // Filter berdasarkan tahun
        ->sum('jumlah_uang')+memorial::where('nomor_perkiraan',$perkiraan->kode)->where('jenis','kredit')
        ->whereMonth('tanggal', '=', date('m', strtotime($request->tanggal))) // Filter berdasarkan bulan
        ->whereYear('tanggal', '=', date('Y', strtotime($request->tanggal)))  // Filter berdasarkan tahun
        ->sum('jumlah_uang');
        $data=data_kas_bank::where('nomor_perkiraan',$perkiraan->kode)->get();
        if($data->count()>0){
            $kredit=data_kas_bank::where('nomor_perkiraan',$perkiraan->kode)->where('jenis','Masuk')->sum('jumlah_uang');
            $debit=data_kas_bank::where('nomor_perkiraan',$perkiraan->kode)->where('jenis','Keluar')->sum('jumlah_uang');   
            $kredit=data_kas_bank::where('nomor_perkiraan',$perkiraan->kode)->where('jenis','Masuk')
            ->whereMonth('tanggal', '=', date('m', strtotime($request->tanggal))) // Filter berdasarkan bulan
            ->whereYear('tanggal', '=', date('Y', strtotime($request->tanggal)))  // Filter berdasarkan tahun
            ->sum('jumlah_uang');
            $debit=data_kas_bank::where('nomor_perkiraan',$perkiraan->kode)->where('jenis','Keluar')
            ->whereMonth('tanggal', '=', date('m', strtotime($request->tanggal))) // Filter berdasarkan bulan
            ->whereYear('tanggal', '=', date('Y', strtotime($request->tanggal)))  // Filter berdasarkan tahun
            ->sum('jumlah_uang');
        }
   
    $totalsPerGolongan[$golongan3][$golongan2][$golongan]['details'][] = [
        'kode' => $perkiraan->kode,
        'uraian' => $perkiraan->uraian,
        'jenis'=>$perkiraan->jenis,
        'saldo_awal'=>$perkiraan->saldo_awal,
        'kasbank_debit'=>$debit_total,
        'kasbank_kredit'=>$kredit_total,
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
