@extends('master')

@section('konten')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <h2>Form Pendaftaran UNKM</h2>
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
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name"><strong>Nama UMKM:</strong></label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stock"><strong>Pemilik:</strong></label>
                            <input type="number" name="stock" class="form-control" placeholder="Stock">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price"><strong>Alamat:</strong></label>
                            <input type="number" name="price" class="form-control" placeholder="Price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="promo"><strong>Email:</strong></label>
                            <input type="text" name="promo" class="form-control" placeholder="Promo">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price"><strong>Deskripsi:</strong></label>
                            <input type="number" name="price" class="form-control" placeholder="Price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="promo"><strong>Status:</strong></label>
                            <input type="text" name="promo" class="form-control" placeholder="Promo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary w-25">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
