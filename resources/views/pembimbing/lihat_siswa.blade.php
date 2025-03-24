<style>
    #btnM {
        width: 80%;
        height: 50px;
        background-color: #1D0CD1;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
    }
    #pfp{
        max-width: 75%;
        height: auto;
        width: auto;
        border: 3px solid #000;
    }
</style>
@extends('templateGuru')

@section('guru')
    <h1 class="fw-bold text-center mt-3" id="judul">Data siswa</h1>
    <div class="container-md m-5 d-flex justify-content-center">
        <div class="col-md-4 text-center align-items-center mt-3">
        @if (isset($user->foto_profil))
            <img src="{{ asset('storage/profil-user/' . $user->foto_profil) }}" class="img-thumbnail img-responsive rounded-circle"
                id="pfp" alt="Foto Profil">
        @else
            <img src="https://placehold.co/300x250" class="img-thumbnail img-responsive rounded-circle" id="logo" alt="sementara">
        @endif
        </div>
        <div class="col-md-6 mt-5">
            <input type="text" value="{{ $user->nama }}" class="form-control form-control-lg h-59 shadow-none"
                placeholder="Nama siswa" style="border-color: black;" readonly>
            <br>
            <input type="text" value="{{ $user->email }}" class="form-control form-control-lg h-59 shadow-none"
                placeholder="Email Siswa" style="border-color: black;" readonly>
            <br>
            <input type="text" value="{{ $user->jenis_kelamin }}" class="form-control form-control-lg h-59 shadow-none"
                placeholder="masukkan kata sandi" style="border-color: black;" readonly>
            <br>
            <input type="text" value="{{ $user->asal_sekolah }}" class="form-control form-control-lg h-59 shadow-none"
                placeholder="nama sekolah" style="border-color: black;" readonly>
            <br>
            <div class="position-relative text-center" style="width: 58%;">
                <a href="{{ route('guru.home') }}" class="btn btn-light position-absolute pull-right"
                    id="btnM">Kembali</a>
            </div>
        </div>
    </div>
@endsection
