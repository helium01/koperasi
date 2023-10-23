@extends('admin.layout.core')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
        </div>
    </div>
    <!-- row -->
    <div class="row tm-content-row">
        <a href="#" class="btn btn-primary mb-3">Create Data</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Tahun</th>
                    <th>Jenis</th>
                    <th>Nomor Bukti</th>
                    <th>Nomor Perkiraan</th>
                    <th>Deskripsi</th>
                    <th>UBL</th>
                    <th>Jumlah Uang</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2023</td>
                    <td>Pemasukan</td>
                    <td>123456</td>
                    <td>101</td>
                    <td>Pemasukan dari penjualan</td>
                    <td>UBL123</td>
                    <td>1000000</td>
                </tr>
                <tr>
                    <td>2023</td>
                    <td>Pengeluaran</td>
                    <td>789012</td>
                    <td>301</td>
                    <td>Pembayaran gaji karyawan</td>
                    <td>UBL456</td>
                    <td>500000</td>
                </tr>
                <!-- Tambahkan baris tambahan jika perlu -->
            </tbody>
        </table>
       
       
       
    </div>
</div>
@endsection

