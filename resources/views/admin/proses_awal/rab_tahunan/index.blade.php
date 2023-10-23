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
        <a href="/rab_tahunans/create" class="btn btn-primary mb-3">Create Data</a>
        <div class="table-responsive">
            <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Tahun</th>
                    <th>Nomor Perkiraan</th>
                    <th>Nama Perkiraan</th>
                    <th>RAB Januari</th>
                    <th>RAB Februari</th>
                    <th>RAB Maret</th>
                    <th>RAB April</th>
                    <th>RAB Mei</th>
                    <th>RAB Juni</th>
                    <th>RAB Juli</th>
                    <th>RAB Agustus</th>
                    <th>RAB September</th>
                    <th>RAB Oktober</th>
                    <th>RAB November</th>
                    <th>RAB Desember</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2023</td>
                    <td>123</td>
                    <td>Perkiraan A</td>
                    <td>1000</td>
                    <td>1200</td>
                    <td>800</td>
                    <td>900</td>
                    <td>1100</td>
                    <td>1000</td>
                    <td>1300</td>
                    <td>1400</td>
                    <td>1500</td>
                    <td>1200</td>
                    <td>1100</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td>2023</td>
                    <td>456</td>
                    <td>Perkiraan B</td>
                    <td>1500</td>
                    <td>1300</td>
                    <td>1100</td>
                    <td>1400</td>
                    <td>1200</td>
                    <td>1000</td>
                    <td>1100</td>
                    <td>1200</td>
                    <td>1400</td>
                    <td>1300</td>
                    <td>1200</td>
                    <td>1500</td>
                </tr>
                <!-- Tambahkan baris tambahan jika perlu -->
            </tbody>
        </table>
        </div>
       
       
    </div>
</div>
@endsection

