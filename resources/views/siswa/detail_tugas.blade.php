<style>
    #back {
        background-color: #1D0CD1;
        color: white;
        width: 276px;
        height: 59px;
        font-size: 27px;
    }

    #Pform {
        margin-top: 5%;
    }
</style>
@extends('templateSiswa')

@section('siswa')
<h1 class="fw-bold text-center mt-5">Detail tugas</h1>
<div class="container d-flex justify-content-center align-items-center" id="Pform">
    <div class="col-md-6">
        <input type="text" class="form-control form-control-lg" placeholder="Tugas 1" style="border: 3px solid black;">
        <br>
        <input type="text" class="form-control form-control-lg" placeholder="kerjakan Tugas 1!" style="border: 3px solid black;">
        <br>
        <input type="file" class="form-control form-control-lg" placeholder="Tugas 1.docx" style="border: 3px solid black;">
        <br>
        <input type="date" class="form-control form-control-lg" placeholder="Tugas 1" style="border: 3px solid black;">
        <br>
    </div>
    <div class="fixed-bottom d-flex justify-content-center" style="margin-bottom: 8%;">
        <a href="" type="button" class="btn btn-light fw-bold" id="back">Kembali</a>
    </div>
</div>

@endsection