<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelapor;
use App\kejadian;
class dDinasKesehatanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kejadians = kejadian::all();
        return view('admin.dashboardDinas', compact('kejadians'));
    }

    public function loadKejadian($id)
    {
        return $kejadian = kejadian::find($id);
    }
}
