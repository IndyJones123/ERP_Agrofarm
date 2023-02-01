<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\KehadiranLogModel;
use App\Models\JabatanModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

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
    public function delete($id)
    {
        $data = KehadiranLogModel::find($id);
        $data->delete();
        $data = KehadiranLogModel::all();
        return View('admin.HRD.kehadiran.kehadiran', compact(["data"]));
    }
}
