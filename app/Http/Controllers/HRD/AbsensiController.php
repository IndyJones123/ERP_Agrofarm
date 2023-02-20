<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\AbsensiModel;
use App\Models\JabatanModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search1')) {
            $data = AbsensiModel::where('tittle', 'LIKE', '%' . $request->search1 . '%')->get();
        } else if ($request->has('search2')) {
            $data = AbsensiModel::where('hari', 'LIKE', '%' . $request->search2 . '%')->get();
        } else if ($request->has('search2')) {
            $data = AbsensiModel::where('hari', 'LIKE', '%' . $request->search2 . '%')->get();
        } else {
            $data = AbsensiModel::all();
        }
        return View('admin/HRD/absensi/absensi', compact(["data"]));
    }
    public function create_absensi()
    {
        $data = AbsensiModel::all();
        $data2 = JabatanModel::all();
        return View('admin/HRD/absensi/addabsensi', compact(["data"], ["data2"]));
    }
    public function store(Request $request)
    {
        $will_insert = [];
        foreach ($request->input('jabatan') as $key => $value) {
            array_push($will_insert, ['jabatan' => $value]);
            $tittle = $request->input('tittle');
            $hari = implode(',', $request->input('hari'));
            $start_time = $request->input('start_time');
            $batas_start_time = $request->input('batas_start_time');
            $tempat = $request->input('tempat');
            $longtitude = $request->input('longtitude');
            $latitude = $request->input('latitude');
            $jarak = $request->input('jarak');
            $end_time = $request->input('end_time');
            $batas_end_time = $request->input('batas_end_time');


            $data = DB::table('absensi')
                ->insert([
                    'tittle' => $tittle,
                    'hari' => $hari,
                    'start_time' => $start_time,
                    'jabatan' => $value,
                    'tempat' => $tempat,
                    'longtitude' => $longtitude,
                    'latitude' => $latitude,
                    'jarak' => $jarak,
                    'batas_start_time' => $batas_start_time,
                    'end_time' => $end_time,
                    'batas_end_time' => $batas_end_time,
                ]);
        }
        $data = AbsensiModel::all();
        return View('admin.HRD.absensi.absensi', compact(["data"]));
    }
    public function edit($id)
    {
        $data = AbsensiModel::find($id);
        $create_absensi = [
            'id' => $id,
            'tittle' => $data->tittle,
            'hari' => $data->hari,
            'start_time' => $data->start_time,
            'tempat' => $data->tempat,
            'longtitude' => $data->longtitude,
            'latitude' => $data->latitude,
            'jarak' => $data->jarak,
            'jabatan' => $data->jabatan,
            'batas_start_time' => $data->batas_start_time,
            'end_time' => $data->end_time,
            'batas_end_time' => $data->batas_end_time,
            'notelepon' => $data->notelepon,
        ];

        return view('admin.HRD.absensi.editabsensi', $create_absensi);
    }
    public function update($id, Request $request)
    {
        $tittle = $request->input('tittle');
        $hari = $request->input('hari');
        $start_time = $request->input('start_time');
        $jabatan = $request->input('jabatan');
        $batas_start_time = $request->input('batas_start_time');
        $end_time = $request->input('end_time');
        $batas_end_time = $request->input('batas_end_time');


        $data = AbsensiModel::find($id);

        $data = AbsensiModel::where('id', $id)
            ->update([
                'tittle' => $tittle,
                'hari' => $hari,
                'start_time' => $start_time,
                'jabatan' => $jabatan,
                'batas_start_time' => $batas_start_time,
                'end_time' => $end_time,
                'batas_end_time' => $batas_end_time,
            ]);

        $data = AbsensiModel::all();
        return View('admin.HRD.absensi.absensi', compact(["data"]));
    }
    public function delete($id)
    {
        $data = AbsensiModel::find($id);
        $data->delete();
        $data = AbsensiModel::all();
        return View('admin.HRD.absensi.absensi', compact(["data"]));
    }
}
