@extends('master')

@section('konten')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <h2>List Pembelian</h2>
            <table class="table table-striped" id="productTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Product</th>
                        @if (Auth::user()->role != "pembeli")
                            <th>Pembeli</th>
                        @endif
                        <th>Tanggal Pembelian</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_keranjang as $pembelian)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pembelian->nama_product }}</td>
                            @if (Auth::user()->role != "pembeli")
                                <td>{{ $pembelian->email }}</td>
                            @endif
                            <td>{{ $pembelian->tanggal_pembelian }}</td>
                            <td>{{ $pembelian->jumlah }}</td>
                            <td>{{ formatRupiah(($pembelian->total_harga)) }}</td>
                            <td>{{ $pembelian->status }}</td>
                            </td>
                            @if (Auth::user()->role == "pembeli")
                                @if ($pembelian->status == "Menunggu Pembayaran")
                                    <td>
                                        <a href="{{ route('pembelian.bayar', $pembelian->id) }}" class="btn btn-warning">Bayar</a>
                                        <form action="{{ route('pembelian.destroy', $pembelian->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                @else
                                    <td>
                                        <a href="#" class="btn btn-warning">{{ $pembelian->status }}</a>
                                    </td>
                                @endif
                            @endif

                            @if (Auth::user()->role != "pembeli")
                                @if ($pembelian->status == "Dibayar")
                                    <td>
                                        <a href="{{ route('pembelian.kirim', $pembelian->id) }}" class="btn btn-warning">Kirim</a>
                                        <a href="{{ route('pembelian.tolak', $pembelian->id) }}" class="btn btn-danger">Tolak</a>
                                    </td>
                                @else
                                    <td>
                                        <a href="#" class="btn btn-warning">{{ $pembelian->status }}</a>
                                    </td>
                                @endif
                            @endif
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