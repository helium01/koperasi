<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
            }
            .container {
                text-align: center;
            }
            .title {
                font-size: 24px;
                font-weight: bold;
            }
            .subtitle {
                font-size: 18px;
                font-weight: bold;
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: center;
            }
            body {
                font-family: Arial, sans-serif;
                text-align: center;
            }
            #header {
                margin-bottom: 20px;
            }
            #logo {
                float: left;
                height: 50px; /* Sesuaikan dengan tinggi tulisan */
                /* margin-right: 5px; */
            }
            h1, h2 {
                margin: 0;
            }
            #header {
            display: flex;
            align-items: center;
        }
        
        #logo {
            width: 80px; /* Sesuaikan lebar sesuai kebutuhan */
            height: auto; /* Sesuaikan tinggi sesuai kebutuhan atau biarkan otomatis */
        }
        
        #header-text {
            margin-left: 20px; /* Sesuaikan jarak dari logo sesuai kebutuhan */
        }
        @page :first {
            margin-top: 30mm; /* Margin top untuk halaman pertama */
        }

        @page {
            margin-top: 30mm; /* Margin top untuk halaman ke-2 dan seterusnya */
        }
        table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        display: table-header-group;
    }

    #header-text {
        background-color: #ccc; /* Atur warna latar belakang header sesuai kebutuhan Anda */
    }
        </style>
       
    </head>
    <body>
        <div class="container">
  
            <table>
                <thead>
                    <tr id="header-text">
                        <th rowspan="2">No Bukti</th>
                        <th rowspan="2">NOMOR DAN NAMA PERKIRAAN</th>
                        <th colspan="2">JUMLAH SD AKHIR THN.YBL AWAL THN.INI</th>
                        <th colspan="2">MUTASI BULAN INI</th>
                        <th colspan="2">MUTASI SAMPAI DENGAN BULAN INI</th>
                        <th colspan="2">JUMLAH SD.BULAN INI/PD.TAHUN INI</th>
                        <th colspan="2">RAB SD.BL.INI</th>
                    </tr>
                    <tr id="header-text">
                        <th>DEBIT</th>
                        <th>KREDIT</th>
                        <th>DEBIT</th>
                        <th>KREDIT</th>
                        <th>DEBIT</th>
                        <th>KREDIT</th>
                        <th>DEBIT</th>
                        <th>KREDIT</th>
                        <th>DEBIT</th>
                        <th>KREDIT</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php
                    $index=0
                @endphp
                @foreach ($data as $key=>$dt)
                @foreach ($dt["items"] as $d)
                <tr>
                    <td>{{$d->nomor_bukti}}</td>
                    <td>{{$d->nomor_perkiraan}} | {{$d->uraian}}</td>
                    @if($d->jenis=="debit")
                    <td>{{$d->jumlah_uang}}</td>
                    <td>0</td>
                    @else
                    <td>0</td>
                    <td>{{$d->jumlah_uang}}</td>
                    @endif
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="10">======================================================================================================================</td>
                    </tr> 
                 <tr>
                    <td>-</td>
                    <td>Jumlah Nomor Bukti {{$dt["items"][0]["nomor_bukti"]}}</td>
                    <td>{{$dt["debit"]}}</td>
                    <td>{{$dt["kredit"]}}</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>  
                <tr>
                    <td></td>
                    <td></td>
                    <td colspan="10">======================================================================================================================</td>
                </tr> 
                @endforeach
                <tr>
                    <td></td>
                    <td>rekapitulasi</td>
                    <td colspan="10"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>=================</td>
                    <td colspan="10"></td>
                </tr>
                <tr>
                    <td>0</td>
                    <td>Aktiva Benda Dan Modal</td>
                    <td>{{$totalDebit}}</td>
                    <td>{{$totalKredit}}</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Keuangan</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Persediaan Barang Bahan Perlengkapan</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Jenis Biaya Tahun Ini</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Tempat Biaya Tahun Ini</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Pendapatan Penghasilan Tahun Ini</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Laba Rugi Tahun Ini</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
                </tbody>  
            </table>
           
        </div>
        <script type="text/php">
            if ( isset($pdf) ) { 
                $pdf->page_script('
                    $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                    $size = 12;
                    $pageText = "HALAMAN : " . $PAGE_NUM . " dari " . $PAGE_COUNT;
                    $y = 40;
                    $x = 1020;
                    $pdf->text($x, $y, $pageText, $font, $size);
                    $pageText = "BULAN : DESEMBER 2023";
                    $y = 60;
                    $x = 1000;
                    $pdf->text($x, $y, $pageText, $font, $size);
                    $pageText = "NERACA SISA";
                    $y = 40;
                    $x = 520;
                    $pdf->text($x, $y, $pageText, $font, 24);
                    $headerText = "PT PERKEBUNAN KOPKAR PABRIK GULA DJATIROTO";
                    $pdf->text(130, 20, $headerText, $font, $size);
                    $headerText = "UNIT KERJA PTPN XI PG. JATIROTO";
                    $pdf->text(130, 40, $headerText, $font, $size);
                    $imagePath = public_path("logo.jpg"); // Ganti dengan path gambar Anda
                    $pdf->image($imagePath, 50, 70, 60, 0);
                    $html = \'
                    <table border="1" cellpadding="2" cellspacing="0">
                        <tr>
                            <th rowspan="2">No Bukti</th>
                            <th rowspan="2">NOMOR DAN NAMA PERKIRAAN</th>
                            <th colspan="2">JUMLAH SD AKHIR THN.YBL AWAL THN.INI</th>
                            <th colspan="2">MUTASI BULAN INI</th>
                            <th colspan="2">MUTASI SAMPAI DENGAN BULAN INI</th>
                            <th colspan="2">JUMLAH SD.BULAN INI/PD.TAHUN INI</th>
                            <th colspan="2">RAB SD.BL.INI</th>
                        </tr>
                        <tr>
                            <th>DEBIT</th>
                            <th>KREDIT</th>
                            <th>DEBIT</th>
                            <th>KREDIT</th>
                            <th>DEBIT</th>
                            <th>KREDIT</th>
                            <th>DEBIT</th>
                            <th>KREDIT</th>
                            <th>DEBIT</th>
                            <th>KREDIT</th>
                        </tr>
                        <!-- Add your table data here -->
                    </table>
                    \';
            
            ');
            }
        </script>
    </body>
</html>


