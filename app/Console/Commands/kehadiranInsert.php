<?php

namespace App\Console\Commands;

use App\Models\KehadiranModel;
use App\Models\KaryawanModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class kehadiranInsert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kehadiran:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Untuk Melakukan Insert Data Kehadiran Karyawan Baru setiap Awal Bulan';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = KaryawanModel::all()->where('role', 0);
        $bulanbaru = Carbon::now()->month;
        $tahunbaru = Carbon::now()->year;
        foreach ($data as $karyawan) {
            DB::table('kehadiran')
                ->insert([
                    'namapegawai' => $karyawan->nama, 'bulan' => $bulanbaru, 'tahun' => $tahunbaru, 'nik' =>
                    $karyawan->nik, 'jabatan' => $karyawan->jabatan, 'sakit' => '0', 'izin' => '0', 'alpha' => '0', 'cuti' => '0',
                    'dinasluar' => '0', 'terlambat' => '0', 'hadir' => '0'
                ]);
        }
    }
}
