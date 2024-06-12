<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok Obat Menipis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
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
        .table-container {
            width: 100%;
            margin-top: 60px;
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
            border-radius: 4px;
            background-color: #0066cc;
            color: #fff;
        }
        .footer-signature {
            display: flex;
            justify-content: center;
            position: absolute;
            text-align: right;
            top: 800px;
            left:420px;
            /* margin-right: 50px; */
            /* margin-top: 50px; */
        }
        .footer-signature> p{
            font-size: 20px;
        }
        
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN STOK OBAT MENIPIS</h1>
        <h2>Medicine  <span> B&S</span></h2>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAMA OBAT</th>
                    <th>HARGA OBAT</th>
                    <th>JUMLAH STOK</th>
                </tr>
            </thead>
            <tbody>
                @foreach($obat as $item)
                
                <tr>
                    <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->harga_obat }}</td>
                        <td>{{ $item->jumlah_stok }}</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    <div class="footer-signature">
        <p style="margin-right: 20px;" >TTD APOTEKER Menyetujui</p>
        <p>Jember, _______________________</p>
        <br><br>
        <p style="margin-right: 20px;">a. n. __________________</p>
    </div>
</body>
</html>
