<style>
    #masuk{
        background-color: #1D0CD1;
        color: white;
        width: 276px;
        height: 59px;
        font-size: 27px;
    }
</style>
@extends('templateAdmin')

@section('admin')
<h1 class="fw-bold text-center mt-4">Edit data siswa</h1>
<div class="container  d-flex justify-content-center mt-5 align-items-center">
<div class="col-md-6" id="form">
    <input type="text" class="form-control form-control-lg" placeholder="Nama siswa" id="email" style="border-color: black;">
    <br>
    <input type="email" class="form-control form-control-lg" placeholder="siswa@gmail.com" style="border-color: black;">
    <br>
    <input type="password" class="form-control form-control-lg" placeholder="masukkan kata sandi" style="border-color: black;">
    <br>
    <input type="text" class="form-control form-control-lg" placeholder="SMKN 2 Banjarmasin" style="border-color: black;">
    <br>
</div>
<div class="fixed-bottom d-flex justify-content-center" style="margin-bottom: 10%;">
    <button type="button" class="btn btn-light fw-bold" id="masuk">Edit</button>
</div>
</div>
@endsection