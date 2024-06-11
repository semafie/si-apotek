<?php

namespace App\Http\Controllers;

use App\Models\obatModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class obatController extends Controller
{
    public function tambah(Request $request){

        // dd($request->all());

        $halo = [
            'nama_obat' => 'required',
            'harga_obat' => 'required',
            'jumlah_stok' => 'required',
        ];

        $validasi = Validator::make($request->all(), $halo);

        // Jika validasi gagal
        if ($validasi->fails()) {
            return redirect()->route('admin_obat')->with(Session::flash('kosong_tambah', true));
        }

        $obat = obatModel::create([
            'nama_obat' => $request->nama_obat,
            'harga_obat' => $request->harga_obat,
            'jumlah_stok' => $request->jumlah_stok,
        ]);


        if ($obat) {
            return redirect()->route('admin_obat')->with(Session::flash('berhasil_tambah', true));
            
        } else {
            return redirect()->route('admin_obat')->with(Session::flash('gagal_tambah', true));
        }
    }

    public function edit(Request $request, $id){
        $obat = obatModel::findorFAil($id);

        
        $obat->nama_obat = $request->input('nama_obat');
        $obat->harga_obat = $request->input('harga_obat');
        $obat->jumlah_stok = $request->input('jumlah_stok');
        
        $obat->save();

        return redirect()->route('admin_obat')->with(Session::flash('berhasil_edit', true));
    }

    public function hapus(Request $request, $id){
        $obat = obatModel::findorFAil($id);

        $obat->delete();

        return redirect()->route('admin_obat')->with(Session::flash('berhasil_hapus', true));
    }
}
