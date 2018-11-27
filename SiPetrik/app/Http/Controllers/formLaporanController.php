<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formLaporanController extends Controller
{
    public function index()
    {
        return view('formLaporan');
    }
}
