<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class GuruController extends Controller
{
    public function index() {
        $users = User::latest()->paginate(10);

        return view('pembimbing.home', compact('users'));
    }

    public function lihat($id)
    {
        $user = User::findOrFail($id);
        
        return view('pembimbing.lihat_siswa', compact('user'));
    }
}
