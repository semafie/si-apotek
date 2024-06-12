<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\obatModel;
use App\Models\pembelianModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{

    
    public function show_dashboard(){
        return view('user.layout.dashboard',[
            'title' => 'Dashboard konsumen',
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }

    public function show_transaksi(){
        $pembelian = pembelianModel::latest()->first();
        $newIdPembelian = $pembelian ? $pembelian->id + 1 : 1;

    // Dapatkan detail_pembelian dengan id_pembelian yang baru
    $detail_pembelian = detail_pembelianModel::where('id_pembelian', $newIdPembelian)->get();
        $obat = obatModel::all();
        return view('user.layout.transaksi_baru',[
            'title' => 'Dashboard konsumen',
            'obat' => $obat,
            'detail_pembelian' => $detail_pembelian,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }
    public function show_riwayat(){
        $pembelian = pembelianModel::where('status' , 'selesai')->get();
        $detail_pembelian = detail_pembelianModel::all();
        return view('user.layout.riwayat_transasksi',[
            'title' => 'Data Obat',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian,
            'getRecord' => User::find(Auth::user()->id),
        ]);
    }
    
}
