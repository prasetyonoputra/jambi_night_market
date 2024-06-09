@extends('master')

@section('konten')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <h2>List Informasi</h2>
            <a href="{{ route('information.create') }}" class="btn btn-primary mb-3">Tambah Informasi</a>
            <table class="table table-striped" id="productTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama UMKM</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Kontak</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($informations as $information)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $information->nama_umkm }}</td>
                            <td>{{ $information->alamat }}</td>
                            <td>{{ $information->deskripsi }}</td>
                            <td>{{ $information->kontak }}</td>
                            </td>
                            <td>
                                <a href="{{ route('information.edit', $information->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('information.destroy', $information->id) }}" method="POST"
                                    style="display: inline-block;">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#productTable').DataTable();
    });
</script>

@endsection