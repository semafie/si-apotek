<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\pembelianModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class apotekerController extends Controller
{
    public function show_dashboard(){
        return view('apoteker.layout.dashboard',[
            'title' => 'Dashboard Apoteker'
        ]);
    }

    public function show_orderan(){
        $pembelian = pembelianModel::where('status' , 'menunggu apoteker')->get();
        $detail_pembelian = detail_pembelianModel::all();
        return view('apoteker.layout.orderan_obat',[
            'title' => 'Orderan Obat',
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian
        ]);
    }

    public function tambah_pakai(Request $request){
        $detail_pembelian = detail_pembelianModel::findorFAil($request->id);

        $detail_pembelian->keterangan = $request->keterangan;

        $detail_pembelian->save();
        return redirect()->route('apoteker_orderan');
    }

    public function editstatus(Request $request , $id){
        $pembelian = pembelianModel::findorFAil($id);

        $pembelian->status = $request->status;

        $pembelian->save();
        return redirect()->route('apoteker_orderan')->with(Session::flash('berhasil_edit', true));
    }


}
