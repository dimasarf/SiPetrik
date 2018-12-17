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
        $kejadians = DB::table('penugasans')
                    ->join('kejadians','penugasans.idKejadian', '=', 'kejadians.id')
                    ->select('kejadians.lokasi', 'kejadians.status', 'penugasans.triase', 
                            'kejadians.latitude', 'kejadians.longitude', 'penugasans.id')                        
                    ->get();
        $totalLaporan = kejadian::where('status', 'Laporan Diterima')->count();
        $totalKorban = kejadian::sum('jumlahKorban');
        $totalTim = user::all()->count();
        $urgent = kejadian::where('status', 'Belum Ditangani')->count();
        $totalMerah = penugasan::where('triase', 'merah')->count();
        $totalKuning = penugasan::where('triase', 'kuning')->count();
        $totalHitam = penugasan::where('triase', 'hitam')->count();
        $totalHijau = penugasan::where('triase', 'hijau')->count();
        $totalPutih = penugasan::where('triase', 'putih')->count();
        $tims = user::all();
        return view('overviewDinas', compact('kejadians','totalLaporan'
                    , 'totalKorban', 'totalTim', 'urgent', 'totalMerah',
                'totalKuning','totalHitam','totalHijau', 'totalPutih', 'tims'));
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

    public function detailMarker($id)
    {
        $penugasan = penugasan::find($id);
        $detailKejadian = DB::table('penugasans')
                        ->where('penugasans.id', $id)
                        ->join('kejadians', 'penugasans.idKejadian', '=', 'kejadians.id')
                        ->select('kejadians.status', 'kejadians.lokasi', 'kejadians.jumlahKorban','penugasans.id')
                        ->get()
                        ->first();
        return response()->json($detailKejadian); 
    }

    public function findTeam($id)
    {
        $penugasan = DB::table('users')
                    ->whereIn('idPenugasan', [0, $id])
                    ->orderBy('idPenugasan', 'desc')
                    ->get();
        if(count($penugasan) > 0)
        {
            return response()->json($penugasan); 
        }
        else{
            $petugas = user::where('idPenugasan', '0')->get();
            return response()->json($petugas); 
        }
        
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
            return redirect()->back()->with('message', 'Berhasil menerima laporan');
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
                    ->where('kejadians.status','!=','Laporan Ditolak')
                    ->where('kejadians.id','!=', 0)
                    ->select('kejadians.lokasi','kejadians.deskripsi', 
                            'kejadians.nik', 'pelapors.nama', 'pelapors.telepon', 'kejadians.status')
                    ->get();
        return view('verifiedLaporan', compact('laporans'));
    }

    public function tarikTim($id)
    {
        $petugas = user::find($id);
        $petugas->idPenugasan = 0;
        $petugas->save();
        return response()->json($petugas);
    }
   
}
