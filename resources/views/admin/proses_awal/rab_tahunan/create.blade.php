@extends('admin.layout.core')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
        </div>
    </div>
    <style>
        .form-container {
            background-color: #494848;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
    </style>
    <!-- row -->
    <div class="row tm-content-row">
        <div class="form-container">
            <form method="POST" action="/rab_tahunan">
                @csrf <!-- Jika Anda menggunakan Laravel, gunakan @csrf untuk melindungi formulir dari serangan CSRF -->
                <div class="form-row">
                    <div class="col">
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control" id="tahun" name="tahun" required>
                        </div>
                        <div class="form-group">
                            <label for="nomor_perkiraan">Nomor Perkiraan</label>
                            <input type="text" class="form-control" id="nomor_perkiraan" name="nomor_perkiraan" required>
                        </div>
                        <div class="form-group">
                            <label for="nomor_perkiraan">Nama Perkiraan</label>
                            <input type="text" class="form-control" id="nama_perkiraan" name="nomor_perkiraan" required>
                        </div>
                        <!-- Lanjutkan dengan kolom pertama -->
                        <!-- ... -->
                        <div class="form-group">
                            <label for="rab_juli">RAB Januari</label>
                            <input type="text" class="form-control" id="rab_januari" name="rab_januari" required>
                        </div>
                        <div class="form-group">
                            <label for="rab_juli">RAB Februaru</label>
                            <input type="text" class="form-control" id="rab_juli" name="rab_februari" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="rab_juli">RAB Maret</label>
                            <input type="text" class="form-control" id="rab_juli" name="rab_maret" required>
                        </div>
                        <div class="form-group">
                            <label for="rab_juli">RAB April</label>
                            <input type="text" class="form-control" id="rab_juli" name="rab_april" required>
                        </div>
                        <div class="form-group">
                            <label for="rab_agustus">RAB Mei</label>
                            <input type="text" class="form-control" id="rab_agustus" name="rab_mei" required>
                        </div>
                        <div class="form-group">
                            <label for="rab_agustus">RAB Juni</label>
                            <input type="text" class="form-control" id="rab_agustus" name="rab_juni" required>
                        </div>
                        <div class="form-group">
                            <label for="rab_agustus">RAB Juli</label>
                            <input type="text" class="form-control" id="rab_agustus" name="rab_juli" required>
                        </div>
                    </div>
                       
                    <div class="col">
                        <div class="form-group">
                            <label for="rab_agustus">RAB Agustus</label>
                            <input type="text" class="form-control" id="rab_agustus" name="rab_agustus" required>
                        </div>
                        <div class="form-group">
                            <label for="rab_september">RAB September</label>
                            <input type="text" class="form-control" id="rab_september" name="rab_september" required>
                        </div>
                        <div class="form-group">
                            <label for="rab_september">RAB Oktober</label>
                            <input type="text" class="form-control" id="rab_september" name="rab_oktober" required>
                        </div>
                        <div class="form-group">
                            <label for="rab_september">RAB November</label>
                            <input type="text" class="form-control" id="rab_september" name="rab_november" required>
                        </div>
                        <div class="form-group">
                            <label for="rab_desember">RAB Desember</label>
                            <input type="text" class="form-control" id="rab_desember" name="rab_desember" required>
                        </div>
                        <!-- Lanjutkan untuk bulan-bulan berikutnya -->
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
       
       
    </div>
</div>
@endsection

