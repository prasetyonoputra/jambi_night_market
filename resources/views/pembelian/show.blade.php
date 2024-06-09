@extends('master')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Product Details</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <p>{{ $product->name }}</p>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <p>{{ $product->stock }}</p>
                    </div>

                    <div class="form-group">
                        <label for="price">Price:</label>
                        <p>{{ $product->price }}</p>
                    </div>

                    <div class="form-group">
                        <label for="promo">Promo:</label>
                        <p>{{ $product->promo }}</p>
                    </div>

                    <div class="form-group">
                        <label for="image">Image:</label><br>
                        <img src="{{ asset('storage/images/products/' . $product->image) }}" alt="Product Image" width="300">
                    </div>

                    <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
