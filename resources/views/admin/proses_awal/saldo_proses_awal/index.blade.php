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
                    <th>Nomor Perkiraan</th>
                    <th>Nama Perkiraan</th>
                    <th>Jenis</th>
                    <th>Saldo Awal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>101</td>
                    <td>Kas</td>
                    <td>Debit</td>
                    <td>1000000</td>
                </tr>
                <tr>
                    <td>201</td>
                    <td>Piutang Usaha</td>
                    <td>Debit</td>
                    <td>500000</td>
                </tr>
                <!-- Tambahkan baris tambahan jika perlu -->
            </tbody>
        </table>
       
       
       
    </div>
</div>
@endsection

