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
        <form method="POST" action="/saldo_awals/{{$saldo_awal->id}}">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="nomor_perkiraan">Nomor Perkiraan</label>
                <input type="text" class="form-control" id="nomor_perkiraan" maxlength="5" name="nomor_perkiraan" required readonly value="{{$saldo_awal->nomor_perkiraan}}">
            </div>
            <div class="form-group">
                <label for="nama_perkiraan">Nama Perkiraan</label>
                <input type="text" class="form-control" id="nama_perkiraan" name="nama_perkiraan" required value="{{$saldo_awal->nama_perkiraan}}">
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <select class="form-control" id="jenis" name="jenis" required>
                    <option value="{{$saldo_awal->jenis}}" disabled selected>{{$saldo_awal->jenis}}</option>
                    <option value="debit">Debit</option>
                    <option value="kredit">Kredit</option>
                </select>
            </div>
            <div class="form-group">
                <label for="saldo_awal">Saldo Awal</label>
                <input type="number"  class="form-control" id="saldo_awal" name="saldo_awal" required value="{{$saldo_awal->saldo_awal}}">
            </div>
            <input type="hidden" class="form-control" id="uraian" name="created_by" value="{{Auth::user()->name}}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <script>
            function getNamaPerkiraan() {
                let nomorPerkiraan = document.getElementById('nomor_perkiraan').value;
                console.log(nomorPerkiraan);
                if (nomorPerkiraan !== '') {
                    fetch(`/saldo_awal/${nomorPerkiraan}`)
                        .then(response => response.json())
                        .then(data => {
                            let select = document.getElementById('jenis');
                            let option = document.createElement('option');
                            option.value = data[0].jenis; 
                            option.text = data[0].jenis; 
                                option.selected = true; // memilih opsi 'kredit' secara otomatis
                            select.appendChild(option);
                            console.log(data[0].nama_perkiraan);
                            document.getElementById('nama_perkiraan').value = data[0].nama_perkiraan;
                            document.getElementById('saldo_awal').value = data[0].saldo_awal;
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }
            }
        </script>
       
       
       
    </div>
</div>
@endsection

