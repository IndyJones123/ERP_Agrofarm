<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\AbsensiModel;
use App\Models\JabatanModel;
use App\Models\KaryawanModel;
use App\Models\KehadiranLogModel;
use App\Models\KehadiranModel;
use Carbon\Carbon;
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
        $will_inserts = [];
        $will_insert = [];
        foreach ($request->input('jabatan') as $key => $value) {
            foreach ($request->input('hari') as $key => $values) {
                array_push($will_insert, ['jabatan' => $value]);
                array_push($will_insert, ['hari' => $values]);
                $tittle = $request->input('tittle');
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
                        'hari' => $values,
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
            };
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
        $tempat = $request->input('tempat');
        $longtitude = $request->input('longtitude');
        $latitude = $request->input('latitude');
        $jarak = $request->input('jarak');


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
                'tempat' => $tempat,
                'longtitude' => $longtitude,
                'latitude' => $latitude,
                'jarak' => $jarak,
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
    public function search(Request $request)
    {
        $output = "";
        $Absensi = AbsensiModel::where('tittle', 'like', '%' . $request->search . '%')
            ->orWhere('tempat', 'like', '%' . $request->search . '%')
            ->orWhere('jabatan', 'like', '%' . $request->search . '%')
            ->orWhere('start_time', 'like', '%' . $request->search . '%')
            ->orWhere('hari', 'like', '%' . $request->search . '%')
            ->orWhere('longtitude', 'like', '%' . $request->search . '%')
            ->orWhere('latitude', 'like', '%' . $request->search . '%')
            ->orWhere('jarak', 'like', '%' . $request->search . '%')
            ->orWhere('batas_start_time', 'like', '%' . $request->search . '%')
            ->orWhere('end_time', 'like', '%' . $request->search . '%')
            ->orWhere('batas_end_time', 'like', '%' . $request->search . '%')
            ->get();

        foreach ($Absensi as $AbsensiKaryawan) {
            $output .=

                '<tr>

                    <td> ' . $AbsensiKaryawan->tittle . ' </td>
                    <td> ' . $AbsensiKaryawan->hari . ' </td>
                    <td> ' . $AbsensiKaryawan->jabatan . ' </td>
                    <td> ' . $AbsensiKaryawan->tempat . ' </td>
                    <td> ' . $AbsensiKaryawan->latitude . ' </td>
                    <td> ' . $AbsensiKaryawan->longtitude . ' </td>
                    <td> ' . $AbsensiKaryawan->jarak . ' </td>
                    <td> ' . $AbsensiKaryawan->start_time . ' </td>
                    <td> ' . $AbsensiKaryawan->batas_start_time . ' </td>
                    <td> ' . $AbsensiKaryawan->end_time . ' </td>
                    <td> ' . $AbsensiKaryawan->batas_end_time . ' </td>


                    <td class="text-center"> ' . ' 
                    <a href="/tableAbsensi/' . $AbsensiKaryawan->id  . '/edit" class="btn btn-success">Edit</a>
                    <a href="/tableAbsensi/' . $AbsensiKaryawan->id  . '/delete" class="btn btn-danger">Delete</a>
                    ' . ' </td>

                </tr>';
        }
        return response($output);
    }

    public function test()
    {
        $data = KehadiranModel::all();
        $bulanbaru = Carbon::now()->month();
        $tahunbaru = Carbon::now()->year();
        foreach ($data as $kehadiran) {
            $sakit = DB::table('logkehadiran')->whereYear('tanggal', Carbon::today()->year)->whereMonth('tanggal', Carbon::today()->month)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'sakit')->count();
            $izin = DB::table('logkehadiran')->whereYear('tanggal', Carbon::today()->year)->whereMonth('tanggal', Carbon::today()->month)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'izin')->count();
            $alpha = DB::table('logkehadiran')->whereYear('tanggal', Carbon::today()->year)->whereMonth('tanggal', Carbon::today()->month)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'alpha')->count();
            $cuti = DB::table('logkehadiran')->whereYear('tanggal', Carbon::today()->year)->whereMonth('tanggal', Carbon::today()->month)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'cuti')->count();
            $dinasluar = DB::table('logkehadiran')->whereYear('tanggal', Carbon::today()->year)->whereMonth('tanggal', Carbon::today()->month)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'dinasluar')->count();
            $terlambat = DB::table('logkehadiran')->whereYear('tanggal', Carbon::today()->year)->whereMonth('tanggal', Carbon::today()->month)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'terlambat')->count();
            $hadir = DB::table('logkehadiran')->whereYear('tanggal', Carbon::today()->year)->whereMonth('tanggal', Carbon::today()->month)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'hadir-2')->count();
            DB::table('kehadiran')->where('tahun', $tahunbaru)->where('bulan', $bulanbaru)->where('namapegawai', $kehadiran->namapegawai)
                ->update([
                    'sakit' => $sakit, 'izin' => $sakit, 'alpha' => $sakit, 'cuti' => $sakit,
                    'dinasluar' => $sakit, 'terlambat' => $sakit, 'hadir' => $sakit
                ]);
        }
    }
}
