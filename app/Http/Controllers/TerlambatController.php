<?php

namespace App\Http\Controllers;

use App\Models\terlambat;
use App\Models\nomerketerlambatan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

use Illuminate\Http\Request;

class TerlambatController extends Controller
{


    public function index()
    {
        $tanggal = Carbon::now()->toDateTimeString();
        $tanggal = date('Y-m-d', time());
        $usernama = Auth::user()->name;
        $data2 = terlambat::where('namakaryawan', $usernama)->get();
        $data = terlambat::where('namakaryawan', $usernama)->where('tanggal', $tanggal)->get();
        if ($data->count() > 0) {
            return view('Karyawan.PermohonanSurat.terlambat')->with(compact(["tanggal"], ["data"], ["data2"]));
        } else {
            return view('Karyawan.PermohonanSurat.terlambatKonfimasi')->with(compact(["tanggal"], ["data"], ["data2"]));
        }
    }
    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['atasan'] = 'null';
        $requestData['foto'] = '/storage/null.png';
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
    public function admin(Request $request)
    {
        if ($request->has('search1')) {
            $data = terlambat::where('tittle', 'LIKE', '%' . $request->search1 . '%')->get();
        } else if ($request->has('search2')) {
            $data = terlambat::where('deskripsi', 'LIKE', '%' . $request->search2 . '%')->get();
        } else if ($request->has('search2')) {
            $data = terlambat::where('deskripsi', 'LIKE', '%' . $request->search3 . '%')->get();
        } else {
            $data = terlambat::all();
        }
        return View('admin/HRD/Perizinan/terlambat', compact(["data"]));
    }
    public function edit($id, $pimpinan)
    {
        $data = terlambat::find($id);
        $terlambat = [
            'id' => $id,
            'namakaryawan' => $data->namakaryawan,
            'jabatan' => $data->jabatan,
            'atasan' => $data->atasan,
            'tanggal' => $data->tanggal,
            'keterangan' => $data->keterangan,
            'foto' => $data->foto,
            'created_at' => $data->created_at,
        ];

        $data = terlambat::where('id', $id)
            ->update([
                'atasan' => $id,
                'namakaryawan' => $data->namakaryawan,
                'keterangan' => $data->keterangan,
                'atasan' => $pimpinan,
                'jabatan' => $data->jabatan,
                'created_at' => $data->created_at,
                'foto' => $data->foto,
            ]);

        return view('admin.HRD.Perizinan.editTerlambat', $terlambat);
    }
    public function update($id, Request $request)
    {

        $atasan = $request->input('atasan');
        $namakaryawan = $request->input('namakaryawan');
        $keterangan = $request->input('keterangan');
        $jabatan = $request->input('jabatan');
        $created_at = $request->input('created_at');
        $foto = $request->file('foto');

        $namadokumen = 'Terlambat-' .  $request->file('foto')->getClientOriginalName();
        $foto->move('dokumen/', $namadokumen);

        $data = terlambat::find($id);

        $data = terlambat::where('id', $id)
            ->update([
                'atasan' => $atasan,
                'namakaryawan' => $namakaryawan,
                'keterangan' => $keterangan,
                'jabatan' => $jabatan,
                'created_at' => $created_at,
                'foto' => $namadokumen,
            ]);
        $data = terlambat::all();
        return View('admin/HRD/Perizinan/terlambat', compact(["data"]));
    }
    public function pdfterlambat($id)
    {
        $data = terlambat::find($id);
        $randomId1       =   rand(1, 1000000000);
        $data2 = nomerketerlambatan::create(['nomerketerlambatan' => $randomId1]);

        $terlambat = [
            'id' => $id,
            'namakaryawan' => $data->namakaryawan,
            'jabatan' => $data->jabatan,
            'atasan' => $data->atasan,
            'tanggal' => $data->tanggal,
            'keterangan' => $data->keterangan,
            'foto' => $data->foto,
            'created_at' => $data->created_at,
            'randomid' => $randomId1,

        ];
        $pdf = PDF::loadView('pdf.terlambat', $terlambat);
        return $pdf->download('Terlambat-'  . $data->namakaryawan . '-' .  $randomId1 . '.pdf');
    }
}
