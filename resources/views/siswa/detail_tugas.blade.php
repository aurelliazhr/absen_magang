<style>
    #back {
        background-color: #1D0CD1;
        color: white;
        width: 276px;
        height: 59px;
        font-size: 27px;
    }

    #Pform {
        margin-top: 5%;
    }
</style>
@extends('templateSiswa')

@section('siswa')
    <h1 class="fw-bold text-center mt-5">Detail tugas</h1>
    <div class="container-md d-flex justify-content-center align-items-center" id="Pform">
        <div class="col-md-6">
            <input type="text" class="form-control form-control-lg" placeholder="Judul Tugas" value="{{ $tugas->judul }}"
                style="border: 3px solid black;">
            <br>
            <textarea class="form-control form-control-lg" placeholder="Deskripsi Tugas" value="{{ $tugas->deskripsi }}"
                style="border: 3px solid black;">{{ $tugas->deskripsi }}</textarea>
            <br>
            <div>
            @if (!empty($tugas->file))
                <a class="form-control form-control-lg" href="{{ route('siswa.lihat_file', ['file' => $tugas->file]) }}" target="_blank"
                    rel="noopener noreferrer" style="border: 3px solid black">
                    {{ $tugas->file }}
                </a>
            @else
                <input class="form-control form-control-lg" type="text" placeholder="Tidak Ada File Tugas" readonly style="border: 3px solid black">
            @endif
            </div>
            <br>
            <input type="text" class="form-control form-control-lg"
                value="{{ \Carbon\Carbon::parse($tugas->batas_pengumpulan)->format('d M Y H:i') }}"
                placeholder="Batas Pengumpulan" style="border: 3px solid black;" readonly>
            <br>
            <div class="container-md d-flex justify-content-center">
                <a href="{{ route('siswa.tugas') }}" type="button" class="btn btn-light fw-bold" id="back">Kembali</a>
            </div>
        </div>
    </div>
@endsection
