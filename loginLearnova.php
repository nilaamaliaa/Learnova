<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
      color: white;
      
      /* PINDAHKAN KODE BACKGROUND KE SINI */
      background-color: #44113E; 
      background-image: 
        radial-gradient(at 10% 10%, #FFF7AD 0%, transparent 50%),   
        radial-gradient(at 90% 15%, #FFB3AE 0%, transparent 50%),   
        radial-gradient(at 50% 50%, #FF49C1 0%, transparent 60%),   
        radial-gradient(at 20% 80%, #6A1452 0%, transparent 60%),   
        radial-gradient(at 80% 90%, #44113E 0%, transparent 50%);
      background-attachment: fixed; /* Agar background tidak ikut scroll */
    }

    .card-body{
        text-align: left;
    }
</style>
<body>
    <div class="card text-center">
  <div class="card-header">
    <h3>Halo, Selamat Datang di Learnova!</h3> 
    <h6>Bersama Learnova, Jadi Luar Biasa</h6>
  </div>
  <div class="card-body">

    <label for="usn" class="form-label">Username</label>
    <input type="text" id="usn" name="usn" class="form-control w-100 mb-3" placeholder="Masukkan Username Anda">

    <label for="pw" class="form-label">Password</label>
    <input type="password" id="pw" name="pw" class="form-control w-100 mb-3" placeholder="Masukkan Password Anda">

    <a href="#" class="btn btn-primary w-100">Login</a>

    <div class="or"><span>atau</span></div>
      <div class="reg">Belum punya akun? <a href="daftar.php">Daftar</a></div>
  </div>
</div>
    
</body>
</html>