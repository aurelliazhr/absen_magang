<style>
    #simpan {
        background-color: #1D0CD1;
        color: white;
        width: 50%;
        height: 8%;
        font-size: 27px;
    }

    #back {
        background-color: #1D0CD1;
        color: white;
        width: 50%;
        height: 8%;
        font-size: 27px;
    }

    #Pform {
        margin-top: 2%;
        padding-left: 10%;
        padding-right: 10%;
    }

    /* #Bform{
        margin-top: 90%;
    } */
</style>
@extends('templateGuru')

@section('guru')
    <h1 class="fw-bold text-center mt-3">Detail tugas</h1>
    <div class="container-fluid d-flex justify-content-center align-items-center" id="Pform">
        <div class="col-md-6" id="form">
            <input type="text" class="form-control form-control-lg" value="{{ $tugas->user->nama }}" readonly
                placeholder="Nama Siswa" id="nama" style="border-color: black;">
            <br>
            <input type="text" class="form-control form-control-lg" value="{{ $tugas->judul }}" readonly
                placeholder="Judul Tugas" style="border-color: black;">
            <br>
            @if (!empty($tugas->file))
                <a class="form-control form-control-lg shadow-none"
                    href="{{ route('guru.lihat_file', ['file' => $tugas->file]) }}" target="_blank"
                    rel="noopener noreferrer" style="border: 3px solid black">
                    {{ $tugas->file }}
                </a>
            @else
                <input class="form-control form-control-lg shadow-none" type="text" placeholder="Tidak Ada File Tugas"
                    readonly style="border: 3px solid black">
            @endif
            <br>
            <input type="text" class="form-control form-control-lg" value="{{ $tugas->updated_at }}" readonly
                placeholder="Pengumpulan Tanggal" style="border-color: black;">
            <br>

            <form action="{{ route('guru.nilai') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id_users" value="{{ $tugas->id_users }}">
                <input type="hidden" name="id_tasks" value="{{ $tugas->id_tasks }}">
                <input type="hidden" name="id_assignments" value="{{ $tugas->id }}">

                <textarea class="form-control form-control-lg" value="{{ $tugas->score->catatan ?? 'Catatan' }}" name="catatan"
                    placeholder="Catatan" style="border-color: black;">{{ $tugas->score->catatan ?? 'Catatan' }}</textarea>
                <br>
                <input type="text" class="form-control form-control-lg" name="nilai"
                    value="{{ old('nilai', $tugas->score->nilai ?? '') }}" placeholder="Nilai"
                    style="border-color: black;">
                <br>
                <div class="container-md d-flex justify-content-between align-items-center text-center gap-4"
                    style="margin-bottom: 2%;" id="Bform">
                    <button type="submit" class="btn btn-light fw-bold" id="simpan">Simpan</button>
                    <a href="{{ route('guru.tugas') }}" type="button" class="btn btn-light fw-bold"
                        id="back">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
