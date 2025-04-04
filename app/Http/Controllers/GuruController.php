<?php

namespace App\Http\Controllers;

use App\Models\Absent;
use App\Models\Assignment;
use App\Models\Score;
use App\Models\Task;
use App\Models\User;
use App\Models\Teacher;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function index()
    {
        $user = Auth::guard('teacher')->user();
        $users = User::where('id_teachers', $user->id)
            ->orderBy('nama', 'asc')
            ->paginate(10);

        return view('pembimbing.home', compact('users'));
    }

    function profil()
    {
        $user = Auth::guard('teacher')->user();
        $users = $user->id;

        return view('pembimbing.profil', compact('user', 'users'));
    }

    function profil_proses(Request $request)
    {
        $user = Auth::guard('teacher')->user();

        $validator = Validator::make($request->all(), [
            'foto_profil' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'nama' => 'required',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:5',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $user->nama = $request->nama;

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

        return redirect()->route('guru.profil', $user->id)->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function lihat($id)
    {
        $user = User::findOrFail($id);

        return view('pembimbing.lihat_siswa', compact('user'));
    }

    public function jurnal(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $absents = Absent::where('id_users', $id)
            ->where('kategori', 'pulang')
            ->orderBy('updated_at', 'desc')
            ->get();

        // Cari absen "datang" pada hari yang sama
        foreach ($absents as $pulang) {
            $datang = Absent::where('id_users', $id)
                ->where('kategori', 'datang')
                ->whereDate('created_at', $pulang->updated_at->toDateString())
                ->first();

            // Ambil jam masuk
            if ($datang) {
                $pulang->jam_masuk = \Carbon\Carbon::parse($datang->created_at)->format('H:i');
            } else {
                $pulang->jam_masuk = '-';
            }

            // Ambil jam pulang 
            $pulang->jam_keluar = \Carbon\Carbon::parse($pulang->updated_at)->format('H:i');

            // Hitung lama waktu kerja
            if ($datang) {
                $jamDatang = \Carbon\Carbon::parse($datang->created_at);
                $jamPulang = \Carbon\Carbon::parse($pulang->updated_at);
                $totalMenit = $jamDatang->diffInMinutes($jamPulang);
                $jam = floor($totalMenit / 60);
                $menit = $totalMenit % 60;
                $pulang->lama_waktu = $jam . ' Jam ' . $menit . ' Menit';
            } else {
                $pulang->lama_waktu = '-';
            }
        }

        if ($request->get('export') == 'pdf') {
            $pdf = Pdf::loadView('jurnal', ['user' => $user, 'absents' => $absents]);
            return $pdf->stream('Jurnal_' . $user->name . '.pdf');
        }

        return view('jurnal', compact('absents', 'user'));
    }

    public function lihat_file($file)
    {
        $filePath = public_path('file/' . $file);

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->file($filePath);
    }

    public function tugas()
    {
        $user = Auth::guard('teacher')->user();
        $tasks = Task::where('id_teachers', $user->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('pembimbing.tugas', compact('tasks'));
    }

    public function detail($id)
    {
        $task = Task::findOrFail($id);

        return view('pembimbing.detail', compact('task'));
    }

    public function tambah_tugas()
    {
        $user = Auth::guard('teacher')->user();
        return view('pembimbing.tambah_tugas', compact('user'));
    }

    public function tambah_tugas_proses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'nullable|max:2048',
            'batas_pengumpulan' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $filename = null;
        
        if ($request->hasFile('file')) {

            $file = $request->file;
            $filename = $file->getClientOriginalName() . time() . '.' . $file->getClientOriginalExtension();
            $request->file->move('file', $filename);
        }

        $user = Auth::guard('teacher')->user();

        Task::create([
            'id_teachers' => $user->id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $filename,
            'batas_pengumpulan' => $request->batas_pengumpulan
        ]);

        return redirect()->route('guru.tugas')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function edit_tugas(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        return view('pembimbing.edit_tugas', compact('task'));
    }

    public function edit_tugas_proses(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'nullable',
            'batas_pengumpulan' => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $task->judul = $request->judul;
        $task->deskripsi = $request->deskripsi;

        if ($request->hasFile('file')) {
            if ($task->file && File::exists(public_path('file/' . $task->file))) {
                File::delete(public_path('file/' . $task->file));
            }

            $file = $request->file;
            $filename = $file->getClientOriginalName() . time() . '.' . $file->getClientOriginalExtension();
            $request->file->move('file', $filename);

            $task->file = $filename;
        }

        $task->batas_pengumpulan = $request->batas_pengumpulan;

        $task->save();

        return redirect()->route('guru.tugas')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function hapus_tugas(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        if ($task) {
            Score::whereIn('id_assignments', Assignment::where('id_tasks', $id)->pluck('id'))->delete();
            Assignment::where('id_tasks', $id)->delete();
            $task->delete();
        }

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    function pengumpulan($id)
    {
        $tugas = Assignment::with(['user', 'score'])
            ->where('id_tasks', $id)
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('pembimbing.pengumpulan', compact('tugas'));
    }

    function detail_pengumpulan($id)
    {
        $user = Auth::guard('teacher')->user();
        $tugas = Assignment::with('user', 'score')->findOrFail($id);

        return view('pembimbing.detail_pengumpulan', compact('tugas', 'user'));
    }

    function nilai(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nilai' => 'required',
            'catatan' => 'required',
            'id_users' => 'required',
            'id_tasks' => 'required',
            'id_assignments' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // $user = Auth::guard('teacher')->user();

        Score::create([
            'id_users' => $request->id_users,
            'id_tasks' => $request->id_tasks,
            'id_assignments' => $request->id_assignments,
            'nilai' => $request->nilai,
            'catatan' => $request->catatan
        ]);

        return redirect()->route('guru.tugas')->with('success', 'Siswa berhasil ditambahkan!');
    }
}
