@extends('templateGuru')

@section('guru')

<div class="container-fluid px-4 d-flex justify-content-center" id="container1" style="text-align:center;">
    <div class="row text-center d-flex">
        <div class="col">
            <a href="#" class="btn btn-success mt-4 text-nowrap" style="--bs-btn-padding-y: 20px; --bs-btn-padding-x: 250px; --bs-btn-font-size: 30px;"><i class="bi bi-download"></i> Rekap absen</a>
        </div>
        <div class="col">
            <a href="#" class="btn btn-success mt-4 text-nowrap" style="--bs-btn-padding-y: 20px; --bs-btn-padding-x: 250px; --bs-btn-font-size: 30px;"><i class="bi bi-download"></i> Rekap tugas</a>
        </div>
    </div>
</div>
    
    <h5 class="fw-bold text-start mt-5 ms-5">Siswa bimbingan</h1>
    <div class="table-responsive container mt-5 d-flex justify-content-center">
        <table class="table text-center">
            <tbody>
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
            </tbody>
        </table>
    </div>

@endsection