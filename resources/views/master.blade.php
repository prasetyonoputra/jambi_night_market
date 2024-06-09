<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | JAMBI NIGHT MARKET</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3 col-lg-2 bg-light border-right" id="sidebar">
                <div class="sidebar-heading p-3 text-center">
                    <h5>JAMBI NIGHT MARKET</h5>
                </div>
                @if (Auth::user()->role == 'penjual')
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{ route('products.index') }}"
                                class="list-group-item list-group-item-action">Kelola Product</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('pembelian.index') }}" class="list-group-item list-group-item-action">Status
                                Pesanan</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('umkm.create') }}" class="list-group-item list-group-item-action">Info
                                UMKM</a>
                        </li>
                    </ul>
                @endif

                @if (Auth::user()->role == 'admin')
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{ route('umkm.index') }}" class="list-group-item list-group-item-action">Kelola
                                Informasi UMKM</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('pembelian.index') }}" class="list-group-item list-group-item-action">Status
                                Pesanan</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">Kelola Produk</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">Kelola User</a>
                        </li>
                    </ul>
                @endif

                @if (Auth::user()->role == 'pembeli')
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">Beli Produk</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ route('pembelian.index') }}" class="list-group-item list-group-item-action">Keranjang</a>
                        </li>
                    </ul>
                @endif
            </div>


            <div class="col-md-9 col-lg-10">
                <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown" style="padding-right: 5vw;">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        {{Auth::user()->name}}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{route('actionlogout')}}">Keranjang</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{route('actionlogout')}}">Log Out</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                @yield('konten')
            </div>
        </div>
    </div>
</body>

</html>