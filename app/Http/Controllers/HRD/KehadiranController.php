<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\KehadiranModel;
use App\Models\JabatanModel;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataKehadiran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search1')) {
            $data = KehadiranModel::where('namapegawai', 'LIKE', '%' . $request->search1 . '%')->get();
        } else if ($request->has('search2')) {
            $data = KehadiranModel::where('bulan', 'LIKE', '%' . $request->search2 . '%')->get();
        } else if ($request->has('search3')) {
            $data = KehadiranModel::where('nik', 'LIKE', '%' . $request->search3 . '%')->get();
        } else if ($request->has('search4')) {
            $data = KehadiranModel::where('jabatan', 'LIKE', '%' . $request->search4 . '%')->get();
        } else {
            $data = KehadiranModel::all();
        }
        return View('admin/HRD/kehadiran/kehadiran', compact(["data"]));
    }
    public function create_kehadiran()
    {
        $data = KehadiranModel::all();
        $data2 = JabatanModel::all();
        return View('admin/HRD/kehadiran/addkehadiran', compact(["data"], ["data2"]));
    }
    public function store(Request $request)
    {
        $will_insert = [];
        foreach ($request->input('jabatan') as $key => $value) {
            array_push($will_insert, ['jabatan' => $value]);
            $namapegawai = $request->input('namapegawai');
            $bulan = $request->input('bulan');
            $nik = $request->input('nik');
            $sakit = $request->input('sakit');
            $izin = $request->input('izin');
            $alpha = $request->input('alpha');

            $data = DB::table('kehadiran')
                ->insert([
                    'namapegawai' => $namapegawai,
                    'bulan' => $bulan,
                    'nik' => $nik,
                    'jabatan' => $value,
                    'sakit' => $sakit,
                    'izin' => $izin,
                    'alpha' => $alpha,
                ]);
        }
        $data = KehadiranModel::all();
        return View('admin.HRD.kehadiran.kehadiran', compact(["data"]));
    }
    public function edit($id)
    {
        $data = KehadiranModel::find($id);
        $create_kehadiran = [
            'id' => $id,
            'namapegawai' => $data->namapegawai,
            'bulan' => $data->bulan,
            'nik' => $data->nik,
            'jabatan' => $data->jabatan,
            'sakit' => $data->sakit,
            'izin' => $data->izin,
            'alpha' => $data->alpha,
            'cuti' => $data->cuti,
            'dinasluar' => $data->dinasluar,
            'terlambat' => $data->terlambat,
            'hadir' => $data->hadir,
            'wajibhadir' => $data->wajibhadir,
            'sisacuti' => $data->sisacuti,
            'keterangan' => $data->keterangan,
        ];

        return view('admin.HRD.kehadiran.editkehadiran', $create_kehadiran);
    }
    public function update($id, Request $request)
    {
        $namapegawai = $request->input('namapegawai');
        $bulan = $request->input('bulan');
        $nik = $request->input('nik');
        $jabatan = $request->input('jabatan');
        $sakit = $request->input('sakit');
        $izin = $request->input('izin');
        $alpha = $request->input('alpha');
        $cuti = $request->input('cuti');
        $dinasluar = $request->input('dinasluar');
        $terlambat = $request->input('terlambat');
        $hadir = $request->input('hadir');
        $wajibhadir = $request->input('wajibhadir');
        $sisacuti = $request->input('sisacuti');
        $keterangan = $request->input('keterangan');


        $data = KehadiranModel::find($id);

        $data = KehadiranModel::where('id', $id)
            ->update([
                'namapegawai' => $namapegawai,
                'bulan' => $bulan,
                'nik' => $nik,
                'jabatan' => $jabatan,
                'sakit' => $sakit,
                'izin' => $izin,
                'alpha' => $alpha,
                'cuti' => $cuti,
                'dinasluar' => $dinasluar,
                'terlambat' => $terlambat,
                'hadir' => $hadir,
                'wajibhadir' => $wajibhadir,
                'sisacuti' => $sisacuti,
                'keterangan' => $keterangan,
            ]);

        $data = KehadiranModel::all();
        return View('admin.HRD.kehadiran.kehadiran', compact(["data"]));
    }
    public function delete($id)
    {
        $data = KehadiranModel::find($id);
        $data->delete();
        $data = KehadiranModel::all();
        return View('admin.HRD.kehadiran.kehadiran', compact(["data"]));
    }

    public function export()
    {
        return Excel::download(new DataKehadiran(), 'pegawai.xlsx');
    }
}
