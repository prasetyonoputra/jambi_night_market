@extends('master')

@section('konten')
<div class="container mt-4 d-flex justify-content-center">
    <div class="card w-75 mt-4">
        <div class="card-header">
            <h2 class="text-center">Form Pendaftaran UMKM</h2>
        </div>

        @if ($umkm->isNotEmpty())
            <script>window.location = "{{ route('umkm.edit', $umkm->first()->id) }}";</script>
        @endif

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
            <form action="{{ route('umkm.store') }}" method="POST">
                @csrf
                <div class="col">
                    <div class="form-group">
                        <label for="nama_umkm"><strong>Nama UMKM</strong></label>
                        <input type="text" name="nama_umkm" class="form-control" placeholder="Nama UMKM">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="email"><strong>Email</strong></label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="no_telp"><strong>No Telp</strong></label>
                        <input type="text" name="no_telp" class="form-control" placeholder="No Telepon">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="alamat"><strong>Alamat</strong></label>
                        <textarea name="alamat" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="deskripsi"><strong>Deskripsi</strong></label>
                        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
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