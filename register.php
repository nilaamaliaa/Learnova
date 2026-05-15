<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Learnnova</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #44113E; 
      background-image: 
        radial-gradient(at 10% 10%, #FFF7AD 0%, transparent 50%),   
        radial-gradient(at 90% 15%, #FFB3AE 0%, transparent 50%),   
        radial-gradient(at 50% 50%, #FF49C1 0%, transparent 60%),   
        radial-gradient(at 20% 80%, #6A1452 0%, transparent 60%),   
        radial-gradient(at 80% 90%, #44113E 0%, transparent 50%);
      background-attachment: fixed; /* Agar background tidak ikut scroll */
    }
    .card {
      border-radius: 15px;
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
    
  </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
   <a href="index.php" class="navbar-brand">
      <img src="logoLearnnova.png" 
           alt="Learnova Academy" 
           class="logo">
    </a>
    <a href="login.php" class="btn btn-warning">Login</a>
  </div>
  
</nav>

<!-- Form Register -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">

      <div class="card shadow p-4">
        <h3 class="text-center mb-5 text-dark">DAFTAR AKUN</h3>

        <form method="POST" action="proses_register.php">
          <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>

          <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

          <button class="btn btn-pink w-100">Daftar</button>
        </form>

        <p class="text-center mt-3 text-dark">
          Sudah punya akun? <a href="login.php" style="text-decoration: none; color: #FF49C1;">Login</a>
        </p>
      </div>

    </div>
  </div>
</div>

<br>

<!-- Footer -->
<footer class="text-center pb-3" style="color: white;">
  <small>© 2026 Learnnova Academy</small>
</footer>

</body>
</html>