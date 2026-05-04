<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

// Ambil data ranking
$data = mysqli_query($conn, "SELECT * FROM users ORDER BY score DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Leaderboard</title>
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
        <li class="nav-item"><a class="nav-link" href="quiz.php">Quiz</a></li>
        <li class="nav-item"><a class="nav-link active" href="leaderboard.php">Leaderboard</a></li>
        <li class="nav-item"><a href="logout.php" class="btn btn-danger ms-2">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">

<h3>🏆 Leaderboard</h3>

<table class="table table-dark table-striped mt-3">
  <thead>
    <tr>
      <th>Rank</th>
      <th>Username</th>
      <th>Score</th>
    </tr>
  </thead>

  <tbody>
<?php
$rank = 1;
while($d = mysqli_fetch_assoc($data)){
?>
<tr>
  <td><?= $rank++; ?></td>
  <td><?= $d['username']; ?></td>
  <td><?= $d['score']; ?></td>
</tr>
<?php } ?>
  </tbody>
</table>

<a href="dashboard.php" class="btn btn-warning">⬅ Kembali</a>

</div>

</body>
</html>