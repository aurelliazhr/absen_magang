<style>
    #btnM {
        width: 15%;
        height: 50px;
        background-color: #1D0CD1;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
    }
    #btnS{
        width: 15%;
        height: 50px;
        background-color: #1D0CD1;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
    }
</style>
@extends('templateGuru')

@section('guru')
<h1 class="fw-bold text-center mt-3" id="judul">Profil guru pembimbing</h1>
<div class="container m-5 d-flex justify-content-center">
    <img src="https://placehold.co/300x250" class="rounded float-start" id="logo" alt="sementara">
   <div class="col-md-6 ms-5 mt-5">
     <input type="text" value="" class="form-control form-control-lg h-59"
        placeholder="Nama pembimbing" style="border-color: black;" readonly>
     <br>
     <input type="text" value="" class="form-control form-control-lg h-59"
         placeholder="Email" style="border-color: black;" readonly>
     <br>
     <input type="password" value="" class="form-control form-control-lg h-59"
           placeholder="masukkan kata sandi" style="border-color: black;" readonly>
     <br>
     <div class="d-flex justify-content-center align-items-center text-center gap-5 mt-5">
       <div class="d-flex justify-content-end align-items-center text-center">
         <a href="#" class="btn btn-light position-absolute " id="btnS">Simpan</a>
       </div>
       <div class="d-flex justify-content-start align-items-center text-center">
         <a href="#" class="btn btn-light position-absolute pull-right" id="btnM">Kembali</a>
       </div>
     </div>  
</div>
   </div> 
</div>
@endsection