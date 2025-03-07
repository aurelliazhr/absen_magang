<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah siswa</title>
</head>
<body>
    <form action="{{ route('admin.tambah_siswa_proses') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="text" id="nama" name="nama" placeholder="Nama Siswa" class="nama">
        @error('nama')
            <small>Nama harus diisi</small>
        @enderror

        <input type="text" id="email" name="email" placeholder="Email Siswa" class="email">
        @error('email')
            <small>Email sudah terpilih / gunakan @</small>
        @enderror

        <input type="password" id="password" name="password" placeholder="Kata Sandi" class="password">
        @error('password')
            <small>Kata sandi harus diisi dengan min. 5 karakter</small>
        @enderror

        <select id="jenis_kelamin" name="jenis_kelamin" required class="jenis_kelamin">
            <option value="" disabled selected>Jenis Kelamin:</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        @error('jenis_kelamin')
            <small>Pilih jenis kelamin</small>
        @enderror

        <input type="text" id="asal_sekolah" name="asal_sekolah" placeholder="Asal Sekolah" class="asal_sekolah">
        @error('asal_sekolah')
            <small>Asal sekolah harus diisi</small>
        @enderror

        <select id="id_teachers" name="id_teachers" required class="id_teachers">
            <option value="" disabled selected>Nama Pembimbing:</option>
            @foreach ($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->nama }}</option>
            @endforeach
        </select>        
        @error('id_teachers')
            <small>Email Pembimbing harus diisi</small>
        @enderror
        <button type="submit">Tambah Data</button>
    </form>
</body>
</html>