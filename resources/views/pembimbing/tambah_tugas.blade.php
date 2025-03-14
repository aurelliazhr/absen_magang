<style>
    #masuk {
        background-color: #1D0CD1;
        color: white;
        width: 276px;
        height: 59px;
        font-size: 27px;
    }

    #judul {
        margin-top: 3%;
    }

    #Gform {
        margin-top: 2%;
    }
</style>
@extends('templateGuru')

@section('guru')
    <form action="{{ route('guru.tambah_tugas_proses') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="fw-bold text-center" id="judul">Tambah Tugas</h1>
        <div class="container  d-flex justify-content-center align-items-center" id="Gform">
            <div class="col-md-6" id="form">
                {{-- <input type="text" id="id_teachers" name="id_teachers" placeholder="ID Teachers"
                    class="form-control form-control-lg" style="border-color: black;">
                @error('judul')
                    <small>Judul tugas harus diisi</small>
                @enderror
                <br> --}}

                <input type="text" id="judul" name="judul" placeholder="Judul Tugas"
                    class="form-control form-control-lg" style="border-color: black;">
                @error('judul')
                    <small>Judul tugas harus diisi</small>
                @enderror
                <br>

                <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi Tugas" class="form-control form-control-lg" style="border-color: black;"></textarea>
                @error('deskripsi')
                    <small>Deskripsi tugas harus diisi</small>
                @enderror
                <br>
                <input type="file" id="file" name="file" placeholder="File Tugas"
                    class="form-control form-control-lg" style="border-color: black;">
                <br>
                <input type="datetime-local" id="batas_pengumpulan" name="batas_pengumpulan" placeholder="Batas Pengumpulan Tugas"
                    class="form-control form-control-lg" style="border-color: black;">
                @error('batas_pengumpulan')
                    <small>Batas Pengumpulan tugas harus diisi</small>
                @enderror
                <br>
                <div class="container-md d-flex justify-content-center">
                 <button type="submit" class="btn btn-light fw-bold" id="masuk">Tambah</button>
                </div>
            </div>
        </div>
    @endsection
