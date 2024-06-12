<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\obatModel;
use App\Models\pembelianModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show_dashboard(){

        $currentDate = Carbon::now();
        
        // Format tanggal jika diperlukan (misalnya: Y-m-d)
        $formattedDate = $currentDate->format('Y-m-d');
        $obat = detail_pembelianModel::orderBy('id', 'desc')->limit(5)->get();
        $banyakorderhariini = pembelianModel::where('tanggal', $formattedDate )->count();
        $banyakorder = pembelianModel::count();

        $pemasukan = pembelianModel::where('tanggal' , $formattedDate)->sum('total_harga');
        $pemasukansemua = pembelianModel::sum('total_harga');
        return view('admin.layout.admin_dashboard',[
            'title' => 'Dashboard',
            'getRecord' => User::find(Auth::user()->id),
            'banyakorder' => $banyakorder,
            'orderhariini' => $banyakorderhariini,
            'obat' => $obat,
            'pemasukansemua' => $pemasukansemua,
            'pemasukan' => $pemasukan,
        ]);
    }

    public function show_obat(){
        $obat = obatModel::all();
        return view('admin.layout.obat',[
            'title' => 'Data Obat',
            'obat' => $obat,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_permintaan_pembelian(){
        $pembelian = pembelianModel::where('status' , 'menunggu admin')->get();
        $detail_pembelian = detail_pembelianModel::all();
        return view('admin.layout.permintaan_pembelian',[
            'title' => 'Data Obat',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_pembelian_selesai(){
        $pembelian = pembelianModel::where('status' , 'selesai')->get();
        $detail_pembelian = detail_pembelianModel::all();
        return view('admin.layout.print_nota',[
            'title' => 'Data Obat',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_penjualan(){
        $pembelian = pembelianModel::where('status' , 'selesai')->get();
        $detail_pembelian = detail_pembelianModel::all();
        return view('admin.layout.penjualan',[
            'title' => 'Data Obat',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function laporan_stok_tipis(){
        $obat = obatModel::where('jumlah_stok','<', 5 )->get();
        return view('admin.layout.laporan_stok_tipis',[
            'title' => 'Laporan Stok Tipis',
            'obat' => $obat,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_akun_admin(){
        $user = User::where('role' , 'admin_kasir')->get();
        return view('admin.layout.akun_admin',[
            'title' => 'akun Pegawai Farmasi',
            'user'=> $user,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_akun_apoteker(){
        $user = User::where('role' , 'apoteker')->get();
        return view('admin.layout.akun_apoteker',[
            'title' => 'akun Pegawai Farmasi',
            'user'=> $user,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }
}
