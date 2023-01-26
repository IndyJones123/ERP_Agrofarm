<?php

use App\Http\Controllers\HRD\JabatanController;
use App\Http\Controllers\HRD\KaryawanController;
use App\Http\Controllers\HRD\AbsensiController;
use App\Http\Controllers\HRD\KehadiranController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HRD\LiburController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingpageController;

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

Route::middleware('auth', 'isAdmin')->group(function () {
    //jabatan
    Route::get('/home', [HomeController::class, 'index']);
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
    //Absensi
    Route::get('/tableAbsensi', [AbsensiController::class, 'index']);
    Route::get('/tableAbsensi/create', [AbsensiController::class, 'create_Absensi']);
    Route::post('/tableAbsensi/create/store', [AbsensiController::class, 'store']);
    Route::get('/tableAbsensi/{id}/edit', [AbsensiController::class, 'edit']);
    Route::put('/tableAbsensi/{id}', [AbsensiController::class, 'update']);
    Route::delete('/tableAbsensi/{id}', [AbsensiController::class, 'delete']);
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
});

//HRD
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
});

Route::get('/landingpage', [LandingpageController::class, 'index']);

Route::get('/landingpage/detail1', [LandingpageController::class, 'detail1']);