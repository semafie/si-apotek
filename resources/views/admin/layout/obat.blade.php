@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card h-40 data_obat p-3">
        <button type="button btn" class="btn tambah_pasien btn-primary " data-bs-toggle="modal" data-bs-target="#tambahpasien">Tambah</button>

        <div class="card-datatable table-responsive p-3">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Nama Obat</th>
                  <th>harga Obat</th>
                  <th>Jumlah Stok</th>
                  <th>Aksi</th>
    
                </tr>
              </thead>
            </table>
        </div>
    </div>
</div>

<script>
    let table = new DataTable('#myTable');
</script>
@endsection