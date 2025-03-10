<style>
    #edit {
        background-color: #1D0CD1;
        color: white;
        width: 276px;
        height: 59px;
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
        <h1 class="fw-bold text-center mt-5">Edit Data Pembimbing</h1>
        <div class="container d-flex justify-content-center align-items-center" id="Pform">
            <div class="col-md-6" id="form">
                <input type="text" class="form-control form-control-lg" placeholder="Nama Pembimbing" id="nama"
                    style="border-color: black;" value="{{ old('nama', $teacher->nama) }}" name="nama">
                <br>
                <input type="email" class="form-control form-control-lg" placeholder="Email Pembimbing"
                    style="border-color: black;" value="{{ old('email', $teacher->email) }}" name="email">
                <br>
                <input type="password" class="form-control form-control-lg" placeholder="Kata Sandi Baru"
                    style="border-color: black;" name="password">
                <small>Ketik kata sandi baru jika ingin menggantinya</small>
                <br>
            </div>
            <div class="fixed-bottom d-flex justify-content-center" style="margin-bottom: 10%;">
                <button type="submit" class="btn btn-light fw-bold" id="edit">Edit</button>
            </div>
        </div>
    </form>
@endsection
