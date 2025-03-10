@extends('templateGuru')

@section('guru')


    @forelse ($users as $u)
        <tr>
            <td>{{ $u->nama }}</td>
            <td>
                <a href="{{ route('guru.lihat_siswa', ['id' => $u->id]) }}" class="active"
                    style="color: #231F20">
                    <i class="bi bi-info-circle fs-4"></i>
                </a>
            </td>
        </tr>
    @empty
        <div class="alert alert-danger">
            Data Siswa Belum Tersedia
        </div>
    @endforelse

@endsection