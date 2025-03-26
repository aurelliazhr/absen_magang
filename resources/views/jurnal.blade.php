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
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Jurnal Magang - {{ $user->nama }}</h1>
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
