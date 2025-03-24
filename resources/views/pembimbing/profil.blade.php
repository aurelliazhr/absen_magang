<style>
    #btnM {
        width: 50%;
        height: 8%;
        background-color: #1D0CD1;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
    }

    #btnS {
        width: 50%;
        height: 8%;
        background-color: #1D0CD1;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
    }
</style>
@extends('templateGuru')

@section('guru')
    <form action="{{ route('guru.profil_proses') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1 class="fw-bold text-center mt-5" id="judul">Profil guru pembimbing</h1>
        <div class="container-fluid d-flex justify-content-center mt-5">
            @if (isset($user->foto_profil))
                <img src="{{ asset('storage/profil-user/' . $user->foto_profil) }}"
                    class="img-thumbnail img-responsive rounded-circle" id="pfp" alt="Foto Profil" width="100">
            @else
                <img src="https://placehold.co/300x250" class="rounded float-start" id="logo" alt="sementara">
            @endif
            <div class="col-md-6 ms-4 mt-5">
                <input type="file" class="form-control form-control-lg h-59" placeholder="Nama Siswa" value=""
                    name="foto_profil" style="border-color: black;">
                <small>Upload foto profil baru jika ingin menggantinya</small>
                <br>
                <input type="text" class="form-control form-control-lg h-59 shadow-none" value="{{ $user->nama }}"
                    placeholder="Nama Pembimbing" style="border-color: black;" id="nama" name="nama" readonly>
                <br>
                <input type="email" class="form-control form-control-lg h-59 shadow-none" value="{{ $user->email }}"
                    placeholder="Email Pembimbing" style="border-color: black;" id="email" name="email" readonly>
                <br>
                <input type="password" value="" class="form-control form-control-lg h-59" placeholder="Kata Sandi"
                    name="password" style="border-color: black;" id="pass">
                <small>Ketik kata sandi baru jika ingin menggantinya</small>
                <br>
                <div class="container-md d-flex justify-content-between align-items-center text-center mt-1 gap-3">
                    <button type="submit" class="btn btn-light " id="btnS">Simpan</button>
                    <br>
                    <a href="{{ route('guru.home') }}" class="btn btn-light" id="btnM">Kembali</a>
                </div>
            </div>
        </div>
    </form>
@endsection
