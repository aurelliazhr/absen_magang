<style>
    #edit {
        background-color: #1D0CD1;
        color: white;
        width: 70%;
        height: 100%;
        font-size: 27px;
    }

    #Pform {
        margin-top: 6%;
    }
</style>
@extends('templateAdmin')

@section('admin')
    <form action="{{ route('admin.edit_guru_proses', ['id' => $teacher->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1 class="fw-bold text-center mt-5">Edit data pembimbing</h1>
        <div class="container d-flex justify-content-center align-items-center" id="Pform">
            <div class="col-md-6" id="form">
                <input type="text" value="{{ old('nama', $teacher->nama) }}" required name="nama" class="form-control form-control-lg"
                    placeholder="Nama pembimbing" id="nama" style="border-color: black;">
                <br>
                <input type="text" value="{{ old('email', $teacher->email) }}" required name="email" class="form-control form-control-lg"
                    placeholder="Email Pembimbing" style="border-color: black;">
                <br>
                <input type="password" class="form-control form-control-lg" name="password" placeholder="Kata Sandi Baru"
                    style="border-color: black;">
                <small>Ketik kata sandi baru jika ingin menggantinya</small>
                <br>
               <div class="container d-flex text-center justify-content-center mt-5">
               <div class="col-md d-flex justify-content-center">
                 <button type="submit" class="btn btn-light fw-bold" id="edit">Edit</button>
               </div>            
               </div>
            </div>
        </div>
    @endsection
