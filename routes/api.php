<?php

use App\Http\Controllers\pembelianController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/user/pembelian/tambah', [pembelianController::class,'tambahTransaksi'])->name('user_tambahTransaksi');
