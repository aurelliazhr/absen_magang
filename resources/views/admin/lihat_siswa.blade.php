@extends('templateAdmin')

@section('admin')
<h1 class="fw-bold text-center mt-3" id="judul">Data siswa</h1>
<div class="container m-5 d-flex justify-content-center">
  <img src="https://placehold.co/300x250" class="rounded float-start" id="logo" alt="sementara">
  <div class="col-md-6 ms-5 mt-5">
      <input type="text" class="form-control form-control-lg h-59" placeholder="Nama siswa" style="border-color: black;">
      <br>
      <input type="email" class="form-control form-control-lg h-59" placeholder="siswa@gmail.com" style="border-color: black;">
      <br>
      <input type="password" class="form-control form-control-lg h-59" placeholder="masukkan kata sandi" style="border-color: black;">
      <br>
      <input type="text" class="form-control form-control-lg h-59" placeholder="SMKN 2 Banjarmasin" style="border-color: black;">
      <br>
      <button type="button" class="btn btn-light" id="masuk">Kembali</button>
  </div>
</div>
@endsection