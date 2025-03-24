<style>
    #btnM {
        width: 100%;
        height: 8%;
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
    <h1 class="fw-bold text-center mt-5" id="judul">Detail Tugas</h1>
    <div class="container-fluid d-flex justify-content-center">
        <div class="col-md-6 mt-5">
            <input type="text" value="{{ $task->judul }}" class="form-control form-control-lg h-59 shadow-none"
                placeholder="Judul Tugas" style="border-color: black;" readonly>
            <br>
            <textarea class="form-control form-control-lg h-59 shadow-none" placeholder="Deskripsi Tugas" style="border-color: black;" readonly>{{ $task->deskripsi }}</textarea>
            <br>
            <div>
            @if (!empty($task->file))
                <a class="form-control form-control-lg shadow-none" href="{{ route('guru.lihat_file', ['file' => $task->file]) }}" target="_blank" rel="noopener noreferrer" style="border: 3px solid black">
                    {{ $task->file }}
                </a>
            @else
                <input class="form-control form-control-lg shadow-none" type="text" placeholder="Tidak Ada File Tugas" readonly style="border: 3px solid black">
            @endif
            </div>
            <br>
            <input type="text" value="{{ $task->batas_pengumpulan }}" class="form-control form-control-lg h-59 shadow-none"
                placeholder="Batas Pengumpulan" style="border-color: black;" readonly>
            <br>
            <div class="container-md d-flex justify-content-between align-items-center text-center " style="width: 350px;">
                <a href="{{ route('guru.tugas') }}" class="btn btn-light" id="btnM">Kembali</a>
            </div>
        </div>
    </div>
@endsection
