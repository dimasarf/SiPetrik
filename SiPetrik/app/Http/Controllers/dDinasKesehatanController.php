<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelapor;
use App\kejadian;
use App\penugasan;
use App\User;
use DB;

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
        $kejadians = kejadian::where('status', 'Belum Ditangani')->get();
        return view('overviewDinas', compact('kejadians'));
    }

    public function laporan()
    {
        $kejadians = kejadian::where('status', 'Belum Ditangani')->get();
        return view('admin.laporanDinas', compact('kejadians'));
    }

    public function pemetaan()
    {
        $petugas = User::all();
        $kejadians =DB::table('kejadians')
                    ->join('penugasans','kejadians.id', '=', 'penugasans.idKejadian')
                    ->select('kejadians.lokasi', 'kejadians.status','penugasans.triase', 
                            'kejadians.latitude', 'kejadians.longitude', 'penugasans.id')                        
                    ->get();
        return view('admin.pemetaanDinas', compact('kejadians','petugas'));
        // return $kejadians;
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

    public function store(Request $request)
    {  
        $kejadian = kejadian::find($request->idKejadian);
        $kejadian->status = "Laporan Diterima";
        $penugasan = new penugasan();
        $penugasan->idKejadian = $request->idKejadian;
        $penugasan->triase = $request->get('triase');
        
        try
        {            
            $penugasan->save();           
            $kejadian->save();
            return redirect()->back()->with('message', 'Berhasil mengirim tim');
        }
        catch (\Exception $e)
        {            
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062)
            {
                return redirect()->back()->with('warning', 'Sudah ada tim untuk bencana ini!');
            }
        }
    }
    
    public function kirimTim($id,Request $request)
    {
        $petugas = user::find($id);
        $petugas->idPenugasan = $request->idPenugasan;
        $petugas->save();
        return response()->json($petugas);
    }

    public function loadVerifiedLaporan()
    {
        $laporans = DB::table('pelapors')
                    ->join('kejadians','pelapors.nik','=','kejadians.nik')
                    ->where('kejadians.status','Laporan Diterima')
                    ->select('kejadians.lokasi','kejadians.deskripsi', 
                    'kejadians.nik', 'pelapors.nama', 'pelapors.telepon', 'kejadians.status')
                    ->get();
        return view('verifiedLaporan', compact('laporans'));
    }
}
