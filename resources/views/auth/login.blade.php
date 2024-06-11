<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/JNM_LOGO.png') }}">

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

        .alert-danger {
            background-color: #FF8A65;
            border-color: #FF7043;
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
                <h2 class="text-center">Jambi Night Market</h2>
                <hr>
                @if(session('error'))
                    <div class="alert alert-danger">
                        <b>Opps!</b> {{session('error')}}
                    </div>
                @endif
                <form action="{{ route('actionlogin') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Log In</button>
                    <hr>
                    <p class="text-center">Belum punya akun? <a href="{{ route('register') }}">Register</a> sekarang!
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>