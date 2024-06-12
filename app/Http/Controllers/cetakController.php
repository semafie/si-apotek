<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelianModel;
use App\Models\obatModel;
use App\Models\pembelianModel;
use Illuminate\Http\Request;
use PDF;

class cetakController extends Controller
{
    public function coba_cetak(){
        $widthInCm = 13;
$heightInCm = 30;

$widthInPoints = $widthInCm * 28.3465;
$heightInPoints = $heightInCm * 28.3465;
    $data = ['title' => 'Welcome to Laravel PDF generation'];

        $pdf = PDF::loadview('cetakstokmenipis')
                ->setPaper('A4', 'portrait');
                
        return $pdf->stream('penjualan.pdf');
    }

    public function cetak_nota(Request $request , $id){

        $pembelian = pembelianModel::findorFAil($id);
        $detail_pembelian = detail_pembelianModel::where('id_pembelian' , $id)->get();
        $widthInCm = 13;
$heightInCm = 30;

$widthInPoints = $widthInCm * 28.3465;
$heightInPoints = $heightInCm * 28.3465;
    $data = ['title' => 'Welcome to Laravel PDF generation'];

        $pdf = PDF::loadview('cetaknota',[
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian,
        ])
                ->setPaper([0, 0, $widthInPoints, $heightInPoints], 'portrait');
                
        return $pdf->stream('nota_antrian.pdf');
    }

    public function cetak_penjualan(Request $request , $id){

        $pembelian = pembelianModel::findorFAil($id);
        $detail_pembelian = detail_pembelianModel::where('id_pembelian' , $id)->get();
        $widthInCm = 13;
$heightInCm = 30;

$widthInPoints = $widthInCm * 28.3465;
$heightInPoints = $heightInCm * 28.3465;
    $data = ['title' => 'Welcome to Laravel PDF generation'];

        $pdf = PDF::loadview('cetakpenjualan',[
            'pembelian' => $pembelian,
            'detail_pembelian' => $detail_pembelian,
        ])
                ->setPaper('A4', 'portrait');
                
        return $pdf->stream('nota_penjualan.pdf');
    }
    public function cetak_stokmenipis(Request $request ){

        $obat = obatModel::where('jumlah_stok','<', 5 )->get();
        // $detail_obat = detail_obatModel::where('id_obat' , $id)->get();
        $widthInCm = 13;
$heightInCm = 30;

$widthInPoints = $widthInCm * 28.3465;
$heightInPoints = $heightInCm * 28.3465;
    $data = ['title' => 'Welcome to Laravel PDF generation'];

        $pdf = PDF::loadview('cetakstokmenipis',[
            'obat' => $obat,
            // 'detail_pembelian' => $detail_pembelian,
        ])
                ->setPaper('A4', 'portrait');
                
        return $pdf->stream('nota_stokmenipis.pdf');
    }
}
