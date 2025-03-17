<style>
    #Tform {
        margin-top: 10%;
    }

    #nama {
        cursor: default;
    }
</style>
@extends('templateSiswa')

@section('siswa')
    <div class="table-responsive container mt-5 d-flex justify-content-center" id="Tform">
        <table class="table text-center">
            <tbody>
                @foreach ($tugas as $t)
                    <tr class="table-group-divider">
                        <td>{{ $t->judul }}</td>
                        <td><a href="{{ route('siswa.detail_tugas', $t->id) }}" class="active" style="color: #231F20"><i
                                    class="bi bi-info-circle fs-4"></i></a></td>
                        <td><a href="{{ route('siswa.pengumpulan', ['id' => $t->id]) }}" class="active"
                                style="color: #231F20;"><i class="bi bi-file-earmark-check fs-4"></i></a></td>
                        <td><a href="{{ route('siswa.nilai', ['id' => $t->id]) }}" class="active" style="color: #FEFE12;"><i
                                    class="bi bi-star-fill fs-4"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
