<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jurnal Magang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            font-family: sans-serif;
        }
        td{
            word-break: keep-all;
        }
        th {
            background-color: #51b3f5;
            color: black;
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
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <h1><img src="assets/Logo.png" alt="logo" style="margin-top: 5px;"> Jurnal Magang - {{ $user->nama }}</h1>
    <hr>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Lama Waktu</th>
                <th>Tugas / Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            @if ($absents->count())
                @foreach ($absents as $a)
                    <tr>
                        <td>{{ $a->updated_at->format('d M Y') }}</td>
                        <td>{{ ucfirst($a->status) }}</td>
                        <td>{{ $a->jam_masuk }}</td>
                        <td>{{ $a->jam_keluar }}</td>
                        <td>{{ $a->lama_waktu }}</td>
                        <td>{{ $a->ket }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">Belum Ada Isi Jurnal</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>

</html>
