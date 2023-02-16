<?php

namespace App\Http\Controllers;

use App\Models\Permohonan_keluar;
use App\Models\nomerketerlambatan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

use Illuminate\Http\Request;

class PermohonanKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggal = Carbon::now()->toDateTimeString();
        $tanggal = date('Y-m-d', time());
        $usernama = Auth::user()->name;
        $data2 = Permohonan_keluar::where('namakaryawan', $usernama)->get();
        $data = Permohonan_keluar::where('namakaryawan', $usernama)->where('tanggal', $tanggal)->get();
        if ($data->count() > 0) {
            return view('Karyawan.PermohonanSurat.Permohonan_keluar')->with(compact(["tanggal"], ["data"], ["data2"]));
        } else {
            return view('Karyawan.PermohonanSurat.Permohonan_keluarKonfimasi')->with(compact(["tanggal"], ["data"], ["data2"]));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['atasan'] = 'null';
        $requestData['foto'] = '/storage/null.png';
        Permohonan_keluar::create($requestData);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permohonan_keluar  $permohonan_keluar
     * @return \Illuminate\Http\Response
     */
    public function show(Permohonan_keluar $permohonan_keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permohonan_keluar  $permohonan_keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Permohonan_keluar $permohonan_keluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permohonan_keluar  $permohonan_keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permohonan_keluar $permohonan_keluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permohonan_keluar  $permohonan_keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permohonan_keluar $permohonan_keluar)
    {
        //
    }
}
