<style>
    #masuk {
        background-color: #1D0CD1;
        color: white;
        width: 276px;
        height: 59px;
        font-size: 27px;
    }

    #judul {
        margin-top: 10px;
    }

    #Gform {
        margin-top: 3%;
    }
    #id_teachers{
        cursor: pointer;
    }
</style>
@extends('templateAdmin')

@section('admin')
<form action="{{ route('admin.tambah_siswa_proses') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1 class="fw-bold text-center" id="judul">Tambah data siswa</h1>
    <div class="container  d-flex justify-content-center align-items-center" id="Gform">
     <div class="col-md-6" id="form">
       <input type="text" id="nama" name="nama" placeholder="Nama Siswa" class="form-control form-control-lg" style="border-color: black;">
       @error('nama')
        <small>Nama harus diisi</small>
       @enderror
       <br>
       <input type="text" id="email" name="email" placeholder="Email Siswa" class="form-control form-control-lg" style="border-color: black;">
       @error('email')
        <small>Email sudah terpilih / gunakan @</small>
       @enderror
       <br>
       <input type="password" id="password" name="password" placeholder="Kata Sandi" class="form-control form-control-lg" style="border-color: black;">
       @error('password')
        <small>Kata sandi harus diisi dengan min. 5 karakter</small>
       @enderror
       <br>
       <select id="jenis_kelamin" name="jenis_kelamin" required class="form-control form-control-lg" style="border-color: black;">
         <option value="" disabled selected>Jenis Kelamin:</option>
         <option value="Laki-Laki">Laki-Laki</option>
         <option value="Perempuan">Perempuan</option>
       </select>
       @error('jenis_kelamin')
        <small>Pilih jenis kelamin</small>
       @enderror
       <br>
       <input type="text" id="asal_sekolah" name="asal_sekolah" placeholder="Asal Sekolah" class="form-control form-control-lg" style="border-color: black;">
       @error('asal_sekolah')
        <small>Asal sekolah harus diisi</small>
       @enderror
       <br>
       <select id="id_teachers" name="id_teachers" required class="form-control form-control-lg" style="border-color: black;">
         <option value="" disabled selected>Nama Pembimbing:</option>
         @foreach ($teachers as $teacher)
             <option value="{{ $teacher->id }}">{{ $teacher->nama }}</option>
         @endforeach
       </select>        
       @error('id_teachers')
        <small>Email Pembimbing harus diisi</small>
       @enderror
     </div>
     <div class="fixed-bottom d-flex justify-content-center" style="margin-bottom: 3%;">
            <button type="submit" class="btn btn-light fw-bold" id="masuk">Tambah</button>
     </div>
    </div>
</form>
@endsection