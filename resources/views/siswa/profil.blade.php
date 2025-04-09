<style>
    #btnM {
        width: 160px;
        height: 50px;
        background-color: #1D0CD1;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
    }

    #btnK {
        width: 160px;
        height: 50px;
        background-color: #1D0CD1;
        color: #FFFFFF;
        font-weight: bold;
        font-size: 20px;
    }

    #pfp {
        width: 330px;
        /* Atur ukuran bingkai */
        height: 330px;
        /* Atur ukuran bingkai */
        object-fit: inherit;
        border-radius: 50%;
        /* Membuat foto bulat */
        border: 4px solid #000;
    }

    #pfp2 {
        width: 330px;
        /* Atur ukuran bingkai */
        height: 330px;
        /* Atur ukuran bingkai */
        object-fit: cover;
        border-radius: 50%;
        /* Membuat foto bulat */
        border: 4px solid #000;
    }

    @media screen and (max-width : 776px) and (min-width : 680px) {
        #pfp {
            width: 100%;
            height: auto;
            object-fit: inherit;
            border-radius: 50%;
            border: 4px solid #000;
            margin-bottom: 50px;
        }

        #pfp2 {
            width: 100%;
            height: auto;
            object-fit: inherit;
            border-radius: 50%;
            border: 4px solid #000;
            margin-bottom: 50px;
        }

        #form {
            width: 45%;
            height: auto;
        }
    }

    @media screen and (max-width : 987px) {
        #pfp {
            width: 100%;
            height: auto;
            object-fit: inherit;
            border-radius: 50%;
            border: 4px solid #000;
            margin-bottom: 50px;
        }

        #pfp2 {
            width: 100%;
            height: auto;
            object-fit: inherit;
            border-radius: 50%;
            border: 4px solid #000;
            margin-bottom: 50px;
        }

        #form {
            width: 45%;
            height: auto;
        }
    }
</style>
@extends('templateSiswa')

@section('siswa')
    <form action="{{ route('siswa.profil_proses', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1 class="fw-bold text-center mt-3" id="judul">Profil siswa</h1>
        <div class="container-md d-flex justify-content-center align-items-start gap-1 m-5 mt-1">
            <div class="col-md-4 text-center align-items-center mt-5">
                @if (isset($user->foto_profil))
                    <img src="{{ asset('storage/profil-user/' . $user->foto_profil) }}" class="img-fluid profile-picture mt-3"
                        id="pfp" alt="Foto Profil" width="100">
                @else
                    <img src="https://www.gravatar.com/avatar/?d=mp&s=150" class="img-responsive rounded-circle"
                        id="pfp2" alt="sementara">
                @endif

                <div class="d-flex justify-content-center mt-3 gap-3">
                    <button type="submit" class="btn btn-light" id="btnM">Simpan</button>
                    <a href="{{ route('siswa.home') }}" class="btn btn-light" id="btnK">Kembali</a>
                </div>
            </div>
            <div class="col-md-6 ms-5 mt-5" id="form">
                <input type="file" class="form-control form-control-lg h-59" placeholder="Nama Siswa" value=""
                    name="foto_profil" style="border-color: black;">
                <small>Upload foto profil baru jika ingin menggantinya</small>
                <br>
                <input type="text" class="form-control form-control-lg shadow-none" name="nama"
                    placeholder="Nama Siswa" style="border-color: black;" value="{{ old('nama', $user->nama) }}" readonly
                    required>
                <br>

                <input type="email" class="form-control form-control-lg shadow-none" name="email"
                    placeholder="Email Siswa" style="border-color: black;" value="{{ old('email', $user->email) }}"
                    readonly>
                <br>

                <input type="password" class="form-control form-control-lg" name="password" placeholder="Kata Sandi Baru"
                    style="border-color: black;">
                <small>Ketik kata sandi baru jika ingin menggantinya</small>
                <br>

                <select id="jenis_kelamin" name="jenis_kelamin" required class="form-control form-control-lg" disabled>
                    <option value="" disabled>Jenis Kelamin:</option>
                    <option value="Laki-Laki"
                        {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="Perempuan"
                        {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>

                <input type="hidden" name="jenis_kelamin" value="{{ $user->jenis_kelamin }}">
                <br>

                <input type="text" class="form-control form-control-lg shadow-none" name="asal_sekolah"
                    placeholder="Asal Sekolah" style="border-color: black;"
                    value="{{ old('asal_sekolah', $user->asal_sekolah) }}" readonly required>
                <br>

                <select id="id_teachers" name="id_teachers" required class="form-control form-control-lg" disabled>
                    <option value="" readonly disabled>Nama Pembimbing:</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}"
                            {{ old('id_teachers', $user->id_teachers) == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->nama }}
                        </option>
                    @endforeach
                </select>
                <br>

                <small>posisi guru pembimbing</small>
                @foreach ($teachers as $teacher)
                    @if ($teacher->id == Auth::user()->id_teachers)
                        <input type="text" class="form-control form-control-lg shadow-none" name="posisi"
                            placeholder="Posisi Pembimbing" style="border-color: black;"
                            value="{{ old('posisi', $teacher->posisi) }}" readonly required>
                    @endif
                @endforeach


                <input type="hidden" name="id_teachers" value="{{ $user->id_teachers }}">
            </div>
        </div>
    @endsection
