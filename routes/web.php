<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\akunController;
use App\Http\Controllers\apotekerController;
use App\Http\Controllers\cetakController;
use App\Http\Controllers\detail_pembelianController;
use App\Http\Controllers\login_registerController;
use App\Http\Controllers\obatController;
use App\Http\Controllers\pembelianController;
use App\Http\Controllers\userController;

Route::get('/login',[login_registerController::class,'show_login'])->name('tampilan_login');
    Route::post('/login/auth',[login_registerController::class,'login'])->name('auth');

    Route::get('/cetaknota',[cetakController::class,'coba_cetak']);
    Route::put('/cetaknota/{id}',[cetakController::class,'cetak_nota'])->name('cetaknota');

// Route::prefix('login')->group(function(){
    
// });

// Route::post('/user/pembelian/tambah', [pembelianController::class,'tambahTransaksi'])->name('user_tambahTransaksi');
Route::group(['middleware' => 'user'], function(){

    Route::get('/user/dashboard', [userController::class,'show_dashboard'])->name('user_dashboard');
    Route::get('/user/transaksi_baru', [userController::class,'show_transaksi'])->name('user_transaksi');


    Route::post('/user/detail_pembelian/tambah', [detail_pembelianController::class,'tambahdetail'])->name('user_tambahdetail');
    Route::delete('/user/detail_pembelian/hapus/{id}', [detail_pembelianController::class,'hapusdetail'])->name('user_hapusdetail');

});
Route::get('/admin/dashboard', [AdminController::class,'show_dashboard'])->name('admin_dashboard');

Route::get('/admin/akun_pegawai', [AdminController::class,'show_akun_admin'])->name('admin_akun_pegawai');
Route::post('/admin/akun_pegawai/tambah', [akunController::class,'tambah_pegawai'])->name('tambah_akun_pegawai');
Route::put('/admin/akun_pegawai/edit/{id}', [akunController::class,'edit_pegawai'])->name('edit_akun_pegawai');
Route::delete('/admin/akun_pegawai/hapus/{id}', [akunController::class,'hapus_pegawai'])->name('hapus_akun_pegawai');

Route::get('/admin/akun_apoteker', [AdminController::class,'show_akun_apoteker'])->name('admin_akun_apoteker');
Route::post('/admin/akun_apoteker/tambah', [akunController::class,'tambah_apoteker'])->name('tambah_akun_apoteker');
Route::put('/admin/akun_apoteker/edit/{id}', [akunController::class,'edit_apoteker'])->name('edit_akun_apoteker');
Route::delete('/admin/akun_apoteker/hapus/{id}', [akunController::class,'hapus_apoteker'])->name('hapus_akun_apoteker');

Route::get('/admin/stok_tipis', [AdminController::class,'laporan_stok_tipis'])->name('admin_stok_tipis');

Route::get('/admin/pembelian_selesai', [AdminController::class,'show_pembelian_selesai'])->name('admin_pembelian_selesai');

Route::get('/admin/permintaan_pembelian', [AdminController::class,'show_permintaan_pembelian'])->name('admin_permintaan_pembelian');
Route::put('/admin/pembelian/editstatus/{id}', [pembelianController::class,'editstatus'])->name('edit_status');

Route::get('/admin/obat', [AdminController::class,'show_obat'])->name('admin_obat');
Route::post('/admin/obat/tambah', [obatController::class,'tambah'])->name('admin_tambahobat');
Route::put('/admin/obat/edit/{id}', [obatController::class,'edit'])->name('admin_editobat');
Route::delete('/admin/obat/hapus/{id}', [obatController::class,'edit'])->name('admin_hapusobat');

Route::get('/apoteker/dashboard', [apotekerController::class,'show_dashboard'])->name('apoteker_dashboard');
Route::get('/apoteker/orderan', [apotekerController::class,'show_orderan'])->name('apoteker_orderan');

Route::put('/apoteker/orderasanselesai/{id}', [apotekerController::class,'editstatus'])->name('apoteker_selesaiorderan');
Route::post('/apoteker/carapemakaian/tambah', [apotekerController::class,'tambah_pakai'])->name('tambahpakai_orderan');
