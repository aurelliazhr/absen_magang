<style>
    #btnM {
        width: 160px;
        height: 50px;
        background-color: #1D0CD1;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
    }
    #pfp {
        /* display: block; */
        max-width: 100%;
        height: auto;
        width: auto;
    }   
</style>
@extends('templateSiswa')

@section('siswa')
<h1 class="fw-bold text-center mt-5" id="judul">Profil siswa</h1>
<div class="container d-flex justify-content-center align-items-start gap-1 m-5">
 <div class="d-flex flex-column align-items-center mt-5">
   <img src="https://placehold.co/300x250" class="rounded float-start img-responsive" id="pfp" alt="sementara">
   <div class="d-flex justify-content-center align-items-start mt-3 gap-3">
     <a href="" class="btn btn-light" id="btnM">Simpan</a>
     <a href="" class="btn btn-light" id="btnM">Kembali</a>
   </div>
 </div>
 <div class="col-md-6 ms-5 mt-5">
    <input type="text" value="" class="form-control form-control-lg h-59" placeholder="Nama siswa" style="border-color: black;">
    <br>
    <input type="email" value="" class="form-control form-control-lg h-59" placeholder="siswa@gmail.com" style="border-color: black;">
    <br>
    <input type="password" value="" class="form-control form-control-lg h-59" placeholder="Masukkan kata sandi" style="border-color: black;">
    <br>
    <input type="text" value="" class="form-control form-control-lg h-59" placeholder="SMKN 2 Banjarmasin" style="border-color: black;">
    <br>
    <input type="text" value="" class="form-control form-control-lg h-59" placeholder="Nama pembimbing" style="border-color: black;">
 </div>
</div>
@endsection