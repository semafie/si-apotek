@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card akun_pegawai">
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                  <th>tanggal</th>
                  <th>jam</th>
                  <th>total_harga</th>
                  <th>keterangan</th>
                  <th>status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pembelian as $item)
                <tr>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->jam }}</td>
                    <td>{{ $item->total_harga }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->status }}
                    </td>
                    <td class="button_intable">
                        <button  type="submit" class="btn btn-success detailbtn" data-bs-toggle="modal" data-pembelian="{{ $item->id }}" onclick="filterTable({{ $item->id }})" data-bs-target="#detail">detail</button>
                        <form action="/cetakpenjualan/{{ $item->id }}" method="POST" target="_blank">
                            @csrf 
                            @method('put')
                        <button  type="submit" class="btn btn-warning detailbtn" >Print</button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="status_masuk{{ $item->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Edit Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="/admin/pembelian/editstatus/{{ $item->id }}" method="POST">
                        @csrf
                        @method('PUT')
                      <div class="modal-body">
                        {{-- <input type="hidden" class="form-control input_setengah" id="input_poli" name="input_poli"  placeholder="Masukan id Dokter" aria-describedby="defaultFormControlHelp" value="{{ $item->dokter->nama_poli }}" /> --}}
                        <input type="hidden" class="form-control input_setengah" id="input_status" name="input_status"  placeholder="Masukan id Dokter" aria-describedby="defaultFormControlHelp" value="{{ $item->status }}" />
                        <select id="select_status" name="status" class="form-select select_setengah">
                          
                          <option value="menunggu apoteker" {{ $item->status == 'masuk' ? 'selected' : '' }}>Sudah di validasi</option>
                        </select>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Kirim ke Apoteker</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="detail" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalToggleLabel">detail Pembelian</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_pembelians">
            <div class="text-nowrap table-responsive pt-0">
                <table id="halo"  class="datatables-basic table border-top">
                  <thead>
                    <tr>
                        <th>id_pembelian  </th>
                        <th>nama obat</th>
                        <th>harga obat</th>
                        <th>jumlah beli</th>
                        <th>sub total</th>
                        <th>cara pemakaian</th>
                    </tr>
                  </thead>
                  <tbody id="table-body">
                    @foreach($detail_pembelian as $detail)
                    <tr data-id-pembelian="{{ $detail->id_pembelian }}">
                        <td>{{ $detail->id_pembelian }}</td>
                        <td>{{ $detail->nama_obat }}</td>
                        <td>{{ $detail->harga_obat }}</td>
                        <td>{{ $detail->jumlah_stok }}</td>
                        <td>{{ $detail->sub_total }}</td>
                        <td>{{ $detail->keterangan }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.detailbtn');
      buttons.forEach(button => {
          button.addEventListener('click', function () {
              const pembelian = this.getAttribute('data-pemebelian');

              document.getElementById('halo').value = pembelian;
          });
      });

      
});

  </script>

  <script>
    function filterTable(idPembelian) {
        const rows = document.querySelectorAll('#table-body tr');
        rows.forEach(row => {
            if (row.getAttribute('data-id-pembelian') == idPembelian) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
  </script>

<script>
    let table = new DataTable('#myTable');
    let table1 = new DataTable('#halo');
</script>
@endsection