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
        
        <div class="container mt-5">
            <h2 class="mb-4">Pilih Tanggal dan Tahun</h2>
            @if(session('pesan'))
            <div class="alert alert-success">
                {{ session('pesan') }}
            </div>
        @endif
            <form id="myForm" method="get" action="/cetak/neraca">
              @csrf
              <div class="form-group">
                <label for="tanggal">Tanggal:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
              </div>
              
        
              <button type="submit" class="btn btn-primary" >Submit</button>
            </form>
          </div>
       
       
    </div>
</div>
@endsection

