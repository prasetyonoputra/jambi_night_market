@extends('master')

@section('konten')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <h2>Product List</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
            <table class="table table-striped" id="productTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Promo</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->promo }}</td>
                            <td><img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" width="50"></td>
                            </td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
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