<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Foto Profil: {{ $user->foto_profil }}</p>
    <p>Nama: {{ $user->nama }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Asal Sekolah: {{ $user->asal_sekolah }}</p>

    <a href="{{ route('guru.home') }}">Kembali</a>
</body>
</html>