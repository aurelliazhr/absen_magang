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

    #tugas {
        /* width: 10%; */
        height: 100%;
        font-size: 30px;
    }

    #jurnal {
        /* width: 10%; */
        height: 100%;
        font-size: 30px;
        text-align: center;
    }

    #keterangan {
        height: 190px;
        width: 350px;
        margin-top: 10px;
    }
    #formH{
        
    }
</style>
@extends('templateSiswa')

@section('siswa')
    <div class="container mt-3">
        <div class="row d-flex justify-content-center align-items-center gap-5">
        <div class="col-md-5 d-grid text-center">
            <a href="/siswa/tugas" type="button" class="btn btn-success fw-bold" id="tugas">Tugas</a>
        </div>
        <div class="col-md-5 d-grid text-center">
            <a href="" type="button" class="btn btn-success fw-bold" id="jurnal"><i class="bi bi-download"></i> Jurnal</a>
        </div>
        </div>
    </div>
    <div class="container-fluid d-flex justify-content-center text-center gap-5" id="formH">
        <form action="{{ route('siswa.absen_datang') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($user->absen_datang == 0)
                <div class="container mt-5" name="status">
                    <div class="row justify-content-center">
                    <div class="col-md-4">
                    <div class="container-md d-flex justify-content-center gap-4 ms-3">
                    <div class="form-check form-check-inline d-flex align-items-center">
                        <input type="radio" class="form-check-input" style="border: 1px solid black;" name="status"
                            value="izin">
                        <label for="izin" class="form-check-label">Izin</label>
                    </div>
                    <div class="form-check form-check-inline d-flex align-items-center">
                        <input type="radio" class="form-check-input" style="border: 1px solid black;" name="status"
                            value="sakit">
                        <label for="sakit" class="form-check-label">Sakit</label>
                    </div>
                    <div class="form-check form-check-inline d-flex align-items-center">
                        <input type="radio" class="form-check-input" style="border: 1px solid black;" name="status"
                            value="hadir">
                        <label for="hadir" class="form-check-label">Hadir</label>
                    </div>
                    </div>
                    <div class="container-md d-flex flex-column align-items-center ms-3">
                        <textarea name="keterangan" id="keterangan" class="form-control form-control-lg" placeholder="Keterangan"
                            style="border: 3px solid black;"></textarea>
                        <br>
                        <button type="submit" class="btn btn-light fw-bold mt-3" id="absen">Absen Datang</button>
                    </div>
                    </div>
                    </div>
                </div>
            @endif
        </form>
        {{-- pulang --}}
        <form action="{{ route('siswa.absen_pulang') }}" method="POST" enctype="multipart/form-data">
            @if ($user->absen_datang == 1)
                @csrf
                <div class="container-md d-flex text-center justify-content-center align-items-center mt-5">
                    <div class="container-md d-flex flex-column align-items-center align-items-center me-5" id="formH">
                        <textarea name="keterangan" required id="" class="form-control form-control-lg mt-5"
                            placeholder="Jurnal Kegiatan Harian" style="border: 3px solid black; height: 190px; width: 350px;"></textarea>
                        <br>
                        <button type="submit" class="btn btn-light fw-bold mt-3" id="absen"
                            style="background-color: green">Absen Pulang</button>
                    </div>
                </div>
            @endif
        </form>
        {{-- riwayat --}}
        <div class="col-md-4 gap-5 me-5" id="Rform">
            <div class="card p-5 mt-5 ms-5">
            <h3 class="text-center fw-bold"><i class="bi bi-square-fill fs-4" id="kotak"></i> Riwayat Kegiatan</h3>
            <div class="overflow-auto" style="max-height: 250px;">
                <ul class="list-group list-group-flush">
                    @foreach ($absents as $a)
                        <li class="list-group-item fw-bold" id="history">
                            <i class="bi bi-clock" style="-webkit-text-stroke: 1px;"></i>
                            @if ($a->status == 'hadir')
                                Anda {{ $a->kategori ?? 'hadir' }} pada {{ $a->created_at->format('d M Y H:i') }}
                            @elseif ($a->status == 'sakit' || $a->status == 'izin')
                                Anda {{ $a->status }} pada {{ $a->created_at->format('d M Y H:i') }}
                            @endif
                            @endforeach
                            @foreach ($assignments as $as)
                        <li class="list-group-item fw-bold" id="history">
                            <i class="bi bi-clock" style="-webkit-text-stroke: 1px;"></i>
                            Anda telah mengumpulkan "{{ $as->judul }}" pada {{ $as->created_at->format('d M Y H:i') }}
                        </li>
                    @endforeach
                    </li>
                    
                </ul>
            </div>
            </div>
        </div>
    </div>
        <!-- </div> -->
        {{-- <!-- @if ($user->absen_datang == 1) --}}
        {{-- <form action="{{ route('siswa.absen_pulang') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container-md d-flex text-center justify-content-center align-items-center">
                <div class="d-flex flex-column align-items-center" id="formH">
                    <textarea name="keterangan" required id="" class="form-control form-control-lg"
                        placeholder="Jurnal Kegiatan Harian" style="border: 3px solid black; height: 190px; width: 70%;"></textarea>
                    <br>
                    <button type="submit" class="btn btn-light fw-bold mt-3" id="absen" style="background-color: green">Absen Pulang</button>
                </div>
                </div>
            </form>
        @endif --> --}}

        <!-- <div class="col-md-6 mt-5 justify-content-center text-center">
                    <h3 class="text-center fw-bold"><i class="bi bi-square-fill fs-4" id="kotak"></i> Riwayat Kegiatan</h3>
                    <div class="container-md mt-3 p-3" style="height: 100%; overflow-y: auto;">
                        <ul class="list-group list-group-flush">
                            {{-- @foreach ($absents as $a)
                        <li class="list-group-item fw-bold" id="history">
                            <i class="bi bi-clock" style="-webkit-text-stroke: 1px;"></i>
                            @if ($a->status == 'hadir')
                                Anda {{ $a->kategori ?? 'hadir' }} pada {{ $a->created_at->format('d M Y H:i') }}
                            @elseif ($a->status == 'sakit' || $a->status == 'izin')
                                Anda {{ $a->status }} pada {{ $a->created_at->format('d M Y H:i') }}
                            @endif
                            @foreach ($assignments as $as)
                        <li class="list-group-item fw-bold" id="history">
                            <i class="bi bi-clock" style="-webkit-text-stroke: 1px;"></i>
                            Anda telah mengumpulkan "{{ $as->judul }}" pada {{ $as->created_at->format('d M Y H:i') }}
                        </li>
                    @endforeach
                    </li>
                    @endforeach --}}
                        </ul>
                    </div>
                </div> -->
@endsection
