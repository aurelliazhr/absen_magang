@extends('templateGuru')

@section('guru')    
    <h5 class="fw-bold text-start mt-3 ms-5">Siswa bimbingan</h1>
    <div class="table-responsive container mt-4 d-flex justify-content-center">
        <table class="table text-center">
            <tbody>
             @forelse ($users as $u)
             <tr>
               <td>{{ $u->nama }}</td>
               <td><a href="{{route('guru.jurnal', ['id' => $u->id])}}?export=pdf" class="active" style="color: #1D0CD1"><i class="bi bi-download fs-4"></i></a></td>
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
            </tbody>
        </table>
    </div>

@endsection