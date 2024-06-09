@extends('master')

@section('konten')
<div class="container">
    <div class="row justify-content-center d-flex">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Detail Product</div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name"><strong>Nama Produk</strong></label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $product->nama_product }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_produk"><strong>Deskripsi</strong></label>
                            <textarea name="deskripsi_produk" class="form-control" rows="3"
                                disabled>{{ $product->deskripsi_produk }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategori_product"><strong>Kategori</strong></label>
                            <input type="text" name="kategori_product" class="form-control" placeholder="Kategori"
                                value="{{ $product->kategori_product }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="harga"><strong>Harga</strong></label>
                            <input type="text" name="harga" class="form-control" placeholder="Harga"
                                value="{{ $product->harga }}" disabled>
                        </div>
                    </form>

                    <form action="{{ route('pembelian.store') }}" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" id="nama_product" name="nama_product"
                            value="{{ $product->nama_product }}">
                        <input type="hidden" class="form-control" id="id_product" name="id_product"
                            value="{{ $product->id }}">
                        <div class="col">
                            <div class="col-md-12 mt-3 d-flex justify-content-end">
                                <div class="form-group">
                                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah">
                                </div>
                                <button type="submit" class="btn btn-primary">Beli</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="height: 500px;">
                <div class="card-header">Ulasan</div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection