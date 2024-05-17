<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [AdminController::class,'show_dashboard'])->name('admin_dashboard');

Route::get('/admin/obat', [AdminController::class,'show_obat'])->name('admin_obat');
