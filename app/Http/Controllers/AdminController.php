<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function tambah_siswa()
    {
        return view('admin.tambah_siswa');
    }

    public function tambah_siswa_proses(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'asal_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'email_teachers' => 'required'
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $user['nama'] = $request->nama;
        $user['email'] = $request->email;
        $user['password'] = Hash::make($request->password);
        $user['asal_sekolah'] = $request->asal_sekolah;
        $user['jenis_kelamin'] = $request->jenis_kelamin;
        $user['email_teachers'] = $request->email_teachers;

        User::create($user);

        return redirect()->route('admin.home');
    }
}
