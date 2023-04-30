<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SiswaController;

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

Route::get('/', [PegawaiController::class, 'index']);


Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::post('/pegawai/create', [PegawaiController::class, 'create']);
Route::get('/pegawai/{nip}/delete',[PegawaiController::class, 'delete']);
Route::get('/pegawai/{nip}/edit', [PegawaiController::class, 'edit']);
Route::post('/pegawai/{nip}/update', [PegawaiController::class, 'update']);

Route::get('/siswa/', [SiswaController::class, 'index']);
Route::post('/siswa/create', [SiswaController::class, 'create']);
Route::get('/siswa/{nis}/delete',[SiswaController::class, 'delete']);
Route::get('/siswa/{nis}/edit', [SiswaController::class, 'edit']);
Route::post('/siswa/{nis}/update', [SiswaController::class, 'update']);
