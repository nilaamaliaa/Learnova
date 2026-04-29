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

<body style="background:#1E1E2F; color:white;">

<div class="container mt-5">

<div class="card p-4 shadow">
  <h5 class="text-dark">Soal:</h5>
  <p class="text-dark">2 + 2 = ?</p>

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
