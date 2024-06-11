<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembelian Obat</title>
    <style>

        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .header .midicine {
            color: #08679F;
        }
        .header .midicine span{
            color: #FEC93B;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 0;
            line-height: 1.6;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            /* border-color: white */
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #fff;
            border-radius: 3px
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #FEC93B;
            color: white;
        }
        .footer {
            text-align: right;
            margin-top: 50px;
        }
        .footer .signature {
            margin-top: 50px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN PEMBELIAN OBAT</h1>
        <h2 class="midicine">midicine <span> B&S</span></h2>
    </div>

    <div class="info">
        <p>{{ $pembelian->id }}</p>
        <p>TANGGAL: {{ $pembelian->tanggal }}</p>
        <p>JAM: {{ $pembelian->jam }}</p>
        <p>TOTAL HARGA: Rp. {{ $pembelian->total_harga }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NAMA OBAT</th>
                <th>HARGA OBAT</th>
                <th>JUMLAH STOK</th>
                <th>SUB TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detail_pembelian as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama_obat }}</td>
                <td>{{ $item->harga_obat }}</td>
                <td>{{ $item->jumlah_stok }}</td>
                <td>{{ $item->sub_total }}</td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

    <div class="footer">
        <p>TTD APOTEKER Menyetujui</p>
        <p>Jember, ____________________</p>
        <div class="signature">
            <p>a. n. ____________________</p>
        </div>
    </div>
</body>
</html>
