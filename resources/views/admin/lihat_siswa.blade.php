@extends('templateAdmin')

@section('admin')
    <h1 class="fw-bold text-center mt-3" id="judul">Data siswa</h1>
    <div class="container m-5 d-flex justify-content-center">
        <img src="https://placehold.co/300x250" class="rounded float-start" id="logo" alt="sementara">
        <div class="col-md-6 ms-5 mt-5">
            <input type="text" value="{{ $user->nama }}" class="form-control form-control-lg h-59"
                placeholder="Nama siswa" style="border-color: black;" readonly>
            <br>
            <input type="text" value="{{ $user->email }}" class="form-control form-control-lg h-59"
                placeholder="Email Siswa" style="border-color: black;" readonly>
            <br>
            <input type="text" value="{{ $user->jenis_kelamin }}" class="form-control form-control-lg h-59"
                placeholder="masukkan kata sandi" style="border-color: black;" readonly>
            <br>
            <input type="text" value="{{ $user->asal_sekolah }}" class="form-control form-control-lg h-59"
                placeholder="SMKN 2 Banjarmasin" style="border-color: black;" readonly>
            <br>
                <input type="text" value="{{ $user->teacher ? $user->teacher->nama : '' }}"
                    class="form-control form-control-lg h-59" style="border-color: black;" readonly>
                <br>
            <button type="button" class="btn btn-light" id="masuk">Kembali</button>
        </div>
    </div>
@endsection
