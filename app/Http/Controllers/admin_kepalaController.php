<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\obatModel;
use App\Models\pembelianModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin_kepalaController extends Controller
{
    public function show_dashboard(){

        $pemasukanHariIni = pembelianModel::whereDate('tanggal', Carbon::today())->sum('total_harga');

// Total pemasukan bulan ini
$pemasukanBulanIni = pembelianModel::whereMonth('tanggal', Carbon::now()->month)
    ->whereYear('tanggal', Carbon::now()->year)
    ->sum('total_harga');

// Total pemasukan tahun ini
$pemasukanTahunIni = pembelianModel::whereYear('tanggal', Carbon::now()->year)->sum('total_harga');
    return view('admin_kepala.layout.dashboard',[
            'title' => 'Dashboard Pemilik',
            'getRecord' => User::find(Auth::user()->id),
            'hariini' => $pemasukanHariIni,
            'bulanini' => $pemasukanBulanIni,
            'tahunini' => $pemasukanTahunIni,
        ]);
    }

    public function show_penjualan(){
        $pembelian = pembelianModel::where('status' , 'selesai')->get();
        $detail_pembelian = detail_pembelianModel::all();
        return view('admin_kepala.layout.penjualan',[
            'title' => 'Data Obat',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function laporan_stok_tipis(){
        $obat = obatModel::where('jumlah_stok','<', 5 )->get();
        return view('admin_kepala.layout.laporan_stok_tipis',[
            'title' => 'Laporan Stok Tipis',
            'obat' => $obat,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_akun_admin(){
        $user = User::where('role' , 'admin_kasir')->get();
        return view('admin_kepala.layout.akun_admin',[
            'title' => 'akun Pegawai Farmasi',
            'user'=> $user,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_akun_apoteker(){
        $user = User::where('role' , 'apoteker')->get();
        return view('admin_kepala.layout.akun_apoteker',[
            'title' => 'akun Pegawai Farmasi',
            'user'=> $user,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }
}
