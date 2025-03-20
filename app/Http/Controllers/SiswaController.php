<?php

namespace App\Http\Controllers;

use App\Models\Absent;
use App\Models\Assignment;
use App\Models\Score;
use App\Models\Task;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{

    function home()
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $absents = Absent::where('id_users', $userId)->orderBy('created_at', 'desc')->paginate(10);
        $assignments = Assignment::where('id_users', $userId)->orderBy('created_at', 'desc')->paginate(10);

        return view('siswa.home', compact('absents', 'user', 'assignments'));
    }


    function absen_datang(Request $request)
    {
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

        User::where('id', $userId)->update(['absen_datang' => true]);

        if (in_array($request->status, ['izin', 'sakit'])) {
            User::where('id', $userId)->update(['absen_datang' => false]);
        }


        return redirect()->route('siswa.home')->with('success', 'Siswa berhasil ditambahkan!');
    }

    function absen_pulang(Request $request)
    {
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

        // session()->forget('sudah_absen_datang');
        User::where('id', $userId)->update(['absen_datang' => false]);

        return redirect()->route('siswa.home')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function profil(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $teachers = Teacher::all();

        return view('siswa.profil', compact('user', 'teachers'));
    }

    public function profil_proses(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'foto_profil' => 'nullable|mimes:png,jpg,jpeg|max:2048',
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

        if ($request->hasFile('foto_profil')) {
            $foto_profil = $request->file('foto_profil');
            $filename = date('YmdHis') . '_' . $foto_profil->getClientOriginalName();
            $path = 'profil-user/' . $filename;

            if ($user->foto_profil && Storage::disk('public')->exists('profil-user/' . $user->foto_profil)) {
                Storage::disk('public')->delete('profil-user/' . $user->foto_profil);
            }

            Storage::disk('public')->put($path, file_get_contents($foto_profil));
            $user->foto_profil = $filename;
        }

        if ($request->has('email') && !empty($request->email)) {
            $user->email = $request->email;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('siswa.profil', $user->id)->with('success', 'Data siswa berhasil diperbarui!');
    }

    function tugas()
    {
        $user = Auth::user();
        $tugas = Task::where('id_teachers', $user->id_teachers)->orderBy('id', 'desc')->paginate(10);

        return view('siswa.tugas', compact('user', 'tugas'));
    }

    function detail_tugas($id)
    {
        $user = Auth::user();
        $tugas = Task::findOrFail($id);

        return view('siswa.detail_tugas', compact('user', 'tugas'));
    }

    public function lihat_file($file)
    {
        $filePath = public_path('file/' . $file);

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->file($filePath);
    }

    function pengumpulan($id)
    {
        $tugas = Task::findOrFail($id);

        $user = Auth::user();

        return view('siswa.pengumpulan', compact('user', 'tugas'));
    }

    function pengumpulan_proses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_tasks' => 'required',
            'judul' => 'required',
            'file' => 'required|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $filename = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('file'), $filename);
        }

        Assignment::create([
            'id_users' => Auth::id(),
            'id_tasks' => $request->id_tasks,
            'judul' => $request->judul,
            'file' => $filename
        ]);

        return redirect()->route('siswa.tugas')->with('success', 'Siswa berhasil ditambahkan!');
    }

    function nilai($id)
    {
        $user = Auth::user();
        $tugas = Task::findOrFail($id);
        $scores = Score::where('id_users', $user->id)
            ->where('id_tasks', $id)
            ->first();

        return view('siswa.nilai', compact('user', 'tugas', 'scores'));
    }
}
