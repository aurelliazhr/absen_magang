<style>
    #masuk {
        background-color: #1D0CD1;
        color: white;
        width: 70%;
        height: 59px;
        font-size: 27px;
    }

    #judul {
        margin-top: 5%;
    }

    #Gform {
        margin-top: 5%;
    }
</style>
@extends('templateAdmin')

@section('admin')
    <form action="{{ route('admin.tambah_guru_proses') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="fw-bold text-center" id="judul">Tambah data pembimbing</h1>
        <div class="container  d-flex justify-content-center align-items-center" id="Gform">
            <div class="col-md-6" id="form">
                <input type="text" id="nama" name="nama" placeholder="Nama Pembimbing"
                    class="form-control form-control-lg" style="border-color: black;">
                @error('nama')
                    <small>Nama harus diisi</small>
                @enderror
                <br>

                <input type="email" id="email" name="email" placeholder="Email Pembimbing"
                    class="form-control form-control-lg" style="border-color: black;">
                @error('email')
                    <small>Email sudah terpilih / gunakan @</small>
                @enderror
                <br>

                <input type="password" id="password" name="password" placeholder="Kata Sandi"
                    class="form-control form-control-lg" placeholder="masukkan kata sandi" style="border-color: black;">
                @error('password')
                    <small>Kata sandi harus diisi dengan min. 5 karakter</small>
                @enderror
                <br>

                <input type="text" id="posisi" name="posisi" placeholder="Posisi Pembimbing"
                    class="form-control form-control-lg" style="border-color: black;">
                @error('posisi')
                    <small>Posisi harus diisi dengan max. 20 karakter</small>
                @enderror
                <br>

                <div class="container-md text-center d-flex justify-content-center">
                 <div class="col-md d-flex justify-content-center">
                  <button type="submit" class="btn btn-light fw-bold" id="masuk">Tambah</button>
                 </div>
                </div>
            </div>
        </div>
    @endsection
