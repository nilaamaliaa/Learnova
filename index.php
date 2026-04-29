<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Learnnova Academy</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

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
  </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark shadow">
  <div class="container">
    <span class="navbar-brand fw-bold">Learnnova Academy</span>
    <div>
      <a href="login.php" class="btn btn-warning me-2">Login</a>
      <a href="register.php" class="btn btn-pink">Register</a>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<div class="hero">
  <div>
    <h1 class="fw-bold display-4">Belajar Jadi Lebih Seru 🚀</h1>
    <p class="lead mt-3">
      Platform bimbel online untuk siswa SMA (Kelas 10–12)
    </p>

    <div class="mt-4">
      <a href="register.php" class="btn btn-pink btn-lg me-2">Mulai Belajar</a>
      <a href="login.php" class="btn btn-outline-light btn-lg">Masuk</a>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="text-center pb-3">
  <small>© 2026 Learnnova Academy</small>
</footer>

</body>
</html>