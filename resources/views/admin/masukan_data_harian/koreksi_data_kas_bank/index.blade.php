@extends('admin.layout.core')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <p class="text-white mt-5 mb-5">Koreksi Masukan Data Kas <b>Bank</b></p>
        </div>
    </div>
    <!-- row -->
    <div class="row ">
        <div class="row">
            <div class="col">
                <a href="/data_kas_banks/create" class="btn btn-primary mb-3">Tambahkan Data</a>
            </div>
        </div>
        <div class="row ml-3 mr-3 mb-3">
            <div class="col">
                <form action="/data_kas_banks" method="get">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                    <button type="submit" class="btn btn-primary">Cari Data</button>
                </form>
            </div>
        </div>
        
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
                    <th>Created By</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @if ($data_kas_banks->count()==0)
                    <td colspan="10" align="center">data tidak di temukan</td>
                @else
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
                    <td>{{$data->created_by}}</td>
                    <td>
                        <a href="/data_kas_banks/edit/{{$data->nomor_bukti}}" class="btn btn-primary">Edit</a>
                        <a href="/data_kas_banks/hapus/{{$data->nomor_bukti}}" class="btn btn-danger">Hapus</a>
                        
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
       
       
    </div>
</div>
@endsection

