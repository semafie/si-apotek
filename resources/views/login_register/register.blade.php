<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Medicine B&S - Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login_register.css" />
</head>
<body>
    <div class="container">
        <div class="form-container">
            
            
            <h2>Sign up to your account</h2>

            <form action="/register" method="POST">
                @csrf
            <label for="email">Email</label>
            <br>
            <input class="input" type="text" id="emails" name="email_baru" placeholder="Masukan email baru" required>
            <br>
            <label for="password">Password</label>
            <br>
            <input class="input" type="password" id="passwords" name="password_baru" placeholder="Masukan Password baru" required>
            <br>
            <label for="password">Konfirmasi Password</label>
            <br>
            <input class="input" type="password" id="passwordss" name="konfir_password_baru" placeholder="Masukan Konfirmasi Password" required>
            {{-- <a href="#" style="margin-top: 10px; text-align: right; display: block;">Forgot your password?</a> --}}
            <button class="btn" type="submit">Register</button>
            </form>
            <p>or</p>
        
            <div class="google-login">
                <a href="auth/redirect" style="width: 100%;"><button class="btn"><img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google Logo">Masuk / Daftar dengan Google</button></a>
            </div>
            <a href="/">kembali ke home?</a>
        </div>
        <div class="image-container">
            <img src="img/foto_login.png" alt="Medicine B&S">
        </div>
        
    </div>
</body>
</html>

<script>
    @if(Session::has('kosong_tambah'))
    Swal.fire({
      title: 'Gagal register',
      text: 'tidak boleh ada data yang kosong',
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
