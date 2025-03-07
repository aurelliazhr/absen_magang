<style>
    #masuk{
        background-color: #1D0CD1;
        color: white;
        width: 276px;
        height: 59px;
        font-size: 27px;
    }
    #judul{
        margin-top: 5%;
    }
    #Gform{
        margin-top: 5%;
    }
</style>
@extends('templateAdmin')

@section('admin')
<h1 class="fw-bold text-center" id="judul">Tambah data pembimbing</h1>
<div class="container  d-flex justify-content-center align-items-center" id="Gform">
<div class="col-md-6" id="form">
    <input type="text" class="form-control form-control-lg" placeholder="Nama pembimbing" id="email" style="border-color: black;">
    <br>
    <input type="email" class="form-control form-control-lg" placeholder="guru@gmail.com" style="border-color: black;">
    <br>
    <input type="password" class="form-control form-control-lg" placeholder="masukkan kata sandi" style="border-color: black;">
    <br>
</div>
<div class="fixed-bottom d-flex justify-content-center" style="margin-bottom: 10%;">
    <button type="button" class="btn btn-light fw-bold" id="masuk">Tambah</button>
</div>
</div>
@endsection