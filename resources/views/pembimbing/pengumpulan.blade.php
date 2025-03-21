<style>
    /* #Tform{
        margin-top: 10%;
    } */
    #nama {
        cursor: default;
    }

    #kotak {
        color: red;
    }
</style>
@extends('templateGuru')

@section('guru')
    <div class="container-md">
        <h4 class="fw-bold text-start mt-3"><i class="bi bi-square-fill fs-5" id="kotak"></i> Pengumpulan Tugas</h4>
        <div class="table-responsive container mt-5 d-flex justify-content-center" id="Tform">
            <table class="table text-start">
                <tbody>
                    @foreach ($tugas as $t)
                        <tr class="table-group-divider">
                            <td id="nama">
                                <h5 style="margin-right: -50px;">{{ $t->user->nama }}</h5>
                            </td>
                            <td>
                                <a href="{{ route('guru.detail_pengumpulan', $t->id) }}">
                                    <i class="bi bi-pencil-square fs-3"></i>
                                </a>
                            </td>
                            <td id="status">
                                <h5>{{ $t->score->nilai ?? 'Belum Dinilai' }}</h5>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
