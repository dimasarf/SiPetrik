<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelapor;
use App\kejadian;
use App\penugasan;
use DB;

class dTimKesehatanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $isNotEmpty = penugasan::all()->first();
        if($isNotEmpty)
        {
            $penugasans = DB::table('kejadians')
                        ->join('penugasans','kejadians.id', '=', 'penugasans.idKejadian')
                        ->select('kejadians.lokasi', 'kejadians.deskripsi','penugasans.id', 'kejadians.latitude', 'kejadians.longitude')                        
                        ->get();
            return view('dashboardTimKesehatan', compact('penugasans'));
            // return $penugasans;
        }
        
    }

    public function loadPenugasan($id)
    {
        $detail = DB::table('penugasans')
                ->where('penugasans.id','=',$id)                
                ->join('kejadians','penugasans.idKejadian', '=', 'kejadians.id')                
                ->select('kejadians.lokasi', 'kejadians.deskripsi','kejadians.latitude', 'kejadians.longitude')
                ->get()
                ->first();
        return view('detailPenugasan', compact('detail'));
    }
}
