@extends('admin_kepala.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card akun_pegawai">
        <a ><button id="resetButton" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahakun">Tambah Akun</button></a>
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                    <th>id</th>
                    <th>nama</th>
                    <th>alamat</th>
                    <th>jenis_kelamin</th>
                    <th>email</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($user as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->email }}</td>
                    <td style="display: flex; gap: 15px;">
                        <button type="submit" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editakun{{ $item->id }}">Edit</button>
                        <form action="/admin_kepala/akun_pegawai/hapus/{{ $item->id }}" method="POST">
                            @csrf
                            @method('delete')
                        <button id="resetButton" type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tambahakun">Hapus</button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="editakun{{ $item->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalToggleLabel">Edit akun farmasi</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/admin_kepala/akun_pegawai/edit/{{ $item->id }}" method="POST">
                            @csrf
                            @method('put')
                        <div class="modal-body">
                          <div class="dua_label">
                            <label for="defaultFormControlInput" class="form-label">ID</label>
                            <label  for="defaultFormControlInput" class="form-label">Nama</label>
                          </div>
                          <div class="dua_input">
                            <input type="text" class="form-control" value="{{ $item->id }}"  disabled placeholder="ID dibuat otomatis" aria-describedby="defaultFormControlHelp" />
                            <input id="tanggal_pembelian" type="text" value="{{ $item->name }}" placeholder="Nama pegawai" name="name" class="form-control" aria-describedby="defaultFormControlHelp" />
                          </div>
                          <div class="dua_label">
                            <label for="defaultFormControlInput" class="form-label">alamat</label>
                            <label  for="defaultFormControlInput" class="form-label">jenis_kelamin</label>
                          </div>
                          <div class="dua_input">
                            <input type="text" class="form-control" value="{{ $item->alamat }}" name="alamat"  placeholder="Masukkan alamat" aria-describedby="defaultFormControlHelp" />
                            <select id="defaultSelect" name="jenis_kelamin" class="form-select">
                                <option value="Laki - Laki" {{ $item->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki - Laki</option>
                                <option value="Perempuan" {{ $item->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                              </select>
                          </div>
                          <div class="dua_label">
                            <label for="defaultFormControlInput" class="form-label">email</label>
                          </div>
                          <div class="dua_input">
                            <input type="text" class="form-control" value="{{ $item->email }}" name="email" placeholder="masukkan email" aria-describedby="defaultFormControlHelp" />
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Edit akun</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
                @endforeach
              </tbody>
            </table>
        </div>
  

<div class="modal fade" id="tambahakun" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalToggleLabel">Tambah akun farmasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/admin_kepala/akun_pegawai/tambah" method="POST">
            @csrf
        
        <div class="modal-body">
          <div class="dua_label">
            <label for="defaultFormControlInput" class="form-label">ID</label>
            <label  for="defaultFormControlInput" class="form-label">Nama</label>
          </div>
          <div class="dua_input">
            <input type="text" class="form-control"  disabled placeholder="ID dibuat otomatis" aria-describedby="defaultFormControlHelp" />
            <input id="tanggal_pembelian" type="text" placeholder="Nama pegawai" name="name" class="form-control" aria-describedby="defaultFormControlHelp" />
          </div>
          <div class="dua_label">
            <label for="defaultFormControlInput" class="form-label">alamat</label>
            <label  for="defaultFormControlInput" class="form-label">jenis_kelamin</label>
          </div>
          <div class="dua_input">
            <input type="text" class="form-control" name="alamat"  placeholder="Masukkan alamat" aria-describedby="defaultFormControlHelp" />
            <select id="defaultSelect" name="jenis_kelamin" class="form-select">
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
          </div>
          <div class="dua_label">
            <label for="defaultFormControlInput" class="form-label">email</label>
            <label  for="defaultFormControlInput" class="form-label">password</label>
          </div>
          <div class="dua_input">
            <input type="text" class="form-control" name="email" placeholder="masukkan email" aria-describedby="defaultFormControlHelp" />
            <input id="tanggal_pembelian" type="text" name="password" placeholder="masukkan password" class="form-control" aria-describedby="defaultFormControlHelp" />
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Tambah akun</button>
        </div>
    </form>
      </div>
    </div>
  </div>

</div>
</div>

  <script>
    let table = new DataTable('#myTable')
  </script>
@endsection