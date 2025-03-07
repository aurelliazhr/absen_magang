<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Route;

//Login
Route::get('/', function () {
    return view('index');
});

//Admin
Route::prefix('admin')->group(function () {
    Route::get('/home', function () {
        return view('admin/home');
    })->name('admin.home');
    Route::get('/tambah_siswa', [AdminController::class, 'tambah_siswa'])->name('admin.tambah_siswa');
    Route::post('/tambah_siswa-proses', [AdminController::class, 'tambah_siswa_proses'])->name('admin.tambah_siswa_proses');
    Route::get('/data_siswa', [AdminController::class, 'data_siswa'])->name('admin.data_siswa');
    Route::get('/edit_siswa/{id}', [AdminController::class, 'edit_siswa'])->name('admin.edit_siswa');
    Route::put('/edit_siswa_proses/{id}', [AdminController::class, 'edit_siswa_proses'])->name('admin.edit_siswa_proses');
    Route::get('/lihat_siswa/{id}', [AdminController::class, 'lihat_siswa'])->name('admin.lihat_siswa');
    Route::delete('/hapus_siswa/{id}', [AdminController::class, 'hapus_siswa'])->name('admin.hapus_siswa');
    Route::get('/rekap_siswa', function () {
        return view('admin/rekap_siswa');
    });
    // Route::get('/tambah_guru', function () {
    //     return view('admin/tambah_guru');
    // });
    Route::get('/tambah_guru', [AdminController::class, 'tambah_guru'])->name('admin.tambah_guru');
    Route::post('/tambah_guru-proses', [AdminController::class, 'tambah_guru_proses'])->name('admin.tambah_guru_proses');
    
    Route::get('/data_guru', [AdminController::class, 'data_guru'])->name('admin.data_guru');
    Route::get('/edit_guru', function () {
        return view('admin/edit_guru');
    });
    Route::get('/lihat_guru', function () {
        return view('admin/lihat_guru');
    });
});

//Pembimbing
Route::get('/pembimbing/home', [GuruController::class, 'index'])->name('guru.home');
Route::get('/pembimbing/lihat_siswa/{id}', [GuruController::class, 'lihat'])->name('guru.lihat_siswa');
Route::get('/pembimbing/profil', function () {
    return view('pembimbing/profil');
});
Route::get('/pembimbing/tugas', function () {
    return view('pembimbing/tugas');
});
Route::get('/pembimbing/tambah_tugas', function () {
    return view('pembimbing/tambah_tugas');
});
Route::get('/pembimbing/edit_tugas', function () {
    return view('pembimbing/edit_tugas');
});
Route::get('/pembimbing/pengumpulan', function () {
    return view('pembimbing/pengumpulan');
});
Route::get('/pembimbing/detail_pengumpulan', function () {
    return view('pembimbing/detail_pengumpulan');
});

//Siswa
Route::get('/siswa/home', function () {
    return view('siswa/home');
});
Route::get('/siswa/profil', function () {
    return view('siswa/profil');
});
Route::get('/siswa/absen', function () {
    return view('siswa/absen');
});
Route::get('/siswa/absen_datang', function () {
    return view('siswa/absen_datang');
});
Route::get('/siswa/absen_pulang', function () {
    return view('siswa/absen_pulang');
});
Route::get('/siswa/tugas', function () {
    return view('siswa/tugas');
});
Route::get('/siswa/detail_tugas', function () {
    return view('siswa/detail_tugas');
});
Route::get('/siswa/pengumpulan', function () {
    return view('siswa/pengumpulan');
});
Route::get('/siswa/nilai', function () {
    return view('siswa/nilai');
});
