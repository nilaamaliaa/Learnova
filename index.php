<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Learnnova Academy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Custom Style -->
  <style>
    body {
      min-height: 100vh;
      margin: 0;
      color: white;
      background-color: #44113E; 
      background-image: 
        radial-gradient(at 10% 10%, #FFF7AD 0%, transparent 50%),   
        radial-gradient(at 90% 15%, #FFB3AE 0%, transparent 50%),   
        radial-gradient(at 50% 50%, #FF49C1 0%, transparent 60%),   
        radial-gradient(at 20% 80%, #6A1452 0%, transparent 60%),   
        radial-gradient(at 80% 90%, #44113E 0%, transparent 50%);
      background-attachment: fixed; /* Agar background tidak ikut scroll */
    }
    .hero {
      height: 90vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .btn-pink {
      background-color: #FF4ECD;
      color: white;
      border: none;
    }

    .btn-pink:hover {
      background-color: #e043b8;
    }
    .logo{
      height: 40px;
      object-fit: contain;
    }
    .hero {
      min-height: 90vh;
      display: flex;
      align-items: center;
    }
  </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark shadow">
  <div class="container">
   <a href="index.php" class="navbar-brand">
      <img src="logoLearnnova.png" 
           alt="Learnova Academy" 
           class="logo">
    </a>
    <div>
      <a href="register.php" class="btn btn-pink">Register</a>
    </div>
  </div>
</nav>



<!-- Hero Section -->
<div class="hero container">
  <div class="row align-items-center w-100">

  <!-- Kolom kiri: teks -->
  <div class="col-md-6 text-start">
    <h1 class="fw-bold display-5">Sistem Pembelajaran<br>Online</h1>
    <p class="mt-3">Membantu siswa memahami materi pembelajaran sekolah.</p>
    <p class="lead">Platform bimbingan belajar online untuk siswa SMA (Kelas 10–12)</p>
    <a href="login.php" class="btn btn-pink btn-lg mt-2">Mulai Belajar</a>
  </div>

  <!-- Kolom kanan: gambar -->
  <div class="col-md-6 text-center">
    <img src="book3.png" alt="ilustrasi belajar"
         style="max-height: 80vh; width: auto;">
  </div>

</div>
</div>

<!-- Footer -->
<footer class="text-center pb-3">
  <small>© 2026 Learnnova Academy</small>
</footer>

</body>
</html>