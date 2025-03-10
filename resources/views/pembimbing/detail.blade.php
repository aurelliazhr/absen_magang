<style>
    #btnM {
        width: 300px;
        height: 50px;
        background-color: #1D0CD1;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
    }

    /* #nama{
    
  } */
</style>
@extends('templateGuru')

@section('guru')
    <h1 class="fw-bold text-center mt-3" id="judul">Detail Tugas</h1>
    <div class="container m-5 d-flex justify-content-center">
        <img src="https://placehold.co/300x250" class="rounded float-start" id="logo" alt="sementara">
        <div class="col-md-6 ms-5 mt-5">
            <input type="text" value="{{ $task->judul }}" class="form-control form-control-lg h-59"
                placeholder="Judul Tugas" style="border-color: black;" readonly>
            <br>
            <textarea class="form-control form-control-lg h-59" placeholder="Deskripsi Tugas" style="border-color: black;" readonly>{{ $task->deskripsi }}</textarea>
            <br>
            <input type="text" value="{{ $task->file }}" class="form-control form-control-lg h-59"
                placeholder="File Tugas" style="border-color: black;" readonly>
            <br>
            <input type="text" value="{{ $task->batas_pengumpulan }}" class="form-control form-control-lg h-59"
                placeholder="Batas Pengumpulan" style="border-color: black;" readonly>
            <br>
            <div class="position-relative text-center" style="width: 350px;">
                <a href="{{ route('guru.tugas') }}" class="btn btn-light position-absolute pull-right"
                    id="btnM">Kembali</a>
            </div>
        </div>
    </div>
@endsection
