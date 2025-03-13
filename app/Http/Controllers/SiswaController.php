<?php

namespace App\Http\Controllers;

use App\Models\Absent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    function home() {
        return view('siswa.home');
    }

    function absen_datang(Request $request) {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'keterangan' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $userId = Auth::id();

        Absent::create([
            'id_users' => $userId,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        session(['sudah_absen_datang' => true]);

        return redirect()->route('siswa.home')->with('success', 'Siswa berhasil ditambahkan!');
    }

    function absen_pulang(Request $request) {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'keterangan' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $userId = Auth::id();

        Absent::create([
            'id_users' => $userId,
            'status' => $request->status,
            'keterangan' => $request->keterangan,
            'kategori' => 'pulang'
        ]);

        session()->forget('sudah_absen_datang');

        return redirect()->route('siswa.home')->with('success', 'Siswa berhasil ditambahkan!');
    }
}
