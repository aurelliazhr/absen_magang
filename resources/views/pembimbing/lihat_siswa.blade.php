<style>
    #btnM {
        width: 80%;
        height: 50px;
        background-color: #1D0CD1;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
    }
</style>
@extends('templateGuru')

@section('guru')
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
          placeholder="nama sekolah" style="border-color: black;" readonly>
     <br>
     <div class="position-relative text-center" style="width: 58%;">
       <a href="{{ route('guru.home') }}" class="btn btn-light position-absolute pull-right" id="btnM">Kembali</a>
      </div>
   </div> 
</div>
@endsection