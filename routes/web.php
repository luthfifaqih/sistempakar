<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MasterIdentiController;
use App\Http\Controllers\MasterJenisController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\UserController;
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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

//Register
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    //Role Pakar
    Route::group(['middleware' => ['cek_login:pakar']], function () {
        //Master Jenis Serangan
        Route::get('master_jenis', [MasterJenisController::class, 'index'])->name('master_jenis.index')->withoutMiddleware('cek_login:admin');
        Route::post('master_jenis', [MasterJenisController::class, 'store'])->name('master_jenis.store');
        Route::get('master_jenis/form', [MasterJenisController::class, 'create'])->name('master_jenis.create');
        Route::get('master_jenis/{id}', [MasterJenisController::class, 'edit'])->name('master_jenis.edit');
        Route::put('master_jenis/{id}', [MasterJenisController::class, 'update'])->name('master_jenis.update');
        Route::delete('master_jenis/{id}', [MasterJenisController::class, 'delete'])->name('master_jenis.delete');

        //Master Identifikasi
        Route::get('master_identi', [MasterIdentiController::class, 'index'])->name('master_identi.index');
        Route::post('master_identi', [MasterIdentiController::class, 'store'])->name('master_identi.store');
        Route::get('master_identi/form', [MasterIdentiController::class, 'create'])->name('master_identi.create');
        Route::get('master_identi/{id}', [MasterIdentiController::class, 'edit'])->name('master_identi.edit');
        Route::put('master_identi/{id}', [MasterIdentiController::class, 'update'])->name('master_identi.update');
        Route::delete('master_identi/{id}', [MasterIdentiController::class, 'delete'])->name('master_identi.delete');

        //Transaksi Rule
        Route::get('t_rule', [RuleController::class, 'index'])->name('t_rule.index');
        Route::post('t_rule', [RuleController::class, 'store'])->name('t_rule.store');
        Route::get('t_rule/form', [RuleController::class, 'create'])->name('t_rule.create');
        Route::get('t_rule/{id}', [RuleController::class, 'edit'])->name('t_rule.edit');
        Route::put('t_rule/{id}', [RuleController::class, 'update'])->name('t_rule.update');
        Route::delete('t_rule/{id}', [RuleController::class, 'delete'])->name('t_rule.delete');

        //Transaksi Diagnosis
        Route::get('hasil-diagnosis', [DiagnosisController::class, 'hasilDiagnosis'])->name('diagnosis.hasil');
    });

    //Role admin
    Route::group(['middleware' => ['cek_login:admin']], function () {
        Route::resource('users', UserController::class);
    });
    //Role Guest
    Route::get('diagnosis', [DiagnosisController::class, 'index'])->name('diagnosis.index');
    Route::get('outputDiagnosis', [DiagnosisController::class, 'output'])->name('diagnosis.output');
    Route::post('prosesDiagnosis', [DiagnosisController::class, 'prosesDiagnosis'])->name('diagnosis.prosesDiagnosis');
    Route::get('informasi', [InformasiController::class, 'index'])->name('informasi.index');

    Route::get('konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi');
    Route::get('konsultasi/tambah', [KonsultasiController::class, 'create'])->name('konsultasi.create');
    Route::post('konsultasi/tambah', [KonsultasiController::class, 'store'])->name('konsultasi.store');
    Route::get('konsultasi/detail/{id}', [KonsultasiController::class, 'detail'])->name('konsultasi.detail');
    Route::put('konsultasi/update/{id}', [KonsultasiController::class, 'update'])->name('konsultasi.update');
    Route::delete('konsultasi/delete/{id}', [KonsultasiController::class, 'delete'])->name('konsultasi.delete');
});
