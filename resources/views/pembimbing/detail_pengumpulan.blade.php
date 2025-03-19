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
            <input type="file" class="form-control form-control-lg" style="border-color: black;">
            <br>
            <input type="text" class="form-control form-control-lg" value="{{ $tugas->updated_at }}" readonly
                placeholder="Pengumpulan Tanggal" style="border-color: black;">
            <br>

            <form action="{{ route('guru.nilai') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <textarea class="form-control form-control-lg" value="{{ $tugas->score->catatan ?? 'Catatan' }}" name="catatan"
                    placeholder="Catatan" style="border-color: black;"></textarea>
                <br>
                <input type="text" class="form-control form-control-lg" name="nilai" min="0" max="100"
                    value="{{ old('nilai', $tugas->score->nilai ?? '') }}" placeholder="Nilai" style="border-color: black;">
                <br>
                <div class="container-md d-flex justify-content-between align-items-center text-center gap-4"
                    style="margin-bottom: 2%;" id="Bform">
                    <button type="submit" class="btn btn-light fw-bold" id="simpan">Simpan</button>
                    <a href="{{ route('guru.pengumpulan', $tugas->id) }}" type="button" class="btn btn-light fw-bold"
                        id="back">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
