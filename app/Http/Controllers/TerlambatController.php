<?php

namespace App\Http\Controllers;

use App\Models\terlambat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TerlambatController extends Controller
{
    public function index()
    {
        $tanggal = Carbon::now()->toDateTimeString();
        $tanggal = date('Y-m-d', time());
        $usernama = Auth::user()->name;
        $data = terlambat::where('namakaryawan', $usernama)->where('tanggal', $tanggal)->get();
        return view('Karyawan.PermohonanSurat.terlambat')->with(compact(["tanggal"], ["data"]));
    }
    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['atasan'] = 'null';
        terlambat::create($requestData);
        // $namakaryawan = $request->input('namakaryawan');
        // $jabatan = $request->input('jabatan');
        // $tanggal = $request->input('tanggal');
        // $absenmasuk = $request->input('absenmasuk');
        // $absenkeluar = $request->input('absenkeluar');
        // $status = $request->input('status');
        // $keterangan = $request->input('keterangan');

        // $data = DB::table('logkehadiran')
        //     ->insert([
        //         'namakaryawan' => $namakaryawan,
        //         'jabatan' => $jabatan,
        //         'tanggal' => $tanggal,
        //         'absenmasuk' => $absenmasuk,
        //         'absenkeluar' => $absenkeluar,
        //         'status' => $status,
        //         'keterangan' => $keterangan,
        //     ]);

        return back();
    }
}
