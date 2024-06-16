@extends('master')

@section('konten')
<div class="container mt-4 d-flex justify-content-center">
    <div class="card w-75 mt-4">
        <div class="card-header">
            <h2 class="text-center">Form Produk</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col">
                    <div class="form-group">
                        <label for="nama_product"><strong>Nama Produk</strong></label>
                        <input type="text" name="nama_product" class="form-control" placeholder="Nama Produk">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="deskripsi_produk"><strong>Deskripsi</strong></label>
                        <textarea name="deskripsi_produk" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="kategori_product"><strong>Kategori</strong></label>
                        <input type="text" name="kategori_product" class="form-control" placeholder="Kategori">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="harga"><strong>Harga</strong></label>
                        <input type="number" name="harga" class="form-control" placeholder="Harga">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="image"><strong>Product Image</strong></label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection