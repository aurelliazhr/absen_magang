<style>
  #btnM{
    width: 300px;
    height: 50px;
    background-color: #1D0CD1;
    color: #FFFFFF;
    font-weight: bold;
    font-size: 20px;
    margin-top: 2%;
  }
  #Gform{
    margin-top: 4%;
  }
</style>
@extends('templateAdmin')

@section('admin')
<h1 class="fw-bold text-center mt-5" id="judul">Data pembimbing</h1>
<div class="container d-flex justify-content-center" id="Gform">
  <img src="https://placehold.co/300x250" class="rounded float-start" id="logo" alt="sementara" style="width: 300px;">
  <div class="col-md-6 ms-5 mt-5">
      <input type="text" class="form-control form-control-lg h-59" placeholder="Nama pembimbing" style="border-color: black;" id="nama">
      <br>
      <input type="email" class="form-control form-control-lg h-59" placeholder="pembimbing@gmail.com" style="border-color: black;" id="email">
      <br>
      <input type="password" class="form-control form-control-lg h-59" placeholder="masukkan kata sandi" style="border-color: black;" id="pass">
      <br>
      <div class="position-relative text-center" style="width: 350px;">
       <button type="button" class="btn btn-light position-absolute pull-right" id="btnM">Kembali</button>
      </div>
  </div>
</div>
@endsection