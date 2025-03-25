<style>
    #btnM {
        width: 50%;
        height: 90%;
        background-color: #1D0CD1;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
        margin-top: 2%;
    }

    #Gform {
        margin-top: 5%;
    }
    #pfp{
        width: 330px; /* Atur ukuran bingkai */
        height: 330px; /* Atur ukuran bingkai */
        object-fit: inherit; 
        border-radius: 50%; /* Membuat foto bulat */
        border: 4px solid #000; 
    }
    #pfp2{
        width: 330px; /* Atur ukuran bingkai */
        height: 330px; /* Atur ukuran bingkai */
        object-fit: cover; 
        border-radius: 50%; /* Membuat foto bulat */
        border: 4px solid #000; 
    }
</style>
@extends('templateAdmin')

@section('admin')
    <h1 class="fw-bold text-center mt-5" id="judul">Data pembimbing</h1>
    <div class="container d-flex justify-content-center" id="Gform">
        @if (isset($teacher->foto_profil))
            <img src="{{ asset('storage/profil-user/' . $teacher->foto_profil) }}"
                class="img-fluid profile-picture" id="pfp" alt="Foto Profil" width="100">
        @else
            <img src="https://www.gravatar.com/avatar/?d=mp&s=150" class="img-fluid rounded-circle" id="pfp2" alt="sementara">
        @endif
        <div class="col-md-6 ms-3 mt-5">
            <input type="text" class="form-control form-control-lg h-59 shadow-none" value="{{ $teacher->nama }}"
                placeholder="Nama Pembimbing" style="border-color: black;" id="nama" readonly>
            <br>
            <input type="email" class="form-control form-control-lg h-59 shadow-none" value="{{ $teacher->email }}"
                placeholder="Email Pembimbing" style="border-color: black;" id="email" readonly>
            <br>
            <div class="container-fluid d-flex text-center justify-content-center">
                <div class="col-md text-center justify-content-center">
                    <a href="{{ route('admin.data_guru') }}" type="button" class="btn btn-light"
                        id="btnM">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
