@extends('admin_kepala.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card obat_menipis">
        <a href="/cetakstokmenipis"><button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#tambahobat">Print Laporan Stok menipis</button></a>
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                    <th>id</th>
                    <th>nama obat</th>
                    <th>harga obat</th>
                    <th>jumlah stok</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($obat as $item)
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
    </div>
</div>
<script>
    // let table = new DataTable('#myTable')
</script>
@endsection