<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\PayrollModel;
use App\Models\JabatanModel;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        $data = PayrollModel::all();

        return View('admin/HRD/payroll/payroll', compact(["data"]));
    }

    public function edit($id)
    {
        $data = PayrollModel::find($id);
        $data2 = JabatanModel::all();
        $create_payroll = [
            'id' => $id,
            'nama' => $data->nama,
            'nik' => $data->nik,
            'jabatan' => $data->jabatan,
            'gajipokok' => $data->gajipokok,
            'gajiharian' => $data->gajiharian,
        ];
        return view('admin/HRD/payroll/editPayroll', $create_payroll)->with(compact(['data2']));
    }
    public function delete($id)
    {
        $data = PayrollModel::find($id);
        $data->delete();
        return back();
    }
}
