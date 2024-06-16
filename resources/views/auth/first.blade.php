<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <link rel="icon" href="{{ asset('images/JNM_LOGO.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <style>
        body {
            background-image: url('{{ asset('images/first_background.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        h1 {
            color: white;
            font-size: 50px;
            margin: 0px;
            font-family: "Courier New";
        }
    </style>
</head>

<body>
    <h1>Selamat Datang di JNM</h1>
    <h1>(Jambi Night Market)</h1>

    <a href="{{ route('login') }}" class="btn btn-warning mt-3" style="width: 100px">Mulai</a>
</body>

</html>