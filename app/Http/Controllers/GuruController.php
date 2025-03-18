<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Score;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function index() {
        $users = User::orderBy('nama', 'asc')->paginate(10);

        return view('pembimbing.home', compact('users'));
    }

    public function lihat($id)
    {
        $user = User::findOrFail($id);
        
        return view('pembimbing.lihat_siswa', compact('user'));
    }

    public function tugas() {
        $tasks = Task::paginate(10);

        return view('pembimbing.tugas', compact('tasks'));
    }

    public function detail($id)
    {
        $task = Task::findOrFail($id);
        
        return view('pembimbing.detail', compact('task'));
    }

    public function tambah_tugas()
    {
        return view('pembimbing.tambah_tugas');
    }

    public function tambah_tugas_proses(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'id_teachers' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'nullable',
            'batas_pengumpulan' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        Task::create([
            // 'id_teachers' => $request->id_teachers,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $request->file,
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
            // 'file' => 'nullable|min:5',
            'batas_pengumpulan' => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $task->judul = $request->judul;
        $task->deskripsi = $request->deskripsi;
        // $task->file = $request->file;
        $task->batas_pengumpulan = $request->batas_pengumpulan;

        $task->save();

        return redirect()->route('guru.tugas')->with('success', 'Data siswa berhasil diperbarui!');
    }

    public function hapus_tugas(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        if ($task) {
            $task->delete();
        }

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }

    function pengumpulan() {
        $tugas = Assignment::with(['user', 'score'])->orderBy('id', 'desc')->paginate(10);

        return view ('pembimbing.pengumpulan', compact('tugas'));
    }

    function detail_pengumpulan($id) {
        $tugas = Assignment::with('user', 'score')->findOrFail($id);

        return view ('pembimbing.detail_pengumpulan', compact('tugas'));
    }

    function nilai(Request $request) {

        $validator = Validator::make($request->all(), [
            // 'id_teachers' => 'required',
            'nilai' => 'required',
            'catatan' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        Score::create([
            // 'id_teachers' => $request->id_teachers,
            'nilai' => $request->nilai,
            'catatan' => $request->catatan
        ]);

        return redirect()->route('guru.pengumpulan')->with('success', 'Siswa berhasil ditambahkan!');
    }
}
