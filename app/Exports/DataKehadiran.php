<?php

namespace App\Exports;

use App\Models\KehadiranModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataKehadiran implements FromCollection, WithHeadings
{
    /**0
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return KehadiranModel::select('namapegawai', 'bulan', 'tahun', 'nik', 'jabatan', 'sakit', 'izin', 'alpha', 'cuti', 'dinasluar', 'terlambat', 'hadir')->get();
    }
    public function headings(): array
    {
        return ["NAMAPEGAWAI", 'BULAN', 'TAHUN', 'NIK', 'JABATAN', 'SAKIT', 'IZIN', 'ALPHA', 'CUTI', 'DINASLUAR', 'TERLAMBAT', 'HADIR'];
    }
}
