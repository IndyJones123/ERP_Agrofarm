<?php

namespace App\Exports;

use App\Models\PayrollModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataPayroll implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PayrollModel::select('nama', 'nik', 'jabatan', 'tanggal', 'gajipokok', 'gajiharian')->get();
    }
    public function headings(): array
    {
        return ["NAMAPEGAWAI", 'NIK', 'JABATAN', 'TANGGAL', 'GAJI POKOK', 'GAJI HARIAN'];
    }
}
