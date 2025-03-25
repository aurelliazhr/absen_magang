<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Jurnal Magang Siswa</h1>
    <hr>
    
    <table class="table text-center">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Isi Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($absents) && $absents->count())
                @foreach ($absents as $a)
                @if ($a->kategori === 'pulang' && $a->id_users === auth()->id())
                        <tr>
                            <td>{{ $a->updated_at->format('d-m-Y')  }}</td>
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
</body>

</html>
