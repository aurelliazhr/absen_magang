@extends('templateGuru')

@section('guru')
    <form action="{{ route('guru.edit_tugas_proses', ['id' => $task->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1 class="fw-bold text-center mt-4">Edit tugas</h1>

        <div class="container d-flex justify-content-center mt-5 align-items-center">
            <div class="col-md-6" id="form">
                <input type="text" class="form-control form-control-lg" name="judul" placeholder="Judul Tugas"
                    style="border-color: black;" value="{{ old('judul', $task->judul) }}" required>
                <br>

                <textarea class="form-control form-control-lg h-59" placeholder="Deskripsi Tugas" style="border-color: black;" readonly>{{ $task->deskripsi }}</textarea>
                <br>

                <input type="file" class="form-control form-control-lg" name="file" placeholder="File"
                    style="border-color: black;">
                <br>

                <input type="text" class="form-control form-control-lg" name="batas_pengumpulan"
                    placeholder="Batas Pengumpulan" style="border-color: black;"
                    value="{{ old('batas_pengumpulan', $task->batas_pengumpulan) }}" required>
                <br>

                <div class="container-md d-flex justify-content-center">
                 <button type="submit" class="btn btn-light fw-bold" id="masuk">Edit</button>
                </div>
            </div>
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
