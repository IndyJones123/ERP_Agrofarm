<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\LiburModel;
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
        $bulan = Carbon::now()->month;

        $data = KehadiranModel::all()->where('bulan', $bulan);

        $tanggal = Carbon::now()->toDateString();

        foreach ($data as $payroll) {
            $gajipokok = DB::table('jabatan')->select('gajipokok')->where('namajabatan', $payroll->jabatan)->value('$test');
            $gajiharian = DB::table('jabatan')->select('gajiharian')->where('namajabatan', $payroll->jabatan)->value('$test');
            DB::table('payrollkaryawan')
                ->insert([
                    'nama' => $payroll->namapegawai, 'nik' => $payroll->nik, 'jabatan' => $payroll->jabatan, 'tanggal' => $tanggal, 'gajipokok' =>
                    $gajipokok, 'gajiharian' => $gajiharian * ($payroll->hadir + $payroll->dinasluar)
                ]);
        }





        $test = Carbon::now()->toDateString();
        $libur = DB::table('liburan')->select('holiday_date')->where('jabatan', 'null')->where('holiday_date', $test)->value('$test');
        $data = KaryawanModel::all();
        $tanggal = Carbon::now()->toDateTimeString();
        $tanggal2 = Carbon::now()->toDateTimeString();
        $tanggal = date('Y-m-d', time());
        $waktu = Carbon::now()->toTimeString();
        $weekend = Carbon::now()->isWeekend();
        foreach ($data as $karyawan) {

            if ($weekend == true || $tanggal == $libur) {
                DB::table('logkehadiran')
                    ->insert(['namakaryawan' => $karyawan->nama, 'jabatan' => $karyawan->jabatan, 'tanggal' =>
                    $tanggal, 'absenmasuk' => $waktu, 'absenkeluar' => $waktu, 'status' => 'Libur', 'keterangan' => 'null']);
            } else {
                DB::table('logkehadiran')
                    ->insert(['namakaryawan' => $karyawan->nama, 'jabatan' => $karyawan->jabatan, 'tanggal' =>
                    $tanggal, 'absenmasuk' => $waktu, 'absenkeluar' => $waktu, 'status' => 'BelumAbsen', 'keterangan' => 'null']);
            }
        }
    }
}
