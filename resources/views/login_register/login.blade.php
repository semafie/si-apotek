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
            
            
            <h2>Sign in to your account</h2>

            <form action="/login/auth" method="POST">
                @csrf
            <label for="email">Email</label>
            <br>
            <input class="input" type="text" id="email" name="email" placeholder="Masukan email" required>
            <br>
            <label for="password">Password</label>
            <br>
            <input class="input" type="password" id="password" name="password" placeholder="Masukan Password" required>
            <a href="#" style="margin-top: 10px; text-align: right; display: block;">Forgot your password?</a>
            <button class="btn" type="submit">Login</button>
            </form>
            <p>or</p>
        
            <div class="google-login">
                <a href="auth/redirect"><button class="btn"><img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google Logo">Masuk / Daftar dengan Google</button></a>
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
    @if(Session::has('gagal_login'))
    Swal.fire({
      title: 'Gagal Login',
      text: 'Coba cek email atau password kembali',
      icon: 'error',
      confirmButtonText: 'Oke'
    })
  
    @elseif(Session::has('login_dulu'))
    Swal.fire({
      title: 'Anda Belum Login',
      text: 'Coba login terlebih dahulu',
      icon: 'error',
      confirmButtonText: 'Oke'
    })
  
    @elseif(Session::has('success_delete'))
  
    Swal.fire({
      title: 'Berhasil',
      text: 'Data anda berhasil di Dihapus',
      icon: 'success',
      confirmButtonText: 'Oke'
    })
    @elseif(Session::has('berhasil register'))
  
    Swal.fire({
      title: 'Berhasil',
      text: 'Anda berhasil registrasi',
      icon: 'success',
      confirmButtonText: 'Oke'
    })
    @endif
    </script>
