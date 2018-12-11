<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelapor;
use App\kejadian;
use App\penugasan;
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
        $kejadian = kejadian::find($id);
        $pelapor = pelapor::where('nik', $kejadian->nik)->get()->first();
        return view('detailKejadian', compact('kejadian', 'pelapor'));
    }

    public function generateForm($jumlah)
    {
        return jumlah;
    }

    public function store( Request $request)
    {
        for($i =0; $i<2;$i++)
        {
            // $penugasan = new penugasan();
            // $idPetugas = $request->idTim+""+i;
            // $penugasan->idKejadian = $request->idKejadian;
            // $penugasan->idPetugas = $idPetugas;
            // $penugasan->save();
        }
        $penugasan = new penugasan();
        $penugasan->idKejadian = $request->idKejadian;
        $penugasan->idPetugas = $request->idPetugas;
        $penugasan->save();
    }
}
