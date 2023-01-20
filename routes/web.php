<?php

use App\Http\Controllers\HRD\JabatanController;
use App\Http\Controllers\HRD\KaryawanController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
});

//HRD
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
});
