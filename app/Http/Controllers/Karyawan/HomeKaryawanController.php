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
    public function absen($longs2, $lats2)
    {
        $tanggal = Carbon::now()->toDateTimeString();
        $tanggal = date('Y-m-d', time());;
        $hari = Carbon::now()->dayOfWeekIso;
        $waktu = Carbon::now()->toTimeString();
        $usernama = Auth::user()->name;
        $userjabatan = Auth::user()->jabatan;
        $data = AbsensiModel::where('jabatan', $userjabatan)->where('hari', $hari)->get();
        $data2 = KehadiranLogModel::where('namakaryawan', $usernama)->get();
        $data3 = KehadiranLogModel::where('namakaryawan', $usernama)->where('tanggal', $tanggal)->get('status');

        // Define your points
        // $long1 = AbsensiModel::where('jabatan', $userjabatan)->where('hari', ($hari['dayOfWeek']))->value('longtitude');
        $long1 = AbsensiModel::where('hari', $hari)->where('jabatan', $userjabatan)->value('longtitude');
        // dd($long1);
        $long2 = $lats2;
        // dd($long2);
        $lat1 =  AbsensiModel::where('jabatan', $userjabatan)->where('hari', $hari)->value('latitude');
        // dd($lat1);
        $lat2 = $longs2;
        // dd($lat2);

        $theta = $long1 - $long2;
        $miles = (sin(deg2rad($lat1))) * sin(deg2rad($lat2)) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $result = $miles * 60 * 1.1515 * 1.609344 * 1000;
        // dd($result);
        return view('Karyawan.AbsensiKaryawan')->with(compact(["data"], ["data2"], ["data3"], ['waktu'], ['tanggal'], ['result']));
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
    public function keluar()
    {
        $tanggal = Carbon::now()->toDateTimeString();
        $tanggal = date('Y-m-d', time());
        $waktu = Carbon::now()->toTimeString();
        $usernama = Auth::user()->name;
        $userjabatan = Auth::user()->jabatan;
        $data = AbsensiModel::where('jabatan', $userjabatan)->get();
        $data2 = KehadiranLogModel::where('namakaryawan', $usernama)->get();
        $data3 = KehadiranLogModel::where('namakaryawan', $usernama)->where('tanggal', $tanggal)->get('status');

        return view('Karyawan.Perizinan.keluar')->with(compact(["data"], ["data2"], ["data3"], ['waktu'], ['tanggal']));
    }
}
