<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['user'];

$queryUser = mysqli_query($conn,
"SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($queryUser);

$user_id = $user['id'];

/* ================= STREAK ================= */
$today = date('Y-m-d');
$last_login = $user['last_login'];
$streak = $user['streak'];

if ($last_login != $today) {

    if ($last_login == date('Y-m-d', strtotime('-1 day'))) {
        $streak++;
    } else {
        $streak = 1;
    }

    mysqli_query($conn,
    "UPDATE users 
     SET streak='$streak', last_login='$today'
     WHERE id='$user_id'");
}

/* ================= TASK ================= */
$tasks = mysqli_query($conn,
"SELECT * FROM tasks WHERE user_id='$user_id' ORDER BY id DESC LIMIT 5");

if (mysqli_num_rows($tasks) == 0) {

    $allTasks = [
        'Baca materi Eksponen',
        'Kerjakan quiz Matematika',
        'Tonton video Gerak Lurus',
        'Baca materi IPA hari ini',
        'Latihan soal IPS',
        'Review materi sebelumnya'
    ];

    shuffle($allTasks);

    for ($i = 0; $i < 3; $i++) {
        $task = mysqli_real_escape_string($conn, $allTasks[$i]);

        mysqli_query($conn,
        "INSERT INTO tasks (user_id, task_name, is_done)
         VALUES ('$user_id', '$task', 0)");
    }

    $tasks = mysqli_query($conn,
    "SELECT * FROM tasks WHERE user_id='$user_id'");
}

/* DONE TASK */
if (isset($_GET['done'])) {

    $id = (int)$_GET['done'];

    mysqli_query($conn,
    "UPDATE tasks SET is_done=1 WHERE id='$id' AND user_id='$user_id'");

    mysqli_query($conn,
    "UPDATE users SET score = score + 5 WHERE id='$user_id'");

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Learnnova Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<style>
body{
    min-height:100vh;
    padding-top:70px;
    color:white;
    background:#44113E;
    background-image:
    radial-gradient(at 10% 10%, #FFF7AD 0%, transparent 50%),
    radial-gradient(at 90% 15%, #FFB3AE 0%, transparent 50%),
    radial-gradient(at 50% 50%, #FF49C1 0%, transparent 60%);
}

/* GLOBAL CARD STYLE */
.card{
    background: rgba(255,255,255,0.10);
    backdrop-filter: blur(12px);
    border: none;
    border-radius: 16px;
    color: white;
}

/* TASK STYLE */
.task-item{
    padding:10px 0;
    border-bottom:1px solid rgba(255,255,255,0.2);
    display:flex;
    justify-content:space-between;
    align-items:center;
}

/* MAPEL */
.mapel-card{
    transition:0.3s;
    cursor:pointer;
}
.mapel-card:hover{
    transform:translateY(-5px);
    background: rgba(255,255,255,0.2);
}
</style>
</head>

<body>

<!-- NAVBAR (FULL KAMU) -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">Learnnova</a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="materiLn.php">Materi</a></li>
        <li class="nav-item"><a class="nav-link" href="quiz.php">Quiz</a></li>
        <li class="nav-item"><a class="nav-link" href="leaderboard.php">Leaderboard</a></li>
        <li class="nav-item">
          <a href="logout.php" class="btn btn-danger btn-sm ms-2">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- CAROUSEL (FULL KAMU) -->
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="crl1..jpeg" class="d-block w-100" alt="Carousel 1">
    </div>
    <div class="carousel-item">
      <img src="crl2..jpeg" class="d-block w-100" alt="Carousel 2">
    </div>
    <div class="carousel-item">
      <img src="crl3..jpeg" class="d-block w-100" alt="Carousel 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!-- STATS -->
<div class="container mt-4">
  <div class="row g-3">

    <div class="col-md-4">
      <div class="card p-4 text-center h-100">
        <i class="bi bi-calendar-check fs-1 text-warning"></i>
        <h5>Streak</h5>
        <h2><?= $streak ?> hari</h2>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card p-4 text-center h-100">
        <i class="bi bi-star-fill fs-1 text-warning"></i>
        <h5>Score</h5>
        <h2><?= $user['score'] ?></h2>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card p-4 text-center h-100">
        <i class="bi bi-list-task fs-1 text-info"></i>
        <h5>Aktivitas</h5>
        <h2><?= mysqli_num_rows($tasks) ?></h2>
      </div>
    </div>

  </div>
</div>

<!-- TASK -->
<div class="container mt-4">
  <div class="card p-4">

    <h5 class="mb-3"><i class="bi bi-pencil-square"></i> Tugas Hari Ini</h5>

    <?php while($task = mysqli_fetch_assoc($tasks)): ?>
      <div class="task-item">

        <div>
          <i class="bi bi-<?= $task['is_done'] ? 'check-circle-fill text-success' : 'circle' ?>"></i>
          <span class="ms-2 <?= $task['is_done'] ? 'text-decoration-line-through' : '' ?>">
            <?= htmlspecialchars($task['task_name']) ?>
          </span>
        </div>

        <?php if(!$task['is_done']): ?>
          <a href="?done=<?= $task['id'] ?>" class="btn btn-success btn-sm">Selesai</a>
        <?php else: ?>
          <span class="badge bg-secondary">+5</span>
        <?php endif; ?>

      </div>
    <?php endwhile; ?>

  </div>
</div>

<!-- MAPEL (FULL 5) -->
<h4>Pilih Mata Pelajaran</h4>

<div class="row text-center mb-4">
  <div class="container mt-4">

<div class="row justify-content-center">
  <!-- IPA -->
    <div class="col-md-3 mb-3">
      <div class="card p-3 text-center h-100">
        <i class="bi bi-brightness-high fs-2 mb-2"></i>
        <h6>IPA</h6>
        <a href="materiLn.php?mapel=ipa" class="btn btn-outline-primary btn-sm"> Lihat Materi </a> 
      </div>
    </div>
    <!-- IPS -->
    <div class="col-md-3 mb-3">
        <div class="card p-3 text-center h-100">
            <i class="bi bi-globe fs-2 mb-2"></i>
            <h6>IPS</h6>
            <a href="materiLn.php?mapel=ips" class="btn btn-outline-primary btn-sm"> Lihat Materi </a>
        </div>
    </div>
    <!-- MTK -->
    <div class="col-md-3 mb-3">
        <div class="card p-3 text-center h-100">
            <i class="bi bi-calculator fs-2 mb-2"></i>
            <h6>Matematika</h6>
            <a href="materiLn.php?mapel=mtk" class="btn btn-outline-primary btn-sm"> Lihat Materi </a>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <!-- Indo -->
    <div class="col-md-3 mb-3">
        <div class="card p-3 text-center h-100">
            <i class="bi bi-book fs-2 mb-2"></i>
            <h6>Bahasa Indonesia</h6>
            <a href="materiLn.php?mapel=indo" class="btn btn-outline-primary btn-sm"> Lihat Materi </a>
        </div>
    </div>
    <!-- Inggris -->
    <div class="col-md-3 mb-3">
        <div class="card p-3 text-center h-100">
            <i class="bi bi-translate fs-2 mb-2"></i>
            <h6>Bahasa Inggris</h6>
            <a href="materiLn.php?mapel=inggris" class="btn btn-outline-primary btn-sm"> Lihat Materi </a>
        </div>
    </div>
</div>
</div>

<!-- WHY CHOOSE -->
<!-- FOOTER + WHY CHOOSE -->
<footer class="mt-5 pt-5 pb-4" style="background: rgba(0,0,0,0.3); backdrop-filter: blur(10px);">

  <div class="container">

    <!-- WHY CHOOSE -->
    <div class="text-center mb-4">
      <h3>Why Choose LearnNova?</h3>
      <p class="text-light">Platform belajar modern untuk siswa Indonesia</p>
    </div>

    <div class="row g-3 text-center">

      <div class="col-md-3">
        <div class="card p-3">
          <i class="bi bi-play-btn-fill fs-2 text-warning"></i>
          <h6>On-Demand Video</h6>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3">
          <i class="bi bi-award-fill fs-2 text-warning"></i>
          <h6>Certified Teacher</h6>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3">
          <i class="bi bi-phone-fill fs-2 text-warning"></i>
          <h6>Mobile Friendly</h6>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card p-3">
          <i class="bi bi-people-fill fs-2 text-warning"></i>
          <h6>Community Support</h6>
        </div>
      </div>

    </div>



  </div>

</footer>


<!-- REVIEW -->
<div class="mt-5">

  <h2 class="text-center fw-bold mb-4">What Our Students Say</h2>
  <div class="text-center mb-4">
    <span style="display:inline-block; width:80px; height:4px; background:#2dd4bf; border-radius:10px;"></span>
  </div>

  <div class="row">

    <!-- CARD 1 -->
    <div class="col-md-4 mb-4">
      <div class="review-card p-4 h-100">
        <div class="mb-2 text-warning">★★★★★</div>
        <p>
          "Belajar di Learnnova bikin aku lebih paham materi. Videonya jelas dan mudah diikuti!"
        </p>

        <div class="d-flex align-items-center mt-3">
          <div class="avatar bg-purple">R</div>
          <div class="ms-3">
            <strong>Rizky Pratama</strong><br>
            <small>Pelajar · Jakarta</small>
          </div>
        </div>
      </div>
    </div>

    <!-- CARD 2 -->
    <div class="col-md-4 mb-4">
      <div class="review-card p-4 h-100">
        <div class="mb-2 text-warning">★★★★★</div>
        <p>
          "UI-nya enak dipakai dan materinya lengkap. Jadi semangat belajar tiap hari!"
        </p>

        <div class="d-flex align-items-center mt-3">
          <div class="avatar bg-orange">S</div>
          <div class="ms-3">
            <strong>Sari Dewi</strong><br>
            <small>Pelajar · Surabaya</small>
          </div>
        </div>
      </div>
    </div>

    <!-- CARD 3 -->
    <div class="col-md-4 mb-4">
      <div class="review-card p-4 h-100">
        <div class="mb-2 text-warning">★★★★☆</div>
        <p>
          "Materinya up-to-date dan gampang dipahami. Cocok buat persiapan ujian!"
        </p>

        <div class="d-flex align-items-center mt-3">
          <div class="avatar bg-green">A</div>
          <div class="ms-3">
            <strong>Aldo Firmansyah</strong><br>
            <small>Pelajar · Bandung</small>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
    <!-- COPYRIGHT -->
    <div class="text-center mt-4">
      <small>© <?= date('Y') ?> LearnNova. All Rights Reserved.</small>
    </div>

</body>
</html>