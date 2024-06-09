@extends('master')

@section('konten')
<div class="container mt-4 d-flex justify-content-center">
    <div class="card w-75 mt-4">
        <div class="card-header">
            <h2 class="text-center">Info User</h2>
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
            <form method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="col">
                    <div class="form-group">
                        <label for="name"><strong>Nama</strong></label>
                        <input type="text" name="name" class="form-control" placeholder="Nama"
                            value="{{ old('name', $user->name) }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="alamat"><strong>Alamat</strong></label>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat"
                            value="{{ old('alamat', $user->alamat) }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="kontak"><strong>Email</strong></label>
                        <input type="email" name="email" class="form-control" placeholder="Email"
                            value="{{ old('email', $user->email) }}">
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