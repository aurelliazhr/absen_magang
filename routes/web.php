<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use Illuminate\Support\Facades\Route;

//Login
Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'store']);
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin
Route::middleware('admin')->group(function () {
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


        Route::get('/tambah_guru', [AdminController::class, 'tambah_guru'])->name('admin.tambah_guru');
        Route::post('/tambah_guru-proses', [AdminController::class, 'tambah_guru_proses'])->name('admin.tambah_guru_proses');
        Route::get('/data_guru', [AdminController::class, 'data_guru'])->name('admin.data_guru');
        Route::get('/lihat_guru/{id}', [AdminController::class, 'lihat_guru'])->name('admin.lihat_guru');
        Route::get('/edit_guru/{id}', [AdminController::class, 'edit_guru'])->name('admin.edit_guru');
        Route::put('/edit_guru_proses/{id}', [AdminController::class, 'edit_guru_proses'])->name('admin.edit_guru_proses');
        Route::delete('/hapus_guru/{id}', [AdminController::class, 'hapus_guru'])->name('admin.hapus_guru');
    });
});

//Pembimbing
Route::prefix('pembimbing')->group(function () {
    Route::get('/home', [GuruController::class, 'index'])->name('guru.home');
    Route::get('/lihat_siswa/{id}', [GuruController::class, 'lihat'])->name('guru.lihat_siswa');
    Route::get('/profil', function () {
        return view('pembimbing/profil');
    });
    Route::get('/tugas', [GuruController::class, 'tugas'])->name('guru.tugas');
    Route::get('/detail/{id}', [GuruController::class, 'detail'])->name('guru.detail');
    // Route::get('/tambah_tugas', function () {
    //     return view('pembimbing/tambah_tugas');
    // });
    Route::get('/tambah_tugas', [GuruController::class, 'tambah_tugas'])->name('guru.tambah_tugas');
    Route::post('/tambah_tugas-proses', [GuruController::class, 'tambah_tugas_proses'])->name('guru.tambah_tugas_proses');
    Route::get('/edit_tugas/{id}', [GuruController::class, 'edit_tugas'])->name('guru.edit_tugas');
    Route::put('/edit_tugas_proses/{id}', [GuruController::class, 'edit_tugas_proses'])->name('guru.edit_tugas_proses');
    Route::delete('/hapus_tugas/{id}', [GuruController::class, 'hapus_tugas'])->name('guru.hapus_tugas');
    Route::get('/pengumpulan', function () {
        return view('pembimbing/pengumpulan');
    });
    Route::get('/detail_pengumpulan', function () {
        return view('pembimbing/detail_pengumpulan');
    });
});

//Siswa
Route::middleware('auth')->group(function () {
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
});
