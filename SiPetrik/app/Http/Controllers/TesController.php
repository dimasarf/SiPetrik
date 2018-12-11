<?php

namespace App\Http\Controllers;
use App\pelapor;
use App\kejadian;
use App\penugasan;
use DB;

use Illuminate\Http\Request;

class TesController extends Controller
{
    public function load($id)
    {        
        $kejadian = kejadian::find($id);
        $pelapor = pelapor::where('nik', $kejadian->nik)->get()->first();
        return view('tes', compact('kejadian', 'pelapor'));
    }

    public function store( Request $request)
    {
        $penugasan = new penugasan();        
        $penugasan->idKejadian = $request->idKejadian;
        $penugasan->idPetugas = $request->idTim;
        $penugasan->save();
    }
}
