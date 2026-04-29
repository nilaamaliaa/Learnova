<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

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
      background-attachment: fixed; /* Agar background tidak ikut scroll */
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
    }

    .mapel-btn {
      background: rgba(255,255,255,0.2);
      border: none;
      color: white;
      padding: 10px;
      border-radius: 10px;
      width: 100%;
      transition: 0.3s;
    }

    .mapel-btn:hover {
      background: rgba(255,255,255,0.4);
    }

    .carousel-img {
    width: 100%;
    height: 400px;
    object-fit: cover;      /* isi penuh kotak */
    object-position: center; /* fokus tengah */
    border-radius: 15px;
    }
    .review-card {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    border: 1.5px solid rgba(255,255,255,0.8); /* ini border putih */
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    transition: 0.3s;
    }
    .review-card:hover {
    transform: translateY(-5px);
    }
  </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold">Learnnova</a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Materi</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Quiz</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Leaderboard</a></li>
        <li class="nav-item">
          <a href="logout.php" class="btn btn-danger ms-2">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- CAROUSEL -->
<div class="container mt-3">
  <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    </button>
    

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
    </button>
    
    <div class="carousel-inner rounded shadow">

      <div class="carousel-item active">
        <div class="p-5 text-center" style="background:#FF4ECD;">
          <h4>🔥 Belajar Konsisten</h4>
          <p>Naikkan streak kamu setiap hari!</p>
        </div>
      </div>

      <div class="carousel-item">
        <div class="p-5 text-center" style="background:#FFD966; color:black;">
          <h4>🏆 Kejar Ranking</h4>
          <p>Masuk leaderboard terbaik!</p>
        </div>
      </div>

      <div class="carousel-item">
        <div class="p-5 text-center" style="background:#6A0DAD;">
          <h4>📚 Materi Lengkap</h4>
          <p>Belajar dari video interaktif</p>
        </div>
      </div>

    </div>

    <button class="carousel-control-prev" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>

  </div>
</div>


<!-- CARD INFO -->
<div class="row mb-4">
  <div class="col-md-4">
    <div class="card p-3">
      <h5>🔥 Streak</h5>
      <h2>5 Hari</h2>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card p-3">
      <h5>🏆 Score</h5>
      <h2>120</h2>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card p-3">
      <h5>📅 Aktivitas</h5>
      <h2>3 tugas</h2>
    </div>
  </div>
</div>

<!-- PILIH MAPEL -->
<h4>Pilih Mata Pelajaran</h4>

<div class="row text-center mb-4">
  <div class="col-md-2"><button class="mapel-btn" onclick="showMateri('ipa')">IPA</button></div>
  <div class="col-md-2"><button class="mapel-btn" onclick="showMateri('ips')">IPS</button></div>
  <div class="col-md-2"><button class="mapel-btn" onclick="showMateri('mtk')">Matematika</button></div>
  <div class="col-md-3"><button class="mapel-btn" onclick="showMateri('indo')">Bahasa Indonesia</button></div>
  <div class="col-md-3"><button class="mapel-btn" onclick="showMateri('inggris')">Bahasa Inggris</button></div>
</div>

<!-- MATERI -->
<div id="materiArea" class="row"></div>

<!-- REVIEW SECTION -->
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
            <strong>Aldi Firmansyah</strong><br>
            <small>Pelajar · Bandung</small>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

<!-- WHY CHOOSE US -->
<section class="why-section py-5" id="about">
  <div class="container py-3">
    <div class="text-center mb-5 fade-up">
      <p class="fw-bold text-uppercase" style="letter-spacing:2px; color:var(--accent); font-size:.85rem">Why Edumark</p>
      <h2 class="section-title text-white">Why Choose Us?</h2>
      <div class="section-divider mx-auto"></div>
    </div>
    <div class="row g-4">
      <div class="col-sm-6 col-lg-3 fade-up">
        <div class="why-card">
          <div class="why-icon"><i class="bi bi-play-btn-fill"></i></div>
          <h5>On-Demand Video</h5>
          <p>Stream any lesson anytime. Learn at your own pace with unlimited access to course recordings.</p>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 fade-up">
        <div class="why-card">
          <div class="why-icon"><i class="bi bi-award-fill"></i></div>
          <h5>Certified Instructors</h5>
          <p>Learn from verified professionals with real industry experience and passion for teaching.</p>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 fade-up">
        <div class="why-card">
          <div class="why-icon"><i class="bi bi-phone-fill"></i></div>
          <h5>Mobile Friendly</h5>
          <p>Study on any device — phone, tablet, or desktop. Your progress syncs automatically.</p>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 fade-up">
        <div class="why-card">
          <div class="why-icon"><i class="bi bi-people-fill"></i></div>
          <h5>Community Support</h5>
          <p>Join live Q&A sessions, discussion forums, and a thriving community of 12,000+ learners.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
function showMateri(mapel) {
  let html = "";

  // contoh materi kelas 10
  if(mapel == "ipa"){
    html = `
    <div class="col-md-4">
      <div class="card p-3">
        <h5>IPA Kelas 10</h5>
        <p>Materi Fisika Dasar</p>
        <iframe class="w-100" height="200"
        src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
      </div>
    </div>`;
  }

  if(mapel == "mtk"){
    html = `
    <div class="col-md-4">
      <div class="card p-3">
        <h5>Matematika Kelas 10</h5>
        <p>Fungsi & Grafik</p>
        <iframe class="w-100" height="200"
        src="https://www.youtube.com/embed/VIDEO_ID"></iframe>
      </div>
    </div>`;
  }

  document.getElementById("materiArea").innerHTML = html;
}
</script>

</body>
</html>