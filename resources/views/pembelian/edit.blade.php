@extends('master')

@section('konten')
<div class="container mt-4 d-flex justify-content-center">
    <div class="card w-75 mt-4">
        <div class="card-header">
            <h2 class="text-center">Form Informasi</h2>
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
            <form method="POST" action="{{ route('information.update', $information->id) }}">
                @csrf
                @method('PUT')

                <div class="col">
                    <div class="form-group">
                        <label for="nama_umkm"><strong>Nama UMKM</strong></label>
                        <input type="text" name="nama_umkm" class="form-control" placeholder="Nama UMKM"
                            value="{{ old('nama_umkm', $information->nama_umkm) }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="alamat"><strong>Alamat</strong></label>
                        <textarea name="alamat" class="form-control"
                            rows="3">{{ old('alamat', $information->alamat) }}</textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="deskripsi"><strong>Deskripsi</strong></label>
                        <textarea name="deskripsi" class="form-control"
                            rows="3">{{ old('deskripsi', $information->deskripsi) }}</textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="kontak"><strong>Kontak</strong></label>
                        <input type="text" name="kontak" class="form-control" placeholder="Kontak"
                            value="{{ old('kontak', $information->kontak) }}">
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