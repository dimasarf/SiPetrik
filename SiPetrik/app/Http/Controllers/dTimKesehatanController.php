<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelapor;
use App\kejadian;
use App\penugasan;
use App\user;
use App\triase;
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
        $penugasans = DB::table('kejadians')
                    ->join('penugasans','kejadians.id', '=', 'penugasans.idKejadian')
                    ->where('penugasans.id',\Auth::user()->idPenugasan)
                    ->select('kejadians.lokasi', 'kejadians.deskripsi','penugasans.id', 'kejadians.latitude', 'kejadians.longitude')                        
                    ->get();
        return view('penugasanTim', compact('penugasans'));
        
    }


    public function loadPenugasan($id)
    {
        $detail = DB::table('penugasans')
                ->where('penugasans.id','=',$id)                
                ->join('kejadians','penugasans.idKejadian', '=', 'kejadians.id')                
                ->select('kejadians.lokasi', 'kejadians.deskripsi','kejadians.latitude', 'kejadians.longitude','penugasans.id' , 'kejadians.status')
                ->get()
                ->first();
        return view('detailPenugasan', compact('detail'));
    }

    public function handleLaporan($id)
    {
        $penugasan = penugasan::find($id);
        $kejadian = kejadian::find($penugasan->idKejadian);
        $kejadian->status = "Sedang dalam penanganan tim kesehatan";
        $kejadian->save();
    }

    public function finishLaporan($id)
    {
        $penugasan = penugasan::find($id);
        $kejadian = kejadian::find($penugasan->idKejadian);
        $kejadian->status = "Sudah ditangani";
        $user = \Auth::user();
        $user->idPenugasan = 0;
        $user->save();
        $kejadian->save();
    }

    public function pemetaan()
    {
        $petugas = User::all();
        $kejadians =DB::table('kejadians')
                    ->join('penugasans','kejadians.id', '=', 'penugasans.idKejadian')
                    ->select('kejadians.lokasi', 'kejadians.status','penugasans.triase', 
                            'kejadians.latitude', 'kejadians.longitude', 'penugasans.id') 
                    ->get();
        return view('pemetaanTim', compact('kejadians','petugas'));
        // return $kejadians;
    }

    public function getTriase()
    {
        $triases = triase::all();
        return view('triase', compact('triases'));
    }

    public function getCaraPenanganan($id)
    {
        $triase = triase::find($id);
        return view('caraPenanganan', compact('triase'));
    }

    public function landingPage()
    {
        return view('landingPage');
    }
}
