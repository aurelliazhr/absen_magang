<style>
    #Absen{
        background-color: #1D0CD1;
        color: white;
        width: 588px;
        height: 173px;
        font-size: 50px;
        margin-bottom: 10%;
    }
    #Tugas{
        background-color: #1D0CD1;
        color: white;
        width: 588px;
        height: 173px;
        font-size: 50px;
    }
    #Iform{
        margin-top: 8%;
    }
</style>
@extends('templateAdmin')

@section('admin')
<div class="container d-flex justify-content-center align-items-center" id="Iform">
    <div class="col-md-6" style="align-items: center;">
        <button class="btn btn-light fw-bold btn-lg" id="Absen"><a href="#" class="active" style="color: #FFFFFF"><i class="bi bi-download"></i></a> Rekap absen</button>
        <br>
        <button class="btn btn-light fw-bold btn-lg" id="Tugas"><a href="#" class="active" style="color: #FFFFFF"><i class="bi bi-download"></i></a> Rekap tugas</button>
    </div>
</div>
@endsection