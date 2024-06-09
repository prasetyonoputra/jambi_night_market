@extends('master')

@section('konten')

@if (Auth::user()->role == "penjual")
    @if (sizeof($umkm) == 0)
        <script>window.location = "{{ route('umkm.create') }}";</script>
    @endif

    @if (sizeof($umkm) > 0)
        @if ($umkm->first()->status != "Terverifikasi")
            <script>window.location = "{{ route('umkm.edit', $umkm->first()->id) }}";</script>
        @endif
    @endif
@endif

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <h2>List Produk</h2>
            @if (Auth::user()->role != "pembeli")
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>
            @endif
            <table class="table table-striped" id="productTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->nama_product }}</td>
                            <td>{{ formatRupiah($product->harga) }}</td>
                            <td>{{ $product->deskripsi_produk }}</td>
                            <td>{{ $product->kategori_product }}</td>
                            <td>
                                @if (Auth::user()->role != "pembeli")
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endif

                                @if (Auth::user()->role == "pembeli")
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning">Detail</a>
                                @endif
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