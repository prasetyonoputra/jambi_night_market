@extends('master')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Product</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', $product->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama_product"><strong>Nama Produk</strong></label>
                            <input type="text" class="form-control" id="nama_product" name="nama_product"
                                value="{{ $product->nama_product }}">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_produk"><strong>Deskripsi</strong></label>
                            <textarea name="deskripsi_produk" class="form-control"
                                rows="3">{{ $product->deskripsi_produk }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategori_product"><strong>Kategori</strong></label>
                            <input type="text" name="kategori_product" class="form-control" placeholder="Kategori"
                                value="{{ $product->kategori_product }}">
                        </div>
                        <div class="form-group">
                            <label for="harga"><strong>Harga</strong></label>
                            <input type="number" name="harga" class="form-control" placeholder="Harga"
                                value="{{ $product->harga }}">
                        </div>
                        <div class="form-group">
                            <label for="image"><strong>Product Image</strong></label>
                            <input type="file" class="form-control" name="image">
                            @if ($product->image)
                                <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" width="100"
                                    class="mt-3">
                            @endif
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
    </div>
</div>
@endsection