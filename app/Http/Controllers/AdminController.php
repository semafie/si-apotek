<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\obatModel;
use App\Models\pembelianModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show_dashboard(){
        return view('admin.layout.admin_dashboard',[
            'title' => 'Dashboard',
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_obat(){
        $obat = obatModel::all();
        return view('admin.layout.obat',[
            'title' => 'Data Obat',
            'obat' => $obat
        ]);
    }

    public function show_permintaan_pembelian(){
        $pembelian = pembelianModel::where('status' , 'menunggu admin')->get();
        $detail_pembelian = detail_pembelianModel::all();
        return view('admin.layout.permintaan_pembelian',[
            'title' => 'Data Obat',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian
        ]);
    }

    public function show_pembelian_selesai(){
        $pembelian = pembelianModel::where('status' , 'selesai')->get();
        $detail_pembelian = detail_pembelianModel::all();
        return view('admin.layout.print_nota',[
            'title' => 'Data Obat',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian
        ]);
    }

    public function laporan_stok_tipis(){
        $obat = obatModel::where('jumlah_stok','<', 5 )->get();
        return view('admin.layout.laporan_stok_tipis',[
            'title' => 'Laporan Stok Tipis',
            'obat' => $obat
        ]);
    }

    public function show_akun_admin(){
        $user = User::where('role' , 'admin_kasir')->get();
        return view('admin.layout.akun_admin',[
            'title' => 'akun Pegawai Farmasi',
            'user'=> $user
        ]);
    }

    public function show_akun_apoteker(){
        $user = User::where('role' , 'apoteker')->get();
        return view('admin.layout.akun_apoteker',[
            'title' => 'akun Pegawai Farmasi',
            'user'=> $user
        ]);
    }
}
