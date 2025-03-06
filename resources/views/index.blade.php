<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body{
            background-color: #1D0CD1;
        }
        #logo{
            display: flex;
            width: 396px;
            height: 392px;
            margin-top: 150px;
            margin-left: 150px;
        }
        #judul{
            color: #FFF9F9;
            padding-top: 150px;
            font-size: 50px;
        }
        #form{
            margin-left: 700px;
            margin-top: 60px;
            padding-right: 100px;
        }
        #masuk{
            display: flex;
            margin-left: 275px;
            margin-top: 50px;
            padding: 20px;
            padding-left: 50px;
            padding-right: 50px;
            font-size: 18px;
            font-weight: 500;
            
        }
        


    </style>
</head>
<body>
    <img src="/assets/logo.png" class="rounded float-start" id="logo">
    <h1 class="fw-bold text-center" id="judul">Absen Magang</h1>
    <div class="col-md-6" id="form">
        <input type="email" class="form-control form-control-lg" placeholder="masukkan email" id="email">
        <br>
        <input type="password" id="pass" class="form-control form-control-lg" placeholder="masukkan kata sandi">
        <br>
        <button type="button" class="btn btn-light" id="masuk">Masuk</button>
    </div>
</body>
</html>