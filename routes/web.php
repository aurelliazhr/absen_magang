<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/admin/home', function () {
    return view('admin/home');
});
Route::get('/admin/data_siswa', function () {
    return view('admin/data_siswa');
});
Route::get('/template', function () {
    return view('templateAdmin');
});