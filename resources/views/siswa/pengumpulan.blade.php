<style>
    #submit {
        background-color: #1D0CD1;
        color: white;
        width: 276px;
        height: 59px;
        font-size: 27px;
    }

    #Pform {
        margin-top: 10%;
    }
</style>
@extends('templateSiswa')

@section('siswa')
    <form action="{{ route('siswa.pengumpulan_proses') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1 class="fw-bold text-center mt-5">Pengumpulan tugas</h1>
        <div class="container d-flex justify-content-center align-items-center" id="Pform">
            <div class="col-md-6">
                <input type="hidden" name="id_tasks" value="{{ $tugas->id }}">
                <input type="text" class="form-control form-control-lg" placeholder="Judul Tugas"
                    style="border: 3px solid black;" name="judul">
                <br>
                <label for="file">File Tugas:</label>
                <input type="file" class="form-control form-control-lg" 
                    style="border: 3px solid black;" name="file">
                <br>
            </div>
            <div class="fixed-bottom d-flex justify-content-center" style="margin-bottom: 10%;">
                <button type="submit" class="btn btn-light fw-bold" id="submit">Kumpul</button>
            </div>
        </div>
    @endsection
