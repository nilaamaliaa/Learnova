<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Materi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#1E1E2F; color:white;">

<div class="container mt-4">

<h3>📚 Materi Belajar</h3>

<div class="row">

  <!-- Card 1 -->
  <div class="col-md-6 mt-3">
    <div class="card shadow">
      <div class="card-body">
        <h5 class="text-dark">Matematika - Fungsi</h5>

        <iframe class="w-100"
        height="250"
        src="https://www.youtube.com/embed/VIDEO_ID"
        allowfullscreen></iframe>

      </div>
    </div>
  </div>

  <!-- Tambah materi lain bebas -->

</div>

<a href="dashboard.php" class="btn btn-warning mt-3">⬅ Kembali</a>

</div>

</body>
</html>