<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\AbsensiModel;
use App\Models\KehadiranLogModel;
use Stevebauman\Location\Facades\Location;



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
    public function sakit()
    {
        $tanggal = Carbon::now()->toDateTimeString();
        $tanggal = date('Y-m-d', time());
        $waktu = Carbon::now()->toTimeString();
        $usernama = Auth::user()->name;
        $userjabatan = Auth::user()->jabatan;
        $data = AbsensiModel::where('jabatan', $userjabatan)->get();
        $data2 = KehadiranLogModel::where('namakaryawan', $usernama)->get();
        $data3 = KehadiranLogModel::where('namakaryawan', $usernama)->where('tanggal', $tanggal)->get('status');

        return view('Karyawan.Perizinan.sakit')->with(compact(["data"], ["data2"], ["data3"], ['waktu'], ['tanggal']));
    }
    public function izin()
    {
        $tanggal = Carbon::now()->toDateTimeString();
        $tanggal = date('Y-m-d', time());
        $waktu = Carbon::now()->toTimeString();
        $usernama = Auth::user()->name;
        $userjabatan = Auth::user()->jabatan;
        $data = AbsensiModel::where('jabatan', $userjabatan)->get();
        $data2 = KehadiranLogModel::where('namakaryawan', $usernama)->get();
        $data3 = KehadiranLogModel::where('namakaryawan', $usernama)->where('tanggal', $tanggal)->get('status');

        return view('Karyawan.Perizinan.izin')->with(compact(["data"], ["data2"], ["data3"], ['waktu'], ['tanggal']));
    }
    public function dinasluar()
    {
        $tanggal = Carbon::now()->toDateTimeString();
        $tanggal = date('Y-m-d', time());
        $waktu = Carbon::now()->toTimeString();
        $usernama = Auth::user()->name;
        $userjabatan = Auth::user()->jabatan;
        $data = AbsensiModel::where('jabatan', $userjabatan)->get();
        $data2 = KehadiranLogModel::where('namakaryawan', $usernama)->get();
        $data3 = KehadiranLogModel::where('namakaryawan', $usernama)->where('tanggal', $tanggal)->get('status');

        return view('Karyawan.Perizinan.dinasluar')->with(compact(["data"], ["data2"], ["data3"], ['waktu'], ['tanggal']));
    }
    public function cuti()
    {
        $tanggal = Carbon::now()->toDateTimeString();
        $tanggal = date('Y-m-d', time());
        $waktu = Carbon::now()->toTimeString();
        $usernama = Auth::user()->name;
        $userjabatan = Auth::user()->jabatan;
        $data = AbsensiModel::where('jabatan', $userjabatan)->get();
        $data2 = KehadiranLogModel::where('namakaryawan', $usernama)->get();
        $data3 = KehadiranLogModel::where('namakaryawan', $usernama)->where('tanggal', $tanggal)->get('status');

        return view('Karyawan.Perizinan.cuti')->with(compact(["data"], ["data2"], ["data3"], ['waktu'], ['tanggal']));
    }
}
