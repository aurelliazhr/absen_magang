<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembimbing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    @forelse ($users as $u)
        <tr>
            <td>{{ $u->nama }}</td>
            <a href="/pembimbing/lihat_siswa"><i class="fa-solid fa-circle-info"></i></a>
        </tr>
    @empty
        <div class="alert alert-danger">
            Data Siswa Belum Tersedia
        </div>
    @endforelse
</body>

</html>
