<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <style>
        h1 {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            width: 100%;
            background-color: white;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            font-family: sans-serif;
        }
        th {
            background-color: #51b3f5;
        }
        img{
            width: 5%;
            height: auto;
            object-fit: contain;
            margin: 0;
            padding: 0;
            margin-right: 3%;
            
        }
        h1{
            margin: 0;
            font-size: 25px;
            display: flex;
            align-items: center;
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <div class="judul" style="display: flex; justify-content: center; align-items: center;">
        <h1><img src="assets/Logo.png" alt="logo" style="margin-top: 5px;">Jurnal Magang Siswa</h1>
    </div>
    <hr>

    <div class="table-responsive container-md mt-5 d-flex justify-content-center align-items-center">
        <table class="table text-center">
            <thead class="kolom">
                <tr>
                    <th>Tanggal</th>
                    <th>Isi Kegiatan</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @if (isset($absents) && $absents->count())
                    @foreach ($absents as $a)
                        @if ($a->kategori === 'pulang' && $a->id_users === auth()->id())
                            <tr>
                                <td>{{ $a->updated_at->format('d-m-Y') }}</td>
                                <td>{{ $a->keterangan }}</td>
                            </tr>
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">Belum Ada Isi Jurnal</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>
