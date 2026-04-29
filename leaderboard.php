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

<body style="background:#1E1E2F; color:white;">

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