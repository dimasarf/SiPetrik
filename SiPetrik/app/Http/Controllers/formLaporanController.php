<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelapor;
use App\kejadian;
use Illuminate\Database\QueryException;
use Exception;

class formLaporanController extends Controller
{
    public function index()
    {
        return view('formLaporan');
    }

    public function complete()
    {
        return view ('LaporanSukses');
    }

    public function store(Request $request)
    {
        $pelapor = new pelapor();
        $pelapor->nik =  $request->nik;
        $pelapor->nama = $request->nama;
        $pelapor->telepon = $request->telepon;
        $kejadian = new kejadian();
        $kejadian->nik = $request->nik;
        $kejadian->lokasi = $request->lokasi;
        $kejadian->deskripsi = $request->deskripsi;
        $kejadian->latitude = $request->latitude;
        $kejadian->longitude = $request->longitude;
        $kejadian->jumlahKorban = $request->jumlahKorban;
        $kejadian->status = "Belum Ditangani";
        try
        {
            
            $pelapor->save();            
            $kejadian->save();
        }
        catch (\Exception $e)
        {            
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062)
            {
                $kejadian->save();
            }
            
        }
        
        return redirect()->action('formLaporanController@complete');
    }
}
