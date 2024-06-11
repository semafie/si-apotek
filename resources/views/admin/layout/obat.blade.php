@extends('admin.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card semua_obat">
        <a ><button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahobat">Tambah Obat Baru</button></a>
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                  <th>id</th>
                  <th>nama obat</th>
                  <th>harga obat</th>
                  <th>jumlah stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($obat as $item)

                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_obat }}</td>
                        <td>{{ $item->harga_obat }}</td>
                        <td>{{ $item->jumlah_stok }}</td>
                        <td class="button_intable" >
                            <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editobat{{ $item->id }}">Edit</button>
                            <form action="/admin/obat/hapus/{{ $item->id }}" method="POST">
                              @csrf
                              @method('delete')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                          </form>
                        </td>
                    </tr>
                    
                    <div class="modal fade" id="editobat{{ $item->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalToggleLabel">Edit Obat</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                    
                            <form action="/admin/obat/edit/{{ $item->id }}" method="POST">
                                @csrf
                                @method('put')
                            <div class="modal-body semua_obats">
                                <div class="dua_label">
                                    <label for="defaultFormControlInput" class="form-label">ID</label>
                                    <label for="defaultFormControlInput" class="form-label">Nama Obat</label>
                                </div>
                                <div class="dua_input">
                                    <input type="text" value="{{ $item->id }}" class="form-control" disabled id="defaultFormControlInput" placeholder="ID dibuat otomatis" aria-describedby="defaultFormControlHelp" />
                                    <input type="text" name="nama_obat" value="{{ $item->nama_obat }}" name="nama_obat" class="form-control" id="defaultFormControlInput" placeholder="Masukkan nama obat" aria-describedby="defaultFormControlHelp" />
                                </div>
                                <div class="dua_label">
                                    <label for="defaultFormControlInput" class="form-label">Harga Obat</label>
                                    <label for="defaultFormControlInput" class="form-label">JUmlah stok</label>
                                </div>
                                <div class="dua_input">
                                    <input type="text" name="harga_obat" value="{{ $item->harga_obat }}" name="harga_obat" class="form-control" id="defaultFormControlInput" placeholder="Masukkan harga obat" aria-describedby="defaultFormControlHelp" />
                                    <input type="text" name="jumlah_stok" value="{{ $item->jumlah_stok }}" name="jumlah_stok" class="form-control" id="defaultFormControlInput" placeholder="Masukkan jumlah stok" aria-describedby="defaultFormControlHelp" />
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" >Edit Obat</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>
                @endforeach
              </tbody>
            </table>
        </div>
 

<div class="modal fade" id="tambahobat" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalToggleLabel">Tambah Obat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="/admin/obat/tambah" method="POST">
            @csrf
        <div class="modal-body semua_obats">
            <div class="dua_label">
                <label for="defaultFormControlInput" class="form-label">ID</label>
                <label for="defaultFormControlInput" class="form-label">Nama Obat</label>
            </div>
            <div class="dua_input">
                <input type="text" class="form-control" disabled id="defaultFormControlInput" placeholder="ID dibuat otomatis" aria-describedby="defaultFormControlHelp" />
                <input type="text" name="nama_obat" class="form-control" id="defaultFormControlInput" placeholder="Masukkan nama obat" aria-describedby="defaultFormControlHelp" />
            </div>
            <div class="dua_label">
                <label for="defaultFormControlInput" class="form-label">Harga Obat</label>
                <label for="defaultFormControlInput" class="form-label">JUmlah stok</label>
            </div>
            <div class="dua_input">
                <input type="text" name="harga_obat" class="form-control" id="defaultFormControlInput" placeholder="Masukkan harga obat" aria-describedby="defaultFormControlHelp" />
                <input type="text" name="jumlah_stok" class="form-control" id="defaultFormControlInput" placeholder="Masukkan jumlah stok" aria-describedby="defaultFormControlHelp" />
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Tambah Obat</button>
        </div>
    </form>
      </div>
    </div>
  </div>


</div>
</div>

<script> 
    let table = new DataTable('#myTable');
</script>
@endsection