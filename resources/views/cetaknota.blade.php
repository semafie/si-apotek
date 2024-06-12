<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Nota Pembelian Obat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            /* width: 9cm; */
            /* height: 33cm; */
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
            box-sizing: border-box;
        }
        .header {
            text-align: left;
        }
        .header h1 {
            font-size: 25px;
            color: #007bff;
            margin: 0;
        }
        .header h2 {
            font-size: 22px;
            color: #ffb700;
            margin: 0;
        }
        .header p {
            font-size: 13px;
            margin: 5px 0 15px;
            color: #666;
        }
        .header b {
            font-size: 15px;
            display: block;
            margin-top: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            font-size: 10px;
            text-align: left;
            border: 1px solid #fff;
        }
        th {
            background-color: #f0f0f0;
        }
        .totals {
            margin-top: 20px;
        }
        .totals p {
            font-size: 10px;
            margin: 5px 0 5px 200px;
            font-weight: bold;
        }
        .totals p span {
            float: right;
        }
        .note {
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Medicine <span style="color: #ffb700;">B&S</span></h1>
            <h2>Struk Nota Pembelian Obat</h2>
            <p>Jl Mastrip No 15</p>
            <b>Kasir:</b>
        </div>
        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA OBAT</th>
                    <th>HARGA OBAT</th>
                    <th>JUMLAH BELI</th>
                    <th>SUB TOTAL</th>
                    <th>CARA PEMAKAIAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detail_pembelian as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_obat }}</td>
                    <td>{{ $item->harga_obat }}</td>
                    <td>{{ $item->jumlah_stok }}</td>
                    <td>{{ $item->sub_total }}</td>
                    <td>{{ $item->keterangan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="totals">
            {{-- <p>SUB TOTAL<span> Rp. 128.000</span></p>
            <p>DISKON <span> 0%</span></p> --}}
            <p>TOTAL HARGA <span> Rp. {{ $pembelian->total_harga }}</span></p>
            <p>CARA BAYAR<span></span></p>
            {{-- <p>KEMBALIAN<span> Rp. 22.000</span></p> --}}
        </div>
        <div class="note">
            NB: Barang yang sudah dibeli tidak dapat dikembalikan atau ditukar
        </div>
    </div>
</body>
</html>
