<?php

namespace App\Console\Commands;

use App\Models\KaryawanModel;
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
        $data = KaryawanModel::all();
        $tanggal = Carbon::now()->toDateTimeString();
        $tanggal = date('Y-m-d', time());
        $waktu = Carbon::now()->toTimeString();
        foreach ($data as $karyawan) {
            DB::table('logkehadiran')
                ->insert(['namakaryawan' => $karyawan->nama, 'jabatan' => $karyawan->jabatan, 'tanggal' =>
                $tanggal, 'absenmasuk' => $waktu, 'absenkeluar' => $waktu, 'status' => 'BelumAbsen', 'keterangan' => 'null']);
        }
    }
}
