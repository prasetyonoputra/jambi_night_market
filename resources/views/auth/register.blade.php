<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link rel="icon" href="{{ asset('images/JNM_LOGO.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            background: linear-gradient(120deg, #FFFDE7 0%, #FFF9C4 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #FFECB3;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .text-center h2 {
            color: #795548;
        }

        .form-label {
            color: #5D4037;
        }

        .form-control {
            border: 1px solid #FFCC80;
        }

        .btn-primary {
            background-color: #FFB74D;
            border-color: #FFB74D;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #FFA726;
            border-color: #FFA726;
        }

        .alert-success {
            background-color: #A5D6A7;
            border-color: #81C784;
            color: #fff;
        }

        a {
            color: #795548;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        hr {
            border-top: 1px solid #FFCC80;
        }
    </style>
</head>

<body>
    <div class="container w-25">
        <div class="row justify-content-center">
            <div class="col">
                <div class="w-100 d-flex justify-content-center">
                    <img src="{{ asset('images/JNM_LOGO.png') }}" alt="Deskripsi Gambar" width="100px">
                </div>
                <h2 class="text-center">Form Register</h2>
                <hr>
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="{{ route('actionregister') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role">
                            <option value="pembeli" selected>Pembeli</option>
                            <option value="penjual">Penjual</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                    <hr>
                    <p class="text-center">Sudah punya akun? Silahkan <a href="{{route('login')}}">Login Disini!</a></p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>