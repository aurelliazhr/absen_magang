<style>
    #btnM {
        width: 300px;
        height: 50px;
        background-color: #1D0CD1;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
    }

    #pfp {
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
    @media screen and (max-width : 776px){
        #pfp2{
            border: 4px solid #000;
            margin-right: 50px;
            width: 220px;
            height: 220px;
            margin-top: 20%;
        }
        #pfp{
            border: 4px solid #000;
            width: 360px;
            height: 250px;
            
        }
        #gambar{
            margin-right: 50px;
            margin-top: 20%;
        }
    }
    @media screen and (max-width : 876px){
        #pfp2{
            border: 4px solid #000;
            margin-right: 50px;
            width: 220px;
            height: 220px;
            margin-top: 20%;
        }
        #pfp{
            border: 4px solid #000;
            width: 360px;
            height: 250px;
            
        }
        #gambar{
            margin-right: 50px;
            margin-top: 20%;
        }
    }
</style>
@extends('templateAdmin')

@section('admin')
    <h1 class="fw-bold text-center mt-3" id="judul">Data siswa</h1>
    <div class="container-md m-5 d-flex justify-content-center">
        <div class="col-md-4 text-center align-items-center mt-5" id="gambar">
        @if (isset($user->foto_profil))
            <img src="{{ asset('storage/profil-user/' . $user->foto_profil) }}" class="img-fluid profile-picture mt-2"
                id="pfp" alt="Foto Profil" width="100">
        @else
            <img src="https://www.gravatar.com/avatar/?d=mp&s=150" class="img-fluid rounded-circle mt-2" id="pfp2" alt="sementara">
        @endif
        </div>
        {{-- <div class="container-fluid d-flex justify-content-center"> --}}
            <div class="col-md-6 mt-5">
                <input type="text" value="{{ $user->nama }}" class="form-control form-control-lg h-59 shadow-none"
                    placeholder="Nama siswa" style="border-color: black;" readonly>
                <br>
                <input type="text" value="{{ $user->email }}" class="form-control form-control-lg h-59 shadow-none"
                    placeholder="Email Siswa" style="border-color: black;" readonly>
                <br>
                <input type="text" value="{{ $user->jenis_kelamin }}" class="form-control form-control-lg h-59 shadow-none"
                    placeholder="masukkan kata sandi" style="border-color: black;" readonly>
                <br>
                <input type="text" value="{{ $user->asal_sekolah }}" class="form-control form-control-lg h-59 shadow-none"
                    placeholder="SMKN 2 Banjarmasin" style="border-color: black;" readonly>
                <br>
                <input type="text" value="{{ $user->teacher ? $user->teacher->nama : '' }}"
                    class="form-control form-control-lg h-59 shadow-none" style="border-color: black;" readonly>
                <br>
                <div class="col-md d-flex justify-content-center text-center" style="width: 100%;">
                    <a href="{{ route('admin.data_siswa') }}" class="btn btn-light"
                        id="btnM">Kembali</a>
                </div>
            </div>
        {{-- </div> --}}
    @endsection
