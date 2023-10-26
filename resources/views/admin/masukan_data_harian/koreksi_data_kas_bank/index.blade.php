@extends('admin.layout.core')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <p class="text-white mt-5 mb-5">Koreksi Masukan Data Kas <b>Bank</b></p>
        </div>
    </div>
    <!-- row -->
    <div class="row tm-content-row">
        <a href="/data_kas_banks/create" class="btn btn-primary mb-3">Create Data</a>
        
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Tanggal</th>
                    <th>Jenis</th>
                    <th>Nomor Bukti</th>
                    <th>Nomor Perkiraan</th>
                    <th>Nomor Perkiraan Lawan</th>
                    <th>Deskripsi</th>
                    <th>UBL</th>
                    <th>Jumlah Uang</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_kas_banks as $data)
                <tr>
                    <td>{{$data->tanggal}}</td>
                    <td>{{$data->jenis}}</td>
                    <td>{{$data->nomor_bukti}}</td>
                    <td>{{$data->nomor_perkiraan}}</td>
                    <td>{{$data->nomor_perkiraan_lawan}}</td>
                    <td>{{$data->deskripsi}}</td>
                    <td>{{$data->ubl}}</td>
                    <td>{{$data->jumlah_uang}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
       
    </div>
</div>
@endsection

