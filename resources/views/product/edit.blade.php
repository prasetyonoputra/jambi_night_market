@extends('master')

@section('konten')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Product</div>

                <div class="card-body">
                    <form method="PUT" action="{{ route('products.update', $product->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                        </div>

                        <div class="form-group">
                            <label for="promo">Promo</label>
                            <input type="text" class="form-control" id="promo" name="promo" value="{{ $product->promo }}">
                        </div>

                        <div class="form-group">
                            <label for="existing_image">Current Image:</label>
                            <img src="{{ asset('images/products/' . $product->image) }}" alt="Product Image" width="100">
                        </div>

                        <div class="form-group">
                            <label for="image">New Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
