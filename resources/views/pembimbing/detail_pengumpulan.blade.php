<style>
    #simpan {
        background-color: #1D0CD1;
        color: white;
        width: 15%;
        height: 59px;
        font-size: 27px;
    }
    #back{
        background-color: #1D0CD1;
        color: white;
        width: 15%;
        height: 59px;
        font-size: 27px;
    }

    #Pform {
        margin-top: 2%;
        padding-left: 10%;
        padding-right: 10%;
    }
    /* #Bform{
        margin-top: 90%;
    } */
</style>
@extends('templateGuru')

@section('guru')
<h1 class="fw-bold text-center mt-3">Detail tugas</h1>
<div class="container d-flex justify-content-center align-items-center" id="Pform">
<div class="col-md-6" id="form">
    <input type="text" class="form-control form-control-lg" placeholder="Nama siswa" id="nama" style="border-color: black;">
    <br>
    <input type="text" class="form-control form-control-lg" placeholder="judul/deskripsi tugas" style="border-color: black;">
    <br>
    <input type="file" class="form-control form-control-lg" style="border-color: black;">
    <br>
    <input type="text" class="form-control form-control-lg" placeholder="tenggat tgl" style="border-color: black;">
    <br>
    <textarea name="note" class="form-control form-control-lg" placeholder="Catatan guru" style="border-color: black;"></textarea>
    <br>
    <input type="text" class="form-control form-control-lg" placeholder="Nilai" style="border-color: black;">
    <br>
</div>
<div class="fixed-bottom d-flex justify-content-center gap-4" style="margin-bottom: 2%;" id="Bform">
    <a href="#" type="button" class="btn btn-light fw-bold" id="simpan">Simpan</a>
    <a href="#" type="button" class="btn btn-light fw-bold" id="back">Kembali</a>
</div>
</div>
@endsection