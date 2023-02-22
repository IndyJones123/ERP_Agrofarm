<?php

namespace App\Console\Commands;

use App\Models\KaryawanModel;
use App\Models\LiburModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LogDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:insert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Will Be Insert Data Log Every Day (00:00)';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = KaryawanModel::all()->where('role', 0);
        $tanggal = Carbon::now()->toDateTimeString();
        $test = Carbon::now()->toDateString();
        $tanggal = date('Y-m-d', time());
        $waktu = Carbon::now()->toTimeString();
        $weekend = Carbon::now()->isWeekend();
        foreach ($data as $karyawan) {
            $libur = DB::table('liburan')->select('holiday_date')->where('jabatan', $karyawan->jabatan)->where('holiday_date', $test)->value('$test');
            if ($karyawan->issatpam == 0) {
                if ($weekend == true || $tanggal == $libur) {
                    DB::table('logkehadiran')
                        ->insert(['namakaryawan' => $karyawan->nama, 'jabatan' => $karyawan->jabatan, 'tanggal' =>
                        $tanggal, 'absenmasuk' => $waktu, 'absenkeluar' => $waktu, 'status' => 'Libur', 'keterangan' => 'null']);
                } else {
                    DB::table('logkehadiran')
                        ->insert(['namakaryawan' => $karyawan->nama, 'jabatan' => $karyawan->jabatan, 'tanggal' =>
                        $tanggal, 'absenmasuk' => $waktu, 'absenkeluar' => $waktu, 'status' => 'BelumAbsen', 'keterangan' => 'null']);
                }
            } else {
                if ($tanggal == $libur) {
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
}
