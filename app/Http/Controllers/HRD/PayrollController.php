<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\PayrollModel;
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
        $create_payroll = [
            'id' => $id,
            'namajabatan' => $data->namajabatan,
            'minimalgaji' => $data->minimalgaji,
            'maksimalgaji' => $data->maksimalgaji,
        ];
        return view('admin/HRD/payroll/edit', $create_payroll);
    }
}
