<style>
    #back {
        background-color: #1D0CD1;
        color: white;
        width: 276px;
        height: 59px;
        font-size: 27px;
    }

    #Pform {
        margin-top: 3%;
    }
</style>
@extends('templateSiswa')

@section('siswa')
    <h1 class="fw-bold text-center mt-5">Nilai hasil tugas</h1>
    <div class="container-md d-flex justify-content-center align-items-center" id="Pform">
        <div class="col-md-6">
            <input type="text" value="{{ $scores->nilai ?? 'Belum Ada Nilai'}}" readonly placeholder="Nilai Akhir" class="form-control form-control-lg"
                id="nilai" style="border: 3px solid black;">
            <br>
            <textarea name="" id=""  readonly class="form-control form-control-lg"
                placeholder="Catatan Untuk Siswa" style="border: 3px solid black; height: 201px;">
            {{ $scores->catatan ?? 'Belum Ada Catatan'}}
        </textarea>
            <br>
            <div class="container-md d-flex justify-content-center">
             <a href="{{route('siswa.tugas')}}" type="button" class="btn btn-light fw-bold" id="back">Kembali</a>
            </div>
        </div>
    </div>
@endsection
