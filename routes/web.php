<?php

use App\Http\Controllers\HRD\JabatanController;
use App\Http\Controllers\HRD\KaryawanController;
use App\Http\Controllers\HRD\AbsensiController;
use App\Http\Controllers\HRD\KehadiranLogController;
use App\Http\Controllers\HRD\KehadiranController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HRD\LiburController;
use App\Http\Controllers\Karyawan\HomeKaryawanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\PermohonanDinasluarController;
use App\Http\Controllers\PermohonanKeluarController;
use App\Http\Controllers\TerlambatController;
use App\Models\Permohonan_dinasluar;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['verify' => true]);

//midleware admin
Route::middleware('auth', 'isAdmin')->group(function () {
    //jabatan
    Route::get('/home', [HomeController::class, 'hakakses']);
    Route::get('/tablejabatan', [JabatanController::class, 'index']);
    Route::get('/tablejabatan/create', [JabatanController::class, 'create_jabatan']);
    Route::post('/tablejabatan/create/store', [JabatanController::class, 'store']);
    Route::get('/tablejabatan/{id}/edit', [JabatanController::class, 'edit']);
    Route::put('/tablejabatan/{id}', [JabatanController::class, 'update']);
    Route::delete('/tablejabatan/{id}', [JabatanController::class, 'delete']);
    //karyawan
    Route::get('/tablekaryawan', [KaryawanController::class, 'index']);
    Route::get('/tablekaryawan/create', [KaryawanController::class, 'create_karyawan']);
    Route::post('/tablekaryawan/create/store', [KaryawanController::class, 'store']);
    Route::get('/tablekaryawan/{id}/edit', [KaryawanController::class, 'edit']);
    Route::put('/tablekaryawan/{id}', [KaryawanController::class, 'update']);
    Route::delete('/tablekaryawan/{id}', [KaryawanController::class, 'delete']);
    //Export Karyawan
    Route::get('/karyawanExport', [KaryawanController::class, 'export']);
    //Import Karyawan
    Route::post('/karyawanImport', [KaryawanController::class, 'import']);
    //Absensi
    Route::get('/tableAbsensi', [AbsensiController::class, 'index']);
    Route::get('/tableAbsensi/create', [AbsensiController::class, 'create_Absensi']);
    Route::post('/tableAbsensi/create/store', [AbsensiController::class, 'store']);
    Route::get('/tableAbsensi/{id}/edit', [AbsensiController::class, 'edit']);
    Route::put('/tableAbsensi/{id}', [AbsensiController::class, 'update']);
    Route::delete('/tableAbsensi/{id}', [AbsensiController::class, 'delete']);
    Route::get('/tableAbsensi/{id}/delete', [AbsensiController::class, 'delete']);
    Route::get('/tableAbsensi/search', [AbsensiController::class, 'search']);
    //Libur
    Route::get('/tableLiburan', [LiburController::class, 'index']);
    Route::get('/tableLiburan/create', [LiburController::class, 'create_Liburan']);
    Route::post('/tableLiburan/create/store', [LiburController::class, 'store']);
    Route::get('/tableLiburan/{id}/edit', [LiburController::class, 'edit']);
    Route::put('/tableLiburan/{id}', [LiburController::class, 'update']);
    Route::delete('/tableLiburan/{id}', [LiburController::class, 'delete']);

    //Kehadiran
    Route::get('/tableKehadiran', [KehadiranController::class, 'index']);
    Route::get('/tableKehadiran/create', [KehadiranController::class, 'create_Kehadiran']);
    Route::post('/tableKehadiran/create/store', [KehadiranController::class, 'store']);
    Route::get('/tableKehadiran/{id}/edit', [KehadiranController::class, 'edit']);
    Route::put('/tableKehadiran/{id}', [KehadiranController::class, 'update']);
    Route::delete('/tableKehadiran/{id}', [KehadiranController::class, 'delete']);
    //Export KehadiranData
    Route::get('/exportkehadiran', [KehadiranController::class, 'export']);

    //LogKehadiran
    Route::get('/tableLogKehadiran', [KehadiranLogController::class, 'index']);
    Route::get('/tableLogKehadiran/create', [KehadiranLogController::class, 'create_Kehadiran']);
    Route::get('/tableLogKehadiran/{id}/edit', [KehadiranLogController::class, 'edit']);
    Route::put('/tableLogKehadiran/{id}', [KehadiranLogController::class, 'update']);
    Route::delete('/tableLogKehadiran/{id}', [KehadiranLogController::class, 'delete']);
    //Export KehadiranLogData
    Route::get('/exportlog', [KehadiranLogController::class, 'export']);

    //Perizinan
    //Keterlambatan
    Route::get('/terlambatAdmin', [TerlambatController::class, 'admin']);
    Route::get('/tableTerlambat/{id}/{pegawai}/edit', [TerlambatController::class, 'edit']);
    Route::put('/tableTerlambat/{id}', [TerlambatController::class, 'update']);
    Route::get('/pdfterlambat/{id}', [TerlambatController::class, 'pdfterlambat']);

    //
});

//HRD
Route::get('/erp', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//midleware Karyawan
Route::middleware('auth', 'isKaryawan')->group(function () {
    Route::get('/karyawan', [HomeKaryawanController::class, 'index']);
    Route::get('/karyawan/absensi/{long2}/{lat2}', [HomeKaryawanController::class, 'absen']);
    Route::post('/tableLogKehadiran/create/store', [KehadiranLogController::class, 'store']);
    //Insert log kehadiran
    Route::post('/tableLogKehadiranSakit/create/store', [KehadiranLogController::class, 'store2']);
    //absen Pulang Kerja
    Route::put('/tableLogKehadiran2/{tanggal}', [KehadiranLogController::class, 'update2']);
    //absen Mulai Kerja
    Route::put('/tableLogKehadiran3/{tanggal}', [KehadiranLogController::class, 'update3']);
    //FormSakit
    Route::get('/sakit', [HomeKaryawanController::class, 'sakit']);
    //FormIzin
    Route::get('/izin', [HomeKaryawanController::class, 'izin']);
    //FormDinasLuar
    Route::get('/dinasluar', [HomeKaryawanController::class, 'dinasluar']);
    //FormCuti
    Route::get('/cuti', [HomeKaryawanController::class, 'cuti']);
    //FormPermohonanTerlambat
    Route::get('/terlambat', [TerlambatController::class, 'index']);
    Route::post('/terlambat/store', [TerlambatController::class, 'store']);
    //FormPermohonanKeluar
    Route::get('/keluar', [PermohonanKeluarController::class, 'index']);
    Route::post('/keluar/store', [PermohonanKeluarController::class, 'store']);
    //FormPermohonanKeluar
    Route::get('/permohonandinasluar', [PermohonanDinasluarController::class, 'index']);
    Route::post('/permohonandinasluar/store', [Permohonan_dinasluar::class, 'store']);
});

Route::get('/', [LandingpageController::class, 'index']);

Route::get('/landingpage/detail1', [LandingpageController::class, 'detail1']);

Route::get('/guest', [HomeController::class, 'guest']);

Route::get('/checksurat', [HomeController::class, 'checksurat']);

Route::get('/profile', [HomeController::class, 'profile']);

Route::get('/test', [AbsensiController::class, 'test']);
