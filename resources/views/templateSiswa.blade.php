<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #1D0CD1">
        <div class="container-fluid">
            <ul class="nav justify-content-start">
                <a href="#" class="navbar-brand" style="cursor: default;">
                    <img src="../assets/Logo.png" alt="Logo" width="30" height="24"
                        class="d-inline-block align-text-top">
                </a>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('siswa.home') }}" style="color: white;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('siswa.profil', ['id' => $user->id]) }}"
                        style="color: white;">Profil</a>
                </li>
                <li class="nav-item">
                    @if ($user->absen_datang == 0)
                        <a class="nav-link active" style="color: white">Tugas</a>
                    @else
                        <a class="nav-link active" href="{{ route('siswa.tugas') }}" style="color: white;">Tugas</a>
                    @endif
                </li>
            </ul>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('logout') }}" style="color: white;">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        @yield('siswa')
    </div>
</body>

</html>
