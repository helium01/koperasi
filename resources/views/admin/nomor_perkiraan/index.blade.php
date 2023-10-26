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
        <a href="/nomor_perkiraans/create" class="btn btn-primary mb-3">Create Data</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Uraian</th>
                        <th scope="col">Created_by</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nomor_perkiraans as $nomorPerkiraan)
                    <tr>
                        <th scope="row">{{ $nomorPerkiraan->id }}</th>
                        <td>{{ $nomorPerkiraan->kode }}</td>
                        <td>{{ $nomorPerkiraan->uraian }}</td>
                        <td>{{ $nomorPerkiraan->created_by }}</td>
                        <td>
                            <a href="{{ route('nomor_perkiraans.edit', $nomorPerkiraan->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('nomor_perkiraans.destroy', $nomorPerkiraan->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
       
       
    </div>
</div>
@endsection

