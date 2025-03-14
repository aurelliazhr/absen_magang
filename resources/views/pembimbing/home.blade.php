<style>
    #btn1{
        height: 80%;
        width: 100%;
        font-weight: bold;
        font-size: 28px;
    }
    #btn2{
        height: 80%;
        width: 100%;
        font-weight: bold;
        font-size: 28px;
    }
</style>
@extends('templateGuru')

@section('guru')

<div class="container-fluid px-4 d-flex justify-content-center" id="container1" style="text-align:center;">
    <div class="col-md d-flex gap-5">
        <a href="#" class="btn btn-success mt-4 text-nowrap" id="btn1" ><i class="bi bi-download"></i> Rekap absen</a>
        <a href="#" class="btn btn-success mt-4 text-nowrap" id="btn2" ><i class="bi bi-download"></i> Rekap tugas</a>
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