<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

// Ambil user
$username = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Quiz</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  body {
      min-height: 100vh;
      margin: 0;
      padding-top: 55px;
      color: white;
      background-color: #44113E;
      background-image:
        radial-gradient(at 10% 10%, #FFF7AD 0%, transparent 50%),
        radial-gradient(at 90% 15%, #FFB3AE 0%, transparent 50%),
        radial-gradient(at 50% 50%, #FF49C1 0%, transparent 60%),
        radial-gradient(at 20% 80%, #6A1452 0%, transparent 60%),
        radial-gradient(at 80% 90%, #44113E 0%, transparent 50%);
      background-attachment: fixed;
    }

 .navbar {
      background: rgba(0,0,0,0.3) !important;
      backdrop-filter: blur(10px);
    }

  .card {
      background: rgba(255,255,255,0.1);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      color: white;
      border: 1px solid rgba(255,255,255,0.15);
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Learnnova</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="materiLn.php">Materi</a></li>
        <li class="nav-item"><a class="nav-link active" href="quiz.php">Quiz</a></li>
        <li class="nav-item"><a class="nav-link" href="leaderboard.php">Leaderboard</a></li>
        <li class="nav-item"><a href="logout.php" class="btn btn-danger ms-2">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">

<div class="card p-4 shadow">
  <h5 class="text-white">Soal:</h5>
  <p class="text-white">2 + 2 = ?</p>

  <form method="POST">
    <button name="jawab" value="a" class="btn btn-outline-danger w-100 mb-2">3</button>
    <button name="jawab" value="b" class="btn btn-outline-success w-100 mb-2">4</button>
    <button name="jawab" value="c" class="btn btn-outline-primary w-100 mb-2">5</button>
  </form>
</div>

<?php
if(isset($_POST['jawab'])){
    if($_POST['jawab'] == 'b'){
        // tambah score ke database
        mysqli_query($conn, "UPDATE users SET score = score + 10 WHERE username='$username'");
        echo "<div class='alert alert-success mt-3'>Jawaban benar! +10 poin</div>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Jawaban salah!</div>";
    }
}
?>

<a href="dashboard.php" class="btn btn-warning mt-3">⬅ Kembali</a>

</div>

</body>
</html>
