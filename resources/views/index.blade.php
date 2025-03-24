<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
        body {
            background-color: #1D0CD1;
            width: auto;
            height: auto;
        }

        #logo {
            display: flex;
            width: 100%;
            height: 100%;
            margin-top: 10%;
            /* margin-left: 100px; */
        }

        #judul {
            color: #FFF9F9;
            padding-top: 10%;
            font-size: 50px;
        }

        #form {
            /* margin-left: 600px; */
            margin-top: 60px;
            padding-right: 100px;
        }
    </style>
</head>

<body>
    <form action="login" method="POST">
        @csrf
        <div class="container-md m-5 d-flex justify-content-center align-items-start gap-5">
            <div class="col-md-4 text-center align-items-center mt-5 me-3 ms-5">
                <img src="/assets/logo.png" class="img-responsive rounded float-start" id="logo">
            </div>
            <div class="col-md-6 justify-content-center text-center ms-5" id="form">
                <h1 class="fw-bold text-center" id="judul">Absen Magang</h1>
                <br>
                <input type="email" name="email" class="form-control form-control-lg" placeholder="Masukkan Email"
                    id="email" required>
                <br>
                <input type="password" name="password" id="pass" class="form-control form-control-lg"
                    placeholder="Masukkan Kata Sandi" required>
                <br>
                <div class="col-md d-flex justify-content-center text-center mt-5">
                    <button type="submit" class="btn btn-light w-50 h-100 p-1 fs-3" id="masuk">Masuk</button>
                </div>
            </div>
        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger col-md-6 text-center position-absolute top-50 start-50 translate-middle">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>

</html>
