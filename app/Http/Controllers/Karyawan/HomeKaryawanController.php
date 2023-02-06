<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
        $tanggal = Carbon::now()->toDateTimeString();
        $tanggal = date('Y-m-d', time());
        $waktu = Carbon::now()->toTimeString();
        $usernama = Auth::user()->name;
        $userjabatan = Auth::user()->jabatan;
        $data = AbsensiModel::where('jabatan', $userjabatan)->get();
        $data2 = KehadiranLogModel::where('namakaryawan', $usernama)->get();
        $data3 = KehadiranLogModel::where('namakaryawan', $usernama)->where('tanggal', $tanggal)->get('status');

        return view('Karyawan.AbsensiKaryawan')->with(compact(["data"], ["data2"], ["data3"], ['waktu'], ['tanggal']));
    }
}
