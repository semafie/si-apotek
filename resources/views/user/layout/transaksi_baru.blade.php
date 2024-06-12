@extends('user.template.template-header')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card beli_obat">
        <a class="dua_obat"><button id="resetButton" type="submit" class="btn btn-primary" >Reset</button><button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cariobat">Cari Obat</button></a>
        <div class="text-nowrap table-responsive pt-0">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>
                  {{-- <th>id_pembelian  </th> --}}
                  <th>nama obat</th>
                  <th>harga obat</th>
                  <th>jumlah beli</th>
                  <th>sub total</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($detail_pembelian as $item)
                <tr>
                    {{-- <td>{{ $item->id_pembelian }}</td> --}}
                    <td>{{ $item->nama_obat }}</td>
                    <td>{{ $item->harga_obat }}</td>
                    <td>{{ $item->jumlah_stok }}</td>
                    <td class="sub-total">{{ $item->sub_total }}</td>
                    <form action="/user/detail_pembelian/hapus/{{ $item->id }}" method="POST">
                      @csrf
                      @method('delete')
                    <td><button type="submit" class="btn btn-danger">Hapus</button></td>
                  </form>
                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        {{-- <form action="/api/user/pembelian/tambah" method="POST">
        @csrf --}}

        <div class="dua_label mt-3" >
          <label for="defaultFormControlInput" class="form-label">ID</label>
          <label  for="defaultFormControlInput" class="form-label">Tanggal Pembelian</label>
        </div>
        <div class="dua_input">
          <input type="text" class="form-control" disabled id="" value="" readonly placeholder="ID dibuat otomatis" aria-describedby="defaultFormControlHelp" />
          <input type="hidden" class="form-control" readonly id="id_user" value="{{ $getRecord->id }}" readonly placeholder="ID dibuat otomatis" aria-describedby="defaultFormControlHelp" />
          <input id="tanggal" type="text" name="tanggal" class="form-control" aria-describedby="defaultFormControlHelp" />
        </div>
        <div class="dua_label" >
          <label  for="defaultFormControlInput" class="form-label">Jam</label>
          <label  for="defaultFormControlInput" class="form-label">Total Harga</label>
        </div>
        <div class="dua_input">
          <input id="jamet" type="text" value="" class="form-control" name="jam" placeholder="Masukkan Jam" aria-describedby="defaultFormControlHelp" />
          <input id="total_harga" type="text" name="total_harga" value="" readonly class="form-control" placeholder="Masukkan Total Harga" aria-describedby="defaultFormControlHelp" />
        </div>
        <a class="dua_obat"><button id="btn-transaksi" type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahobat">Buat Transaksi</button></a>
      {{-- </form> --}}
    </div>
</div>

<div class="modal fade" id="cariobat" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalToggleLabel">Pilih Obat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-nowrap table-responsive pt-0">
          <table id="haloobat" class=" table border-top table-hover">
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
                @foreach($obat as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->nama_obat }}</td>
                  <td>{{ $item->harga_obat }}</td>
                  <td>{{ $item->jumlah_stok }}</td>
                  <td>
                    <button type="button" class="btn btn-warning pilih-obat" data-id="{{ $item->id }}" data-nama="{{ $item->nama_obat }}" data-harga="{{ $item->harga_obat }}" data-bs-toggle="modal" data-bs-target="#masukkansubtotal">Pilih Obat</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="masukkansubtotal" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalToggleLabel">Beli Obat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/user/detail_pembelian/tambah" method="POST">
      @csrf
      
      <div class="modal-body beli_obat">
        <div class="dua_label">
          <label for="defaultFormControlInput" class="form-label">Nama Obat</label>
          <label for="defaultFormControlInput" class="form-label">Harga Obat</label>
      </div>
      <div class="dua_input">
          <input type="text" readonly name="nama_obat" value="" class="form-control" id="nama_obat" placeholder="Jumlah stok Yang Akan dibeli" aria-describedby="defaultFormControlHelp" />
          <input type="hidden" value="" name="id_obat" class="form-control" id="id_obats" placeholder="id" aria-describedby="defaultFormControlHelp" />
          <input type="text"  readonly value="" name="harga_obat" id="harga_obat" class="form-control" placeholder="Hasil Sub Total" aria-describedby="defaultFormControlHelp" />
      </div>
        <div class="dua_label" >
          <label for="defaultFormControlInput" class="form-label">Jumlah stok Yang Akan dibeli</label>
          <label for="defaultFormControlInput" class="form-label">Sub Total</label>
        </div>
        <div class="dua_input">
          <input type="text" name="jumlah_stok" value="" class="form-control" id="jumlah_stok" placeholder="isi angka" aria-describedby="defaultFormControlHelp" />
          <input type="text" name="sub_total" value="" class="form-control" id="sub_total" placeholder="sub total" aria-describedby="defaultFormControlHelp" />
        </div>
        NB : Jika obat sudah ada di tabel maka stok yang akan di edit sesuai isian terakhir,
        <br>
        Sub total akan otomatis terisi setelah mengisi jumlah yang akan di beli
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" >Jumlah sudah sesuai</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
<div id="snap-container"></div>

     <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
     <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
     data-client-key="{{ config('midtrans.client_key') }}"></script>
{{-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script> --}}

<script type="text/javascript">
  $(document).ready(function() {
    var total_harga = document.getElementById('total_harga').value;
    var tanggal = document.getElementById('tanggal').value;
    var jam = document.getElementById('jamet').value;
    var iduser = document.getElementById('id_user').value;
    // var jumlahStok = document.getElementById('jumlah_stok').value;
    // var subTotal = document.getElementById('sub_total').value;


      $('#btn-transaksi').click(function() {
          // Buat array kosong untuk menyimpan nilai-nilai
          alert("sds"); 
          var data = {
        total_harga: total_harga,
        tanggal: tanggal,
        jam: jam,
        id_user : iduser,
        
    };
          var token = "";
          $.ajax({
              url: "/api/user/pembelian/tambah",
              method: "post",
              data: data,
              success(res) {
                  token = res.snap_token;

                  window.snap.pay(token, {
                            onSuccess: function(result) {
                                /* You may add your own implementation here */
                                alert("berhasil your payment!");
                                console.log(result);
                                location.reload();
                            },
                            onPending: function(result) {
                                /* You may add your own implementation here */
                                alert("wating your payment!");
                                console.log(result);
                                location.reload();
                            },
                            onError: function(result) {
                                /* You may add your own implementation here */
                                alert("payment failed!");
                                console.log(result);
                                location.reload();
                            },
                            onClose: function() {
                                /* You may add your own implementation here */
                                alert(
                                    'you closed the popup without finishing the payment'
                                    );
                                    location.reload();
                            }
                        })
                  
              },
              error(err) {
                  console.log(err)
              }
          })

      })
  });
</script>
{{-- <script >
    document.getElementById('btn-transaksi').onclick = function(e) {
            e.preventDefault();

            try {
            const response = fetch('/api/user/pembelian/tambah', {
                method: 'POST',
                // headers: {
                //     'Content-Type': 'application/json',
                //     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                // },
                body: JSON.stringify({
                    // Include necessary data if any
                })
            })

            // const token = await response.text();

            // const data = await response.json();
                // console.log(data);
                // .then(response => response.json()) // Mengurai respons sebagai JSON
    .then(data => {
        // Lakukan sesuatu dengan data yang diterima
        console.log(data);
    })

            } catch (error) {
                console.error('Error:', error);
            }
        };
        
</script> --}}

<script>
  document.addEventListener('DOMContentLoaded', function() {
    
    const jumlahStokInput = document.getElementById('jumlah_stok');
    const jumlahSesuaiBtn = document.getElementById('jumlah-sesuai-btn');

    // Function to check if jumlah_stok is empty and enable/disable the button
    function checkJumlahStok() {
        if (jumlahStokInput.value.trim() === '') {
            jumlahSesuaiBtn.disabled = true;
        } else {
            jumlahSesuaiBtn.disabled = false;
        }
    }
    jumlahStokInput.addEventListener('keyup', checkJumlahStok);

    // Initial check in case the input already has a value on page load
    checkJumlahStok();
  });
</script>


<script>
  document.addEventListener('DOMContentLoaded', function () {

    


      const buttons = document.querySelectorAll('.pilih-obat');
      buttons.forEach(button => {
          button.addEventListener('click', function () {
              const namaObat = this.getAttribute('data-nama');
              const hargaObat = this.getAttribute('data-harga');
              const idObat = this.getAttribute('data-id');

              document.getElementById('jumlah_stok').value = '';
              document.getElementById('sub_total').value = '';
              document.getElementById('nama_obat').value = namaObat;
              document.getElementById('harga_obat').value = hargaObat;
              document.getElementById('id_obats').value = idObat;
          });
      });
      const jumlahStokInput = document.getElementById('jumlah_stok');
        const subTotalInput = document.getElementById('sub_total');
        const hargaObatInput = document.getElementById('harga_obat');


        jumlahStokInput.addEventListener('input', function () {
            const jumlahStok = parseInt(jumlahStokInput.value);
            const hargaObat = parseFloat(hargaObatInput.value);

            if (!isNaN(jumlahStok) && !isNaN(hargaObat)) {
                const subTotal = jumlahStok * hargaObat;
                subTotalInput.value = subTotal;
            } else {
                subTotalInput.value = '';
            }
        });

        jumlahStokInput.addEventListener('input', function () {
            // Remove non-numeric characters
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        

        function updateTotalHarga() {
            const table = document.getElementById('myTable').querySelector('tbody');
            let totalHarga = 0;

            table.querySelectorAll('tr').forEach(row => {
                const subTotalCell = row.cells[4];
                totalHarga += parseFloat(subTotalCell.innerText);
            });

            document.getElementById('total_harga').value = totalHarga.toFixed(2);
        }

        function getCurrentTime() {
        const now = new Date();
        let hours = now.getHours();
        let minutes = now.getMinutes();
        let seconds = now.getSeconds();

        // Tambahkan leading zero jika nilai jam, menit, atau detik kurang dari 10
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        return hours + ':' + minutes + ':' + seconds;
    }

    // Fungsi untuk mengupdate nilai input jam setiap detik
    function updateJamInput() {
        const jamInput = document.getElementById('jamet');
        jamInput.value = getCurrentTime();
    }

    // Jalankan fungsi updateJamInput setiap detik
    setInterval(updateJamInput, 900);

    var tanggalSaatIni = new Date();

  // Mengambil tahun, bulan, dan tanggal
  var tahun = tanggalSaatIni.getFullYear();
  var bulan = tanggalSaatIni.getMonth() + 1; // Bulan dimulai dari 0
  var tanggal = tanggalSaatIni.getDate();

  // Format tanggal ke dalam bentuk yyyy-mm-dd
  var tanggalFormat = tahun + "-" + pad(bulan, 2) + "-" + pad(tanggal, 2);

  // Menetapkan nilai tanggal ke input
  document.getElementById("tanggal").value = tanggalFormat;

  // Fungsi untuk menambahkan nol di depan angka jika hanya satu digit
  function pad(number, length) {
      var str = '' + number;
      while (str.length < length) {
          str = '0' + str;
      }
      return str;
  }
  });

  
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
      calculateTotalHarga();
  });

  function calculateTotalHarga() {
      let totalHarga = 0;
      document.querySelectorAll('.sub-total').forEach(function(element) {
          totalHarga += parseFloat(element.textContent);
      });
      document.getElementById('total_harga').value = totalHarga;
  }

  function removeRow(button) {
      let row = button.closest('tr');
      row.remove();
      calculateTotalHarga();
  }


</script>

<script>
  let table = new DataTable('#haloobat');
</script>
<script>
  @if(Session::has('berhasil_login'))
  Swal.fire({
    title: 'BAerhasil Login',
    text: 'Anda berhasil login',
    icon: 'error',
    confirmButtonText: 'Oke'
  })

  @elseif(Session::has('tidak_sama'))
  Swal.fire({
    title: 'Gagal Register',
    text: 'password dan konfirmasi password tidak sama',
    icon: 'error',
    confirmButtonText: 'Oke'
  })

  @elseif(Session::has('berhasil_tambah'))

  Swal.fire({
    title: 'Berhasil',
    text: 'Data anda berhasil ditambahkan',
    icon: 'success',
    confirmButtonText: 'Oke'
  })
  @elseif(Session::has('gagal_tambah'))

  Swal.fire({
    title: 'Gagal Register',
    text: 'Anda gagal registrasi',
    icon: 'error',
    confirmButtonText: 'Oke'
  })
  @endif
  </script>
@endsection