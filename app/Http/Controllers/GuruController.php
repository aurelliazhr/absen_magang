<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index() {
        $users = User::latest()->paginate(10);

        return view('pembimbing.home', compact('users'));
    }

    public function lihat() {
        return view('pembimbing.lihat_siswa');
    }
}
