<style>
  #btnM{
    width: 300px;
    height: 50px;
    background-color: #1D0CD1;
    color: #FFFFFF;
    font-weight: bold;
    font-size: 20px;
  }
  /* #nama{
    
  } */
</style>
@extends('templateAdmin')

@section('admin')
<<<<<<< HEAD
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
                placeholder="SMKN 2 Banjarmasin" style="border-color: black;" readonly>
            <br>
                <input type="text" value="{{ $user->teacher ? $user->teacher->nama : '' }}"
                    class="form-control form-control-lg h-59" style="border-color: black;" readonly>
                <br>
            <button type="button" class="btn btn-light" id="masuk">Kembali</button>
        </div>
    </div>
@endsection
=======
<h1 class="fw-bold text-center mt-3" id="judul">Data siswa</h1>
<div class="container m-5 d-flex justify-content-center">
  <img src="https://placehold.co/300x250" class="rounded float-start" id="logo" alt="sementara" style="width: 300px;">
  <div class="col-md-6 ms-5 mt-5">
      <input type="text" class="form-control form-control-lg h-59" placeholder="Nama siswa" style="border-color: black;" id="nama">
      <br>
      <input type="email" class="form-control form-control-lg h-59" placeholder="siswa@gmail.com" style="border-color: black;" id="email">
      <br>
      <input type="password" class="form-control form-control-lg h-59" placeholder="masukkan kata sandi" style="border-color: black;" id="pass">
      <br>
      <input type="text" class="form-control form-control-lg h-59" placeholder="SMKN 2 Banjarmasin" style="border-color: black;" id="asal">
      <br>
      <div class="position-relative text-center" style="width: 350px;">
       <button type="button" class="btn btn-light position-absolute pull-right" id="btnM">Kembali</button>
      </div>
  </div>
</div>
@endsection
>>>>>>> 529d651b4976617793b50e5869830c187af01cb7
