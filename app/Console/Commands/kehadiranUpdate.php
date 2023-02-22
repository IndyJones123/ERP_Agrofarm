<?php

namespace App\Console\Commands;

use App\Models\KaryawanModel;
use App\Models\KehadiranModel;
use App\Models\KehadiranLogModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class kehadiranUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kehadiran:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Untuk Melakukan Update Setiap menit Pada Data untuk melakukan update data kehadiran';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = KehadiranModel::all();
        $bulanbaru = Carbon::now()->month;
        $tahunbaru = Carbon::now()->year;
        foreach ($data as $kehadiran) {
            $sakit = DB::table('logkehadiran')->whereYear('tanggal', $tahunbaru)->whereMonth('tanggal', $bulanbaru)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'sakit')->count();
            $izin = DB::table('logkehadiran')->whereYear('tanggal', $tahunbaru)->whereMonth('tanggal', $bulanbaru)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'izin')->count();
            $alpha = DB::table('logkehadiran')->whereYear('tanggal', $tahunbaru)->whereMonth('tanggal', $bulanbaru)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'TidakMasuk')->count();
            $cuti = DB::table('logkehadiran')->whereYear('tanggal', $tahunbaru)->whereMonth('tanggal', $bulanbaru)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'cuti')->count();
            $dinasluar = DB::table('logkehadiran')->whereYear('tanggal', $tahunbaru)->whereMonth('tanggal', $bulanbaru)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'dinasluar')->count();
            $Terlambat = DB::table('logkehadiran')->whereYear('tanggal', $tahunbaru)->whereMonth('tanggal', $bulanbaru)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'Terlambat')->count();
            $terlambats = DB::table('logkehadiran')->whereYear('tanggal', $tahunbaru)->whereMonth('tanggal', $bulanbaru)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'terlambats')->count();
            $terlambatTotal = $Terlambat + $terlambats;
            $hadir1 = DB::table('logkehadiran')->whereYear('tanggal', $tahunbaru)->whereMonth('tanggal', $bulanbaru)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'Hadir-1')->count();
            $hadir2 = DB::table('logkehadiran')->whereYear('tanggal', $tahunbaru)->whereMonth('tanggal', $bulanbaru)->where('namakaryawan', $kehadiran->namapegawai)->where('status', 'Hadir-2')->count();
            $hadirTotal = $hadir1 + $hadir2;
            DB::table('kehadiran')->where('tahun', $tahunbaru)->where('bulan', $bulanbaru)->where('namapegawai', $kehadiran->namapegawai)
                ->update([
                    'sakit' => $sakit, 'izin' => $izin, 'alpha' => $alpha, 'cuti' => $cuti,
                    'dinasluar' => $dinasluar, 'terlambat' => $terlambatTotal, 'hadir' => $hadirTotal
                ]);
        }
    }
}
