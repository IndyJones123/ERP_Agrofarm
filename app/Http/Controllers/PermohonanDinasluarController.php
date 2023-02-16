<?php

namespace App\Http\Controllers;

use App\Models\Permohonan_dinasluar;
use App\Models\nomerketerlambatan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

use Illuminate\Http\Request;

class PermohonanDinasluarController extends Controller
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
        $data2 = Permohonan_dinasluar::where('namakaryawan', $usernama)->get();
        $data = Permohonan_dinasluar::where('namakaryawan', $usernama)->where('tanggal', $tanggal)->get();
        if ($data->count() > 0) {
            return view('Karyawan.PermohonanSurat.Permohonan_dinasluar')->with(compact(["tanggal"], ["data"], ["data2"]));
        } else {
            return view('Karyawan.PermohonanSurat.Permohonan_dinasluarKonfimasi')->with(compact(["tanggal"], ["data"], ["data2"]));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['atasan'] = 'null';
        $requestData['foto'] = '/storage/null.png';
        Permohonan_dinasluar::create($requestData);
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
     * Display the specified resource.
     *
     * @param  \App\Models\Permohonan_dinasluar  $permohonan_dinasluar
     * @return \Illuminate\Http\Response
     */
    public function show(Permohonan_dinasluar $permohonan_dinasluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permohonan_dinasluar  $permohonan_dinasluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Permohonan_dinasluar $permohonan_dinasluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permohonan_dinasluar  $permohonan_dinasluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permohonan_dinasluar $permohonan_dinasluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permohonan_dinasluar  $permohonan_dinasluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permohonan_dinasluar $permohonan_dinasluar)
    {
        //
    }
}
