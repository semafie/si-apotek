<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\pembelianModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Midtrans\Config;

class pembelianController extends Controller
{
    
    public function tambahTransaksi(Request $request)
    {

        $user = User::findorFAil($request->id_user);

        // dd($request->all());
        // dd($user->id);
        $current_time = Carbon::now()->format('H:i:s');

        $obat = pembelianModel::create([
            'tanggal' => $request->tanggal,
            'jam' => $current_time,
            'total_harga' => $request->total_harga,
            'id_user' => $user->id,
            'status' => 'menunggu admin',
            'keterangan' => 'sudah dibayar'
        ]);

        $pembelian = pembelianModel::latest()->first();


        $detail_pembelian = detail_pembelianModel::where('id_pembelian', $pembelian->id)->get();
        // dd($detail_pembelian);
        // $user = User::find(Auth::user()->id);

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $items = [];
        $totalHarga = 0;
    foreach ($detail_pembelian as $detail) {
        $items[] = [
            'id' => $detail->id_obat,
            'price' => (int)$detail->harga_obat,
            'quantity' => (int)$detail->jumlah_stok,
            'name' => $detail->nama_obat
        ];
        $totalHarga += (int) $detail->harga_obat * (int) $detail->jumlah_stok;
        
    }

    // dd($totalHarga);
    
    $params = array(
        'transaction_details' => array(
            'order_id' => rand(),
            'gross_amount' => $request->total_harga,
        ),
        'item_details' => $items,
        'customer_details' => array(
            'first_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->no_telp,
        ),
    );
        // return redirect()->route('/user/transaksi_baru');
    try {
        // Dapatkan token Snap dari Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return response()->json(['snap_token' => $snapToken]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }

        

        

        /*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php
                              
Alternatively, if you are not using **Composer**, you can download midtrans-php library 
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
the file manually.   

require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */

//SAMPLE REQUEST START HERE

// Set your Merchant Server Key
// Midtrans\Config::$serverKey = 'YOUR_SERVER_KEY';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
//Midtrans\Config::$isProduction = false;
// Set sanitization on (default)//Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
//Midtrans\Config::$is3ds = true;


// if($obat){
//     return redirect()->route('user_transaksi')->with(Session::flash('berhasil_tambah', true));
// } else{
//     return redirect()->route('user_transaksi')->with(Session::flash('gagal_tambah', true));
// }

// $snapToken = \Midtrans\Snap::getSnapToken($params);
    }
    public function editstatus(Request $request , $id){
        $pembelian = pembelianModel::findorFAil($id);

        $pembelian->status = $request->status;

        $pembelian->save();
        return redirect()->route('admin_permintaan_pembelian')->with(Session::flash('berhasil_edit', true));
    }
}
