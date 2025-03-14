<style>
    #btnM {
        width: 50%;
        height: 8%;
        background-color: #1D0CD1;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
    }
    #btnS{
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
<h1 class="fw-bold text-center mt-5" id="judul">Profil guru pembimbing</h1>
<div class="container-fluid d-flex justify-content-center mt-5">
    <img src="https://placehold.co/300x250" class="img-fluid rounded float-start" id="logo" alt="sementara">
   <div class="col-md-6 ms-4 mt-5">
     <input type="text" value="" class="form-control form-control-lg h-59"
        placeholder="Nama pembimbing" style="border-color: black;" id="nama">
     <br>
     <input type="email" value="" class="form-control form-control-lg h-59"
         placeholder="Email" style="border-color: black;" id="gmail">
     <br>
     <input type="password" value="" class="form-control form-control-lg h-59"
           placeholder="masukkan kata sandi" style="border-color: black;" id="pass">
     <br>
     <div class="container-md d-flex justify-content-between align-items-center text-center mt-1 gap-3">
       <button class="btn btn-light " id="btnS">Simpan</button>
       <br>
       <a href="#" class="btn btn-light" id="btnM">Kembali</a>
      </div>
   </div>
</div>
@endsection