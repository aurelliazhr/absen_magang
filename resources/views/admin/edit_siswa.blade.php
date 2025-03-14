@extends('templateAdmin')

@section('admin')
    <form action="{{ route('admin.edit_siswa_proses', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1 class="fw-bold text-center mt-4">Edit Data Siswa</h1>

        <div class="container d-flex justify-content-center mt-5 align-items-center">
            <div class="col-md-6" id="form">
                <input type="text" class="form-control form-control-lg" name="nama" placeholder="Nama Siswa"
                    style="border-color: black;" value="{{ old('nama', $user->nama) }}" required>
                <br>

                <input type="email" class="form-control form-control-lg" name="email" placeholder="Email Siswa"
                    style="border-color: black;" value="{{ old('email', $user->email) }}">
                <br>

                <input type="password" class="form-control form-control-lg" name="password" placeholder="Kata Sandi Baru"
                    style="border-color: black;">
                <small>Ketik kata sandi baru jika ingin menggantinya</small>
                <br>

                <select id="jenis_kelamin" name="jenis_kelamin" required class="form-control form-control-lg">
                    <option value="" disabled>Jenis Kelamin:</option>
                    <option value="Laki-Laki"
                        {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="Perempuan"
                        {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                <br>

                <input type="text" class="form-control form-control-lg" name="asal_sekolah" placeholder="Asal Sekolah"
                    style="border-color: black;" value="{{ old('asal_sekolah', $user->asal_sekolah) }}" required>
                <br>

                <select id="id_teachers" name="id_teachers" required class="form-control form-control-lg">
                    <option value="" disabled>Nama Pembimbing:</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}"
                            {{ old('id_teachers', $user->id_teachers) == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->nama }}
                        </option>
                    @endforeach
                </select>
                <br>
            </div>
        </div>

        <div class="container-lg d-flex justify-content-center">
            <button type="submit" class="btn btn-light fw-bold" id="masuk">Edit</button>
        </div>
    </form>

    <style>
        #masuk {
            background-color: #1D0CD1;
            color: white;
            width: 276px;
            height: 59px;
            font-size: 27px;
        }
    </style>
@endsection
