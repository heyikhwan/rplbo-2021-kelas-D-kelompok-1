<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LegalisirController;
use App\Http\Controllers\PermintaanLegalisirController;
use App\Http\Controllers\PermintaanSuratController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteGroup;
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

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Kelola User
    Route::group(['middleware' => ['role:Staff Tata Usaha']], function() {
        Route::get('/kelola-user', [UserController::class, 'index'])->name('user.index');
        Route::get('/kelola-user/tambah', [UserController::class, 'create'])->name('user.create');
        Route::post('/kelola-user/tambah', [UserController::class, 'store'])->name('user.store');
        Route::get('/kelola-user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/kelola-user/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/kelola-user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    // Pengajuan Surat
    Route::group(['middleware' => ['role:Siswa']], function() {
        Route::get('/pengajuan/surat', [SuratController::class, 'create'])->name('pengajuan-surat.create');
        Route::post('/pengajuan/surat', [SuratController::class, 'store'])->name('pengajuan-surat.store');
    });

    // Pengajuan Legalisir
    Route::group(['middleware' => ['role:Alumni']], function() {
        Route::get('/pengajuan/legalisir', [LegalisirController::class, 'create'])->name('pengajuan-legalisir.create');
        Route::post('/pengajuan/legalisir', [LegalisirController::class, 'store'])->name('pengajuan-legalisir.store'); 
    });

    // Permintaan Surat
    Route::group(['middleware' => ['role:Resepsionis|Staff Tata Usaha|Kepala Tata Usaha|Kepala Sekolah']], function() {
        Route::get('/permintaan/surat', [PermintaanSuratController::class, 'index'])->name('permintaan-surat.index');

        Route::put('/permintaan/surat/resepsionis-acc/{id}', [PermintaanSuratController::class, 'accLetter'])->name('resepsionis.accLetter');
        Route::put('/permintaan/surat/resepsionis-reject/{id}', [PermintaanSuratController::class, 'rejectLetter'])->name('resepsionis.rejectLetter');
        Route::put('/permintaan/surat/resepsionis-complete/{id}', [PermintaanSuratController::class, 'completeSubmission'])->name('resepsionis.surat.complete');

        Route::put('/permintaan/surat/ktu-acc/{id}', [PermintaanSuratController::class, 'ktuAccLetter'])->name('ktu.ktuAccLetter');

        Route::put('/permintaan/surat/dispotition/{id}', [PermintaanSuratController::class, 'updateDisposition'])->name('dispotition.update');

        Route::put('/permintaan/surat/ks-revisi/{id}', [PermintaanSuratController::class, 'revisi'])->name('ks.revisi');
        Route::put('/permintaan/surat/ks-batalkan/{id}', [PermintaanSuratController::class, 'batalkan'])->name('ks.batalkan');
    });

    // Permintaan Legalisir
    Route::group(['middleware' => ['role:Resepsionis|Staff Tata Usaha|Kepala Tata Usaha|Kepala Sekolah']], function() {
        Route::get('/permintaan/legalisir', [PermintaanLegalisirController::class, 'index'])->name('permintaan-legalisir.index');

        Route::put('/permintaan/legalisir/resepsionis-acc/{id}', [PermintaanLegalisirController::class, 'accLegalization'])->name('resepsionis.accLegalization');
        Route::put('/permintaan/legalisir/resepsionis-reject/{id}', [PermintaanLegalisirController::class, 'rejectLegalization'])->name('resepsionis.rejectLegalization');
        Route::put('/permintaan/legalisir/resepsionis-complete/{id}', [PermintaanLegalisirController::class, 'completeSubmission'])->name('resepsionis.legalisir.complete');
        
        Route::put('/permintaan/legalisir/ktu-acc/{id}', [PermintaanLegalisirController::class, 'ktuAccLegalization'])->name('ktu.ktuAccLegalization');

        Route::put('/permintaan/legalisir/dispotition/{id}', [PermintaanLegalisirController::class, 'updateDisposition'])->name('dispotition.legalisir.update');
        Route::put('/permintaan/legalisir/ks-batalkan/{id}', [PermintaanLegalisirController::class, 'batalkan'])->name('ks.legalisir.batalkan');
    });

    // Lacak Riwayat
    Route::group(['middleware' => ['role:Siswa|Alumni']], function() {
        Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
    });
});

Auth::routes();