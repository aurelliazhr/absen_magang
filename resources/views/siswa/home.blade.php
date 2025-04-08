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
        width: auto;
        height: 100%;
        font-size: 30px;
        text-align: center
    }

    @media screen and (max-width : 776px) {
        #tugas {
            width: 300px;
            /* margin-left: 10px; */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #jurnal {
            width: 300px;
            /* margin-left: 50px; */
        }

        .absen {
            width: 37%;
            /* height: 30%; */
            /* background-color: green; */
        }

        .pulang {
            width: 37%;
        }

        #pl {
            margin-left: 55px;
        }

        #hadir {
            margin-left: 55px;
        }

        #Rform {
            width: 350px;
            height: 40px;
        }
    }

    @media screen and (max-width : 987px) {
        #tugas {
            width: 300px;
            margin-left: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #jurnal {
            width: 100px;
            /* margin-left: 50px; */
        }

        .absen {
            width: 37%;
            /* height: 30%; */
            /* background-color: green; */
        }

        .pulang {
            width: 37%;
        }

        #pl {
            margin-left: 55px;
        }

        #hadir {
            margin-left: 55px;
        }

        #Rform {
            width: 350px;
            height: 40px;
        }

        #formH {
            margin
        }
    }

    #jurnal {
        width: auto;
        height: 100%;
        font-size: 30px;
        text-align: center;
    }

    #keterangan {
        height: 190px;
        width: 350px;
        margin-top: 10px;
    }
</style>
@extends('templateSiswa')

@section('siswa')
    {{-- <div class="container mt-3"> --}}
    <div class="row-sm d-flex justify-content-center align-items-center gap-5 mt-3" id="Bform">

        <div class="col-sm-5 d-grid text-center">
            @if ($user->absen_datang == 0)
                {{-- <div class="col-md-5 d-grid text-center"> --}}
                <a href="#" type="button" class="btn btn-success fw-bold" id="tugas"
                    style="cursor: no-drop;">Tugas</a>
                {{-- </div> --}}
            @else
                {{-- <div class="col-md-5 d-flex text-center"> --}}
                <a href="/siswa/tugas" type="button" class="btn btn-success fw-bold" id="tugas">Tugas</a>
                {{-- </div> --}}
            @endif
        </div>

        <div class="col-md-5 d-grid text-center">
            <a href="{{ route('siswa.jurnal') }}?export=pdf" type="button" class="btn btn-success fw-bold"
                id="jurnal"><i class="bi bi-download"></i> Jurnal</a>
        </div>
    </div>
    {{-- </div> --}}
    <div class="container-fluid d-flex justify-content-center text-center gap-5" id="formH">
        @if ($currentAbsent && $currentAbsent->created_at->format('Y-m-d') !== $today)
            {{-- <span>created_at {{ $currentAbsent->created_at->format('Y-m-d') }}</span>
        <span>today {{ $today }}</span> --}}

            <form action="{{ route('siswa.absen_datang') }}" method="POST" enctype="multipart/form-data" class="absen">
                @csrf
                {{-- @if ($user->absen_datang == 0) --}}
                <div class="container mt-5" name="status" id="hadir">
                    <div class="row justify-content-center">
                        <div class="col-sm-4">
                            <div class="container-sm d-flex justify-content-center gap-4 ms-3">
                                <div class="form-check form-check-inline d-flex align-items-center">
                                    <input type="radio" class="form-check-input" style="border: 1px solid black;"
                                        name="status" value="izin">
                                    <label for="izin" class="form-check-label">Izin</label>
                                </div>
                                <div class="form-check form-check-inline d-flex align-items-center">
                                    <input type="radio" class="form-check-input" style="border: 1px solid black;"
                                        name="status" value="sakit">
                                    <label for="sakit" class="form-check-label">Sakit</label>
                                </div>
                                <div class="form-check form-check-inline d-flex align-items-center">
                                    <input type="radio" class="form-check-input" style="border: 1px solid black;"
                                        name="status" value="hadir">
                                    <label for="hadir" class="form-check-label">Hadir</label>
                                </div>
                            </div>
                            <div class="container-sm d-flex flex-column align-items-center ms-3">
                                <textarea name="keterangan" id="keterangan" class="form-control form-control-lg" placeholder="Keterangan"
                                    style="border: 3px solid black;"></textarea>
                                <br>
                                <button type="submit" class="btn btn-light fw-bold mt-3" id="absen">Absen
                                    Datang</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @endif --}}
            </form>
        @else
            @if ($currentAbsent && $currentAbsent->status == 'hadir')
                <form action="{{ route('siswa.absen_pulang') }}" method="POST" enctype="multipart/form-data"
                    class="pulang">
                    {{-- @if ($user->absen_datang == 1) --}}
                    @csrf
                    <div class="container-sm d-flex text-center justify-content-center align-items-center mt-5"
                        id="pl">
                        <div class="container-sm d-flex flex-column align-items-center align-items-center me-5"
                            id="formH">
                            <textarea name="keterangan" required id="" class="form-control form-control-lg mt-5"
                                placeholder="Jurnal Kegiatan Harian" style="border: 3px solid black; height: 190px; width: 350px;"></textarea>
                            <br>
                            <button type="submit" class="btn btn-light fw-bold mt-3" id="absen"
                                style="background-color: green">Absen Pulang</button>
                        </div>
                    </div>
                    {{-- @endif --}}
                </form>
            @else
                <form action="{{ route('siswa.absen_datang') }}" method="POST" enctype="multipart/form-data"
                    class="absen">
                    @csrf
                    {{-- @if ($user->absen_datang == 0) --}}
                    <div class="container mt-5" name="status" id="hadir">
                        <div class="row justify-content-center">
                            <div class="col-sm-4">
                                <div class="container-sm d-flex justify-content-center gap-4 ms-3">
                                    <div class="form-check form-check-inline d-flex align-items-center">
                                        <input type="radio" class="form-check-input" style="border: 1px solid black;"
                                            name="status" value="izin">
                                        <label for="izin" class="form-check-label">Izin</label>
                                    </div>
                                    <div class="form-check form-check-inline d-flex align-items-center">
                                        <input type="radio" class="form-check-input" style="border: 1px solid black;"
                                            name="status" value="sakit">
                                        <label for="sakit" class="form-check-label">Sakit</label>
                                    </div>
                                    <div class="form-check form-check-inline d-flex align-items-center">
                                        <input type="radio" class="form-check-input" style="border: 1px solid black;"
                                            name="status" value="hadir">
                                        <label for="hadir" class="form-check-label">Hadir</label>
                                    </div>
                                </div>
                                <div class="container-sm d-flex flex-column align-items-center ms-3">
                                    <textarea name="keterangan" id="keterangan" class="form-control form-control-lg" placeholder="Keterangan"
                                        style="border: 3px solid black;"></textarea>
                                    <br>
                                    <button type="submit" class="btn btn-light fw-bold mt-3" id="absen">Absen
                                        Datang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @endif --}}
                </form>
                {{-- pulang --}}
            @endif
        @endif
        {{-- riwayat --}}
        <div class="col-sm-4 gap-5 me-5" id="Rform">
            <div class="card p-5 mt-5 ms-5">
                <h3 class="text-center fw-bold"><i class="bi bi-square-fill fs-4" id="kotak"></i> Riwayat Kegiatan
                </h3>
                <div class="overflow-auto" style="max-height: 250px;">
                    <ul class="list-group list-group-flush">
                        @foreach ($absents as $a)
                            <li class="list-group-item fw-bold" id="history">
                                <i class="bi bi-clock" style="-webkit-text-stroke: 1px;"></i>
                                @if ($a->status == 'hadir')
                                    Anda {{ $a->kategori ?? 'hadir' }} pada {{ $a->updated_at->format('d M Y H:i') }}
                                @elseif ($a->status == 'sakit' || $a->status == 'izin')
                                    Anda {{ $a->status }} pada {{ $a->updated_at->format('d M Y H:i') }}
                                @endif
                        @endforeach


                        @foreach ($assignments as $as)
                            <li class="list-group-item fw-bold" id="history">
                                <i class="bi bi-clock" style="-webkit-text-stroke: 1px;"></i>
                                Anda telah mengumpulkan "{{ $as->judul }}" pada
                                {{ $as->created_at->format('d M Y H:i') }}
                            </li>
                        @endforeach
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
