<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\AbsensiModel;
use App\Models\KehadiranLogModel;


class HomeKaryawanController extends Controller
{
    public function index()
    {
        return view('Karyawan.home');
    }
    public function absen()
    {
        $tanggal = '2023-02-01';
        $usernama = Auth::user()->name;
        $userjabatan = Auth::user()->jabatan;
        $data = AbsensiModel::where('jabatan', $userjabatan)->get();
        $data2 = KehadiranLogModel::where('namakaryawan', $usernama)->get();
        $data3 = KehadiranLogModel::where('namakaryawan', $usernama)->where('tanggal', $tanggal)->get();
        return view('Karyawan.AbsensiKaryawan', compact(["data"], ["data2"], ["data3"]));
    }
}
