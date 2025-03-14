<style>
    .form-check-input {
        transform: scale(1.5);
        /* Perbesar radio button */
        margin-right: 8px;
        /* Tambahkan jarak antara radio dan label */
    }

    .form-check-label {
        font-size: 25px;
        /* Perbesar ukuran teks label */
    }

    #absen {
        background-color: #1D0CD1;
        color: white;
        width: 276px;
        height: 59px;
        font-size: 27px;
    }

    #history {
        color: red;
    }

    #kotak {
        color: red;
    }
</style>
@extends('templateSiswa')

@section('siswa')
    <div class="container-sm text-center">
        <div class="row">
            <div class="col-md-6">
                <a href="" type="button" class="btn btn-success mt-3 fs-2 fw-bold" style="width: 100%; height: 100%;"
                    id="tugas">Tugas</a>
            </div>
            <div class="col-md-6">
                <a href="" type="button" class="btn btn-success mt-3 fs-2 fw-bold"
                    style="width: 100%; height: 100%; font: size 50px;" id="jurnal"><i class="bi bi-download"></i>
                    Jurnal</a>
            </div>
        </div>

        <form action="{{ route('siswa.absen_datang') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (!session('sudah_absen_datang'))
                <div class="row justify-content-start mt-5" id="formH">
                    <div class="col-md-6">
                        <div class="d-flex gap-3" name="status">
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input type="radio" class="form-check-input ms-5" style="border: 1px solid black;"
                                    name="status" value="izin">
                                <label for="izin" class="form-check-label ms-2">Izin</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input type="radio" class="form-check-input ms-5" style="border: 1px solid black;"
                                    name="status" value="sakit">
                                <label for="sakit" class="form-check-label ms-2">Sakit</label>
                            </div>
                            <div class="form-check form-check-inline d-flex align-items-center">
                                <input type="radio" class="form-check-input ms-5" style="border: 1px solid black;"
                                    name="status" value="hadir">
                                <label for="hadir" class="form-check-label ms-2">Hadir</label>
                            </div>
                        </div>
                        <!-- absen -->
                        <div class="container-sm d-flex align-items-center mt-5 ms-5">
                            <textarea name="keterangan" id="" class="form-control form-control-lg" placeholder="Keterangan"
                                style="border: 3px solid black; height: 201px; width: 455px;"></textarea>
                            <br>
                        </div>
                        <div class="d-flex justify-content-center align-items-center mt-4 me-5">
                            <button type="submit" class="btn btn-light fw-bold" id="absen">Absen Datang</button>
                        </div>
                    </div>
            @endif
        </form>

        @if (session('sudah_absen_datang'))
            <form action="{{ route('siswa.absen_pulang') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row justify-content-start mt-5" id="formH">
                    <div class="col-md-6">
                    </div>
                    <!-- absen -->
                    <div class="container-sm d-flex align-items-center mt-5 ms-5">
                        <textarea name="keterangan" required id="" class="form-control form-control-lg" placeholder="Jurnal Kegiatan Harian"
                            style="border: 3px solid black; height: 201px; width: 455px;"></textarea>
                        <br>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-4 me-5">
                        <button type="submit" class="btn btn-light fw-bold" id="absen"
                            style="background-color: green">Absen Pulang</button>
                    </div>
                </div>

            </form>
        @endif

        <div class="container-sm text-center">
            <h3 class="text-center fw-bold"><i class="bi bi-square-fill fs-4" id="kotak"></i> Riwayat Kegiatan</h3>
            <div class="mt-3 p-3" style="height: 300px; overflow-y: auto;">
                <ul class="list-group list-group-flush">
                    @foreach ($absents as $a)
                        <li class="list-group-item fw-bold" id="history">
                            <i class="bi bi-clock" style="-webkit-text-stroke: 1px;"></i>
                            @if ($a->status == 'hadir')
                                Anda {{ $a->kategori ?? 'hadir' }} pada {{ $a->created_at->format('d M Y H:i') }}
                            @elseif ($a->status == 'sakit' || $a->status == 'izin')
                                Anda {{ $a->status }} pada {{ $a->created_at->format('d M Y H:i') }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
@endsection
