<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\KehadiranLogModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataLogModel;
use App\Models\JabatanModel;
use App\Models\AbsensiModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Illuminate\Http\Request;

class KehadiranLogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search1')) {
            $data = KehadiranLogModel::where('namakaryawan', 'LIKE', '%' . $request->search1 . '%')->get();
        } else if ($request->has('search2')) {
            $data = KehadiranLogModel::where('jabatan', 'LIKE', '%' . $request->search2 . '%')->get();
        } else if ($request->has('search3')) {
            $data = KehadiranLogModel::where('tanggal', 'LIKE', '%' . $request->search3 . '%')->get();
        } else if ($request->has('search4')) {
            $data = KehadiranLogModel::where('jabatan', 'LIKE', '%' . $request->search4 . '%')->get();
        } else {
            $data = KehadiranLogModel::all();
        }
        return View('admin/HRD/kehadiran/logkehadiran', compact(["data"]));
    }

    public function store2(Request $request)
    {
        $requestData = $request->all();
        $fileName = time() . $request->file('keterangan')->getClientOriginalName();
        $path = $request->file('keterangan')->storeAs('images', $fileName, 'public');
        $requestData['keterangan'] = '/storage/' . $path;
        KehadiranLogModel::create($requestData);
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

    public function store(Request $request)
    {
        $namakaryawan = $request->input('namakaryawan');
        $jabatan = $request->input('jabatan');
        $tanggal = $request->input('tanggal');
        $absenmasuk = $request->input('absenmasuk');
        $absenkeluar = $request->input('absenkeluar');
        $status = $request->input('status');

        $data = DB::table('logkehadiran')
            ->insert([
                'namakaryawan' => $namakaryawan,
                'jabatan' => $jabatan,
                'tanggal' => $tanggal,
                'absenmasuk' => $absenmasuk,
                'absenkeluar' => $absenkeluar,
                'status' => $status,
                'keterangan' => 'logo.png'
            ]);

        return back();
    }

    public function edit($id)
    {
        $data = KehadiranLogModel::find($id);
        $create_kehadiran = [
            'id' => $id,
            'namakaryawan' => $data->namakaryawan,
            'jabatan' => $data->jabatan,
            'tanggal' => $data->tanggal,
            'absenmasuk' => $data->absenmasuk,
            'absenkeluar' => $data->absenkeluar,
            'status' => $data->status,
        ];

        return view('admin.HRD.kehadiran.editlogkehadiran', $create_kehadiran);
    }
    public function update($id, Request $request)
    {
        $namakaryawan = $request->input('namakaryawan');
        $jabatan = $request->input('jabatan');
        $tanggal = $request->input('tanggal');
        $absenmasuk = $request->input('absenmasuk');
        $absenkeluar = $request->input('absenkeluar');
        $status = $request->input('status');


        $data = KehadiranLogModel::find($id);

        $data = KehadiranLogModel::where('id', $id)
            ->update([
                'namakaryawan' => $namakaryawan,
                'jabatan' => $jabatan,
                'tanggal' => $tanggal,
                'absenmasuk' => $absenmasuk,
                'absenkeluar' => $absenkeluar,
                'status' => $status,

            ]);

        $data = KehadiranLogModel::all();
        return View('admin.HRD.kehadiran.logkehadiran', compact(["data"]));
    }
    public function update2($tanggal, Request $request)
    {
        $namakaryawan = $request->input('namakaryawan');
        $jabatan = $request->input('jabatan');
        $tanggal = $request->input('tanggal');
        $absenkeluar = $request->input('absenkeluar');
        $status = $request->input('status');


        $data = KehadiranLogModel::find($tanggal);

        $data = KehadiranLogModel::where('tanggal', $tanggal)->where('namakaryawan', $namakaryawan)
            ->update([
                'namakaryawan' => $namakaryawan,
                'jabatan' => $jabatan,
                'tanggal' => $tanggal,
                'absenkeluar' => $absenkeluar,
                'status' => $status,

            ]);
        return back();
    }

    public function update3($tanggal, Request $request)
    {
        $namakaryawan = $request->input('namakaryawan');
        $jabatan = $request->input('jabatan');
        $tanggal = $request->input('tanggal');
        $absenmasuk = $request->input('absenmasuk');
        $absenkeluar = $request->input('absenkeluar');
        $status = $request->input('status');


        $data = KehadiranLogModel::find($tanggal);

        $data = KehadiranLogModel::where('tanggal', $tanggal)->where('namakaryawan', $namakaryawan)
            ->update([
                'namakaryawan' => $namakaryawan,
                'jabatan' => $jabatan,
                'tanggal' => $tanggal,
                'absenmasuk' => $absenmasuk,
                'absenkeluar' => $absenkeluar,
                'status' => $status,

            ]);
        return back();

        $requestData = $request->all();
        $fileName = time() . $request->file('keterangan')->getClientOriginalName();
        $path = $request->file('keterangan')->storeAs('images', $fileName, 'public');
        $requestData['keterangan'] = '/storage/' . $path;
        KehadiranLogModel::update($requestData)->where('');
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


    public function delete($id)
    {
        $data = KehadiranLogModel::find($id);
        $data->delete();
        $data = KehadiranLogModel::all();
        return back();
    }
    public function export()
    {
        return Excel::download(new DataLogModel(), 'DataLogPegawai.xlsx');
    }
}
