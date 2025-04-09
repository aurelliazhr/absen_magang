<?php

namespace App\Http\Controllers;

use App\Models\Absent;
use App\Models\Assignment;
use App\Models\Score;
use App\Models\Task;
use App\Models\Teacher;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    // CRUD SISWA

    function home()
    {
        $teachers = Teacher::all();
        $users = User::all();
        return view('admin.home', compact('teachers', 'users'));
    }

    public function jurnal(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $absents = Absent::where('id_users', $id)
            ->where(function ($query) {
                $query->where('kategori', 'pulang')
                    ->orWhereIn('status', ['sakit', 'izin']);
            })
            // ->where('kategori', 'datang')
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

            // Ambil jurnal
            $pulang->ket = wordwrap($pulang->keterangan, 30, "\n", true);

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
            Absent::where('id_users', $id)->delete();
            Score::whereIn('id_assignments', function ($query) use ($id) {
                $query->select('id')->from('assignments')->where('id_users', $id);
            })->delete();
            Assignment::where('id_users', $id)->delete();
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
            'password' => 'required|min:5',
            'posisi' => 'required|max:20'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        Teacher::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'posisi' => $request->posisi
        ]);

        return redirect()->route('admin.data_guru')->with('success', 'Siswa berhasil ditambahkan!');
    }

    public function edit_guru(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.edit_guru', compact('teacher'));
    }

    public function edit_guru_proses(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'sometimes|email|unique:teachers,email,' . $id,
            'password' => 'nullable|min:5',
            'posisi' => 'required|max:20'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $teacher->nama = $request->nama;

        if ($request->has('email') && !empty($request->email)) {
            $teacher->email = $request->email;
        }

        if ($request->filled('password')) {
            $teacher->password = Hash::make($request->password);
        }

        $teacher->posisi = $request->posisi;

        $teacher->save();

        return redirect()->route('admin.data_guru')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function hapus_guru(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        if ($teacher) {
            Score::whereIn('id_assignments', function ($query) use ($id) {
                $query->select('id')->from('assignments')
                    ->whereIn('id_tasks', function ($subQuery) use ($id) {
                        $subQuery->select('id')->from('tasks')->where('id_teachers', $id);
                    });
            })->delete();
            Assignment::whereIn('id_tasks', function ($query) use ($id) {
                $query->select('id')->from('tasks')->where('id_teachers', $id);
            })->delete();
            Task::where('id_teachers', $id)->delete();
            Absent::whereIn('id_users', function ($query) use ($id) {
                $query->select('id')->from('users')->where('id_teachers', $id);
            })->delete();
            User::where('id_teachers', $id)->delete();
            $teacher->delete();
        }

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
