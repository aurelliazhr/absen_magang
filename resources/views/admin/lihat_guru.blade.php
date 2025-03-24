<style>
  #btnM{
    width: 50%;
    height: 90%;
    background-color: #1D0CD1;
    color: #FFFFFF;
    font-weight: bold;
    font-size: 20px;
    margin-top: 2%;
  }
  #Gform{
    margin-top: 5%;
  }
</style>
@extends('templateAdmin')

@section('admin')
<h1 class="fw-bold text-center mt-5" id="judul">Data pembimbing</h1>
<div class="container d-flex justify-content-center" id="Gform">
  <img src="https://placehold.co/300x250" class="rounded float-start" id="logo" alt="sementara" style="width: 300px;">
  <div class="col-md-6 ms-3 mt-5">
      <input type="text" class="form-control form-control-lg h-59 shadow-none" value="{{ $teacher->nama }}" placeholder="Nama Pembimbing" style="border-color: black;" id="nama" readonly>
      <br>
      <input type="email" class="form-control form-control-lg h-59 shadow-none" value="{{ $teacher->email }}" placeholder="Email Pembimbing" style="border-color: black;" id="email" readonly>
      <br>
      <div class="container-fluid d-flex text-center justify-content-center">
       <div class="col-md text-center justify-content-center">
         <a href="{{route ('admin.data_guru')}}" type="button" class="btn btn-light" id="btnM" >Kembali</a>
       </div>
      </div>
  </div>
</div>
@endsection