<style>
    #edit{
        background-color: #1D0CD1;
        color: white;
        width: 276px;
        height: 59px;
        font-size: 27px;
    }
    #Pform{
        margin-top: 6%;
    }
</style>
@extends('templateAdmin')

@section('admin')
<h1 class="fw-bold text-center mt-5">Edit data pembimbing</h1>
<div class="container d-flex justify-content-center align-items-center" id="Pform">
<div class="col-md-6" id="form">
    <input type="text" class="form-control form-control-lg" placeholder="Nama pembimbing" id="nama" style="border-color: black;">
    <br>
    <input type="email" class="form-control form-control-lg" placeholder="pembimbing@gmail.com" style="border-color: black;">
    <br>
    <input type="password" class="form-control form-control-lg" placeholder="masukkan kata sandi" style="border-color: black;">
    <br>
</div>
<div class="fixed-bottom d-flex justify-content-center" style="margin-bottom: 10%;">
    <button type="button" class="btn btn-light fw-bold" id="edit">Edit</button>
</div>
</div>
@endsection