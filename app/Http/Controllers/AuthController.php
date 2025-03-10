<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return view ('index');
    }

    function store(Request $request) {
        return $request->all();
    }
}
