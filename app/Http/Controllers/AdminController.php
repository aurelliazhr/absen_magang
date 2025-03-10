<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    // CRUD SISWA
    public function data_siswa()
    {
        $users = User::with('teacher')->orderBy('nama', 'asc')->paginate(10);

        return view('admin.data_siswa', compact('users'));
    }

    public function lihat_siswa($id)
    {
        $user = User::findOrFail($id);

        return view('admin.lihat_siswa', compact('user'));
    }

    public function tambah_siswa()
    {
        $teachers = Teacher::all();
        return view('admin.tambah_siswa', compact('teachers'));
    }

    public function tambah_siswa_proses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'asal_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'id_teachers' => 'required|exists:teachers,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'asal_sekolah' => $request->asal_sekolah,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_teachers' => $request->id_teachers
        ]);

        return redirect()->route('admin.data_siswa')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function edit_siswa(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $teachers = Teacher::all();

        return view('admin.edit_siswa', compact('user', 'teachers'));
    }

    public function edit_siswa_proses(Request $request, $id)
    {
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

    public function hapus_siswa(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->delete();
        }

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    //CRUD GURU

    public function data_guru()
    {
        $teachers = Teacher::orderBy('nama', 'asc')->paginate(10);

        return view('admin.data_guru', compact('teachers'));
    }

    public function lihat_guru($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.lihat_guru', compact('teacher'));
    }

    public function tambah_guru()
    {
        return view('admin.tambah_guru');
    }

    public function tambah_guru_proses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|min:5'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        Teacher::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.data_guru')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function edit_guru(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.edit_guru', compact( 'teacher'));
    }

    public function edit_guru_proses(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'sometimes|email|unique:teachers,email,' . $id,
            'password' => 'nullable|min:5',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $teacher->nama = $request->nama;

        if ($request->has('email') && !empty($request->email)) {
            $teacher->email = $request->email;
        }

        if ($request->filled('password')) {
            $teacher->password = Hash::make($request->password);
        }

        $teacher->save();

        return redirect()->route('admin.data_guru')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function hapus_guru(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        if ($teacher) {
            $teacher->delete();
        }

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
