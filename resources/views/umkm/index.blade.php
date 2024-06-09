@extends('master')

@section('konten')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <h2>List UMKM</h2>
            <table class="table table-striped" id="productTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama UMKM</th>
                        <th>Pemilik</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>No Telp</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($list_umkm as $umkm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $umkm->nama_umkm }}</td>
                            <td>{{ $umkm->pemilik }}</td>
                            <td>{{ $umkm->alamat }}</td>
                            <td>{{ $umkm->email }}</td>
                            <td>{{ $umkm->no_telp }}</td>
                            <td>{{ $umkm->deskripsi }}</td>
                            <td>{{ $umkm->status }}</td>
                            </td>
                            <td>
                                <a href="{{ route('umkm.edit', $umkm->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('umkm.destroy', $umkm->id) }}" method="POST"
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