<style>
    #Absen{
        background-color: #1D0CD1;
        color: white;
        width: 100%;
        height: 80%;
        font-size: 50px;
        margin-bottom: 10%;
    }
    #Tugas{
        background-color: #1D0CD1;
        color: white;
        width: 100%;
        height: 80%;
        font-size: 50px;
    }
</style>
@extends('templateAdmin')

@section('admin')
<div class="container-fluid d-flex text-center justify-content-center mt-5" id="Iform">
    <div class="col-md-6 mt-4">
        <button class="btn btn-light fw-bold btn-lg" id="Absen"><a href="#" class="active" style="color: #FFFFFF"><i class="bi bi-download"></i></a> Rekap absen</button>
        <br>
        <button class="btn btn-light fw-bold btn-lg" id="Tugas"><a href="#" class="active" style="color: #FFFFFF"><i class="bi bi-download"></i></a> Rekap tugas</button>
    </div>
</div>
@endsection