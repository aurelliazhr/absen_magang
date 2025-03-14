<?php

namespace App\Http\Controllers;

use App\Models\Absent;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    function home() {
        $userId = Auth::id();
        $absents = Absent::where('id_users', $userId)->orderBy('created_at', 'desc')->paginate(10);
    
        return view('siswa.home', compact('absents'));
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
            'keterangan' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $userId = Auth::id();

        Absent::create([
            'id_users' => $userId,
            'status' => 'hadir',
            'keterangan' => $request->keterangan,
            'kategori' => 'pulang'
        ]);

        session()->forget('sudah_absen_datang');

        return redirect()->route('siswa.home')->with('success', 'Siswa berhasil ditambahkan!');
    }

    function profil() {
        return view ('siswa.profil');
    }

    function profil_proses(Request $request, $id) {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'nullable|min:5',
            'asal_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'id_teachers' => 'required|exists:teachers,id'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $userId = Auth::id();

        $user->nama = $request->nama;
        $user->asal_sekolah = $request->asal_sekolah;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->id_teachers = $request->id_teachers;

        if ($request->has('email') && !empty($request->email)) {
            $user->email = $request->email;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.data_siswa')->with('success', 'Data siswa berhasil diperbarui!');
    }
}
