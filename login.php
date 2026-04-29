<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - Learnnova</title>
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
  </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <span class="navbar-brand">Learnova Academy</span>
    <a href="register.php" class="btn btn-pink">Register</a>
  </div>
</nav>

<!-- Form Login -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">

      <div class="card shadow p-4">
        <h3 class="text-center mb-3 text-dark">Login</h3>

        <form method="POST" action="proses_login.php">
          <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>

          <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

          <button class="btn btn-pink w-100">Login</button>
        </form>

        <p class="text-center mt-3 text-dark">
          Belum punya akun? <a href="register.php">Daftar</a>
        </p>
      </div>

    </div>
  </div>
</div>

</body>
</html>