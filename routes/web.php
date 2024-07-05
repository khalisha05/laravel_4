<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;

Route ::get('/jabatan', [JabatanController::class,'index']);
Route ::get('/insertjabatan', [JabatanController::class,'create']);
Route ::post('/savejabatan', [JabatanController::class,'store']);
Route ::get('/editjabatan/{id}', [JabatanController::class,'edit']);
Route ::put('/updatejabatan/{id}', [JabatanController::class,'update']);
Route ::get('/deletejabatan/{id}', [JabatanController::class,'destroy']);

Route ::get('/karyawan', [KaryawanController::class,'index']);
Route ::get('/insertkaryawan', [KaryawanController::class,'create']);
Route ::post('/savekaryawan', [KaryawanController::class,'store']);
Route ::get('/editkaryawan/{id}', [KaryawanController::class,'edit']);
Route ::put('/updatekaryawan/{id}', [KaryawanController::class,'update']);
Route ::get('/deletekaryawan/{id}', [KaryawanController::class,'destroy']);
