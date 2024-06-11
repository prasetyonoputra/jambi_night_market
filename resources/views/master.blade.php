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
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .container-fluid {
            height: 100%;
        }

        .row {
            height: 100%;
        }

        #sidebar {
            background-color: #FFECB3;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .sidebar-heading {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            padding: 3rem;
            background-color: #FFECB3;
        }

        .list-group-item {
            margin-bottom: 8px;
            border-radius: 5px !important;
            border: none;
            text-align: center;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            letter-spacing: 1px;
            transition: 0.3s ease, color 0.3s ease;
            background-color: #FFF9C4;
            color: #333333;
        }

        .list-group-item:hover {
            background-color: #FFD54F;
            color: #333333;
        }

        .navbar {
            background-color: #FFFBD3;
        }

        .custom-background {
            background-image: linear-gradient(to top, #FFFBD3 0%, #FFFBD3 100%);
            background-size: cover;
            background-position: center;
            padding: 0px !important;
        }

        .nav-link {
            color: #333333 !important;
        }

        .dropdown-menu {
            background-color: #FFF9C4;
        }

        .dropdown-item:hover {
            background-color: #FFD54F;
        }
        .card {
            background-color: #FFECB3;
        }

        .form-control {
            background-color: #FFFBD3;
        }

        .form-select {
            background-color: #FFFBD3;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 border-right" id="sidebar" style="min-width: 200px;">
                <div
                    class="sidebar-heading p-3 d-flex justify-content-center align-items-center flex-column text-center">
                    <img src="{{ asset('images/JNM_LOGO.png') }}" alt="Deskripsi Gambar" width="100px">
                    <h5>JAMBI NIGHT MARKET</h5>
                </div>

                @if (Auth::user()->role == 'penjual')
                    <ul class="list-group list-group-flush">
                        <li>
                            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">Kelola
                                Product</a>
                        </li>
                        <li>
                            <a href="{{ route('pembelian.index') }}" class="list-group-item list-group-item-action">Status
                                Pesanan</a>
                        </li>
                        <li>
                            <a href="{{ route('umkm.create') }}" class="list-group-item list-group-item-action">Info
                                UMKM</a>
                        </li>
                    </ul>
                @endif

                @if (Auth::user()->role == 'admin')
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('umkm.index') }}" class="list-group-item list-group-item-action">Kelola
                            UMKM</a>
                        <a href="{{ route('pembelian.index') }}" class="list-group-item list-group-item-action">Status
                            Pesanan</a>
                        <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">Kelola
                            Produk</a>
                        <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">Kelola
                            User</a>
                    </ul>
                @endif

                @if (Auth::user()->role == 'pembeli')
                    <ul class="list-group list-group-flush">
                        <li>
                            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">Beli
                                Produk</a>
                        </li>
                        <li>
                            <a href="{{ route('pembelian.index') }}"
                                class="list-group-item list-group-item-action">Keranjang</a>
                        </li>
                    </ul>
                @endif
            </div>

            <div class="col-md-9 bg-light col-lg-10 custom-background">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown" style="padding-right: 5vw;">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false" style="color: white;">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('actionlogout') }}">Keranjang</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('actionlogout') }}">Log Out</a>
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