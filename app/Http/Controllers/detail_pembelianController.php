<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\pembelianModel;
use Illuminate\Http\Request;

class detail_pembelianController extends Controller
{
    public function tambahdetail(Request $request ){
        // Validasi data yang diterima
    $validatedData = $request->validate([
        'id_obat' => 'required',
        'nama_obat' => 'required',
        'harga_obat' => 'required',
        'jumlah_stok' => 'required',
        'sub_total' => 'required',
    ]);

    // Dapatkan pembelian terbaru
    $pembelian = pembelianModel::latest()->first();

    // Buat instance model DetailPembelian
    
    
    
    
    if ($pembelian === null) {
        $detail = detail_pembelianModel::where('id_pembelian', 1)->where('id_obat', $validatedData['id_obat'])->first();
        // dd($detail);
        if($detail == null){
            $detailPembelian = new detail_pembelianModel();

    // Isi model dengan data yang diterima
    $detailPembelian->id_obat = $validatedData['id_obat'];
    $detailPembelian->nama_obat = $validatedData['nama_obat'];
    $detailPembelian->harga_obat = $validatedData['harga_obat'];
    $detailPembelian->jumlah_stok = $validatedData['jumlah_stok'];
    $detailPembelian->sub_total = $validatedData['sub_total'];
        $detailPembelian->id_pembelian = 1;
        $detailPembelian->save();
        } else{
            $caridetailPembelian = detail_pembelianModel::findOrFail($detail->id);
            
            $caridetailPembelian->jumlah_stok = $validatedData['jumlah_stok'];
            $caridetailPembelian->sub_total = $validatedData['sub_total'];

            $caridetailPembelian->save();
        }
        
    } else {
        $detail_terakhir = detail_pembelianModel::where('id_pembelian', $pembelian->id + 1)->where('id_obat', $validatedData['id_obat'])->first();
        if($detail_terakhir == null){
        $detailPembelian = new detail_pembelianModel();

    // Isi model dengan data yang diterima
    $detailPembelian->id_obat = $validatedData['id_obat'];
    $detailPembelian->nama_obat = $validatedData['nama_obat'];
    $detailPembelian->harga_obat = $validatedData['harga_obat'];
    $detailPembelian->jumlah_stok = $validatedData['jumlah_stok'];
    $detailPembelian->sub_total = $validatedData['sub_total'];
        $detailPembelian->id_pembelian = 1;
        $detailPembelian->id_pembelian = $pembelian->id + 1;
        $detailPembelian->save();
        } else{
            $carisdetailPembelian = detail_pembelianModel::findOrFail($detail_terakhir->id);
            
            $carisdetailPembelian->jumlah_stok = $validatedData['jumlah_stok'];
            $carisdetailPembelian->sub_total = $validatedData['sub_total'];

            $carisdetailPembelian->save();
        }
    }
    
    

    // Simpan data ke dalam database
    

    // Redirect ke route yang ditentukan
    return redirect()->route('user_transaksi');
        
        
    }

    public function hapusdetail(Request $request, $id){
        $detailPembelian = detail_pembelianModel::findorFAil($id);

        $detailPembelian->delete();
        return redirect()->route('user_transaksi');
    }
}
