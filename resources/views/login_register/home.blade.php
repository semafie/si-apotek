<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sceditor@3/minified/formats/xhtml.min.js"></script>   

    {{-- DATA TABLE --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>

    {{-- <link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet">
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>

</head>
<body>
    <nav>
        <div class="logo">
            <img src="" alt="">
            <a href="">Medicine <span>B&S</span></a>
        </div>
        <div class="button">
            <a href=""><button>Register</button></a>
            <a href="/login"><button>Login</button></a>
        </div>
    </nav>

    <div class="awal">
        <div>
            <h1>Medicine <span>B&S</span></h1>
        <h2>Beli Obat Online</h2>
        <p>Medice B&S adalah sebuah toko apotek yang menyediakan layanan 
            penjualan obat  secara online. Dengan semakin berkembangnya teknologi 
            dan kebutuhan masyarakat akan kemudahan dalam memperoleh 
            obat-obatan, Medice B&S hadir sebagai solusi untuk mempermudah 
            proses pembelian obat tanpa harus keluar rumah.</p>
        <div class="kumpul">
            <div class="lingkaran"></div>
            <div class="lingkaran"></div>
            <div class="lingkaran"></div>
        </div>

        <button class="cari" id="cariobat" onclick="scrollToTarget_lihatantrian()">Cari Obat?</button>
        
        </div>
        
        <img src="{{ asset('img/foto_home.png') }}" alt="">
    </div>

    <div class="kedua">
        <div class="tiga_image">
            <div class="satu_foto">
                <img src="{{ asset('img/panadol.png') }}" alt="">
                <p>Panadol</p>
            </div>
            <div class="satu_foto">
                <img src="{{ asset('img/amoxilin.png') }}" alt="">
                <p>Amoxilin</p>
            </div>
            <div class="satu_foto">
                <img src="{{ asset('img/sanmol.png') }}" alt="">
                <p>Sanmol</p>
            </div>
            
            
            
        </div>
        <div class="inputbutton">
            <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Masukkan Obat" aria-describedby="defaultFormControlHelp" />
            <button type="button" class="btn btn-primary">Cari Obat</button>
        </div>
        <div class="text-nowrap table-responsive haloo">
            <table id="myTable" class="datatables-basic table border-top">
              <thead>
                <tr>

                  <th>nama obat</th>
                  <th>harga obat</th>
                  <th>status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($obat as $item)
                <tr>
                    <td>{{ $item->nama_obat }}</td>
                    <td>{{ $item->harga_obat }}</td>
                    <td>
                        @if($item->jumlah_stok === null)
    Tidak tersedia
@else
    Tersedia
@endif
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>

    
    

    <!-- Remove the container if you want to extend the Footer to full width. -->
<div class="containersx " id="containersx">

    <footer class="text-center text-lg-start" style="background-color: #2658A2;">
      <div class="container d-flex justify-content-center py-5">
        <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="background-color: #54456b;">
            <i class='bx bxl-facebook'></i>
        </button>
        <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="background-color: #54456b;">
            <i class='bx bxl-youtube' ></i>
        </button>
        <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="background-color: #54456b;">
            <i class='bx bxl-instagram' ></i>
        </button>
        <button type="button" class="btn btn-primary btn-lg btn-floating mx-2" style="background-color: #54456b;">
            <i class='bx bxl-twitter' ></i>
        </button>
      </div>
  
      <!-- Copyright -->
      <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">Medicine B&S</a>
      </div>
      <!-- Copyright -->
    </footer>
    
  </div>
  <!-- End of .container -->

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
        function scrollToTarget_lihatantrian() {
            var targetElement = document.getElementById('containersx');
            targetElement.scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</body>
</html>