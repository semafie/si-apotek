<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan Obat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header, .footer {
            text-align: center;
            margin: 20px 0;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header h2 {
            margin: 0;
            color: #08679F;
        }
        .header h2 span{
            color: #F4A442;
        }

        .details, .total {
            margin: 0 0;
            text-align: left;
            font-size: 16px;
        }
        .details p, .total p {
            margin: 5px 0;
        }
        .table-container {
            width: 100%;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid white;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            border-radius: 3px;
            background-color: #0066cc;
            color: #fff;
        }
        .footer-signature {
            position: absolute;
            top: 800px;
            left: 370px;
            text-align: right;
            margin-right: 50px;
            margin-top: 50px;
        }
        .footer-signature p {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN PENJUALAN OBAT</h1>
        <h2>Medicine <span> B&S</span></h2>
    </div>
    <div class="details">
        <p>TANGGAL : {{ $pembelian->tanggal }}</p>
        <p>JAM : {{ $pembelian->jam }}</p>
    </div>
    <div class="total">
        <p>TOTAL HARGA : Rp. {{ $pembelian->total_harga }}</p>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA OBAT</th>
                    <th>HARGA OBAT</th>
                    <th>JUMLAH STOK</th>
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
    </div>
    <div class="footer-signature">
        <p style="margin-right: 22px;">TTD APOTEKER Menyetujui</p>
        <p>Jember, ________________________</p>
        <br><br>
        <p style="margin-right: 22px;">a. n. __________________</p>
    </div>
</body>
</html>
