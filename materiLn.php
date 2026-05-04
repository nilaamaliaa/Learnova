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
  <title>Materi – Learnnova</title>
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

    /* DROPDOWN KELAS */
    .kelas-select {
      background: rgba(255,255,255,0.15);
      border: 1.5px solid rgba(255,255,255,0.3);
      color: white;
      border-radius: 12px;
      padding: 10px 18px;
      font-size: 1rem;
      cursor: pointer;
      outline: none;
      transition: 0.3s;
      appearance: none;
      -webkit-appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='white' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 14px center;
      padding-right: 38px;
    }
    .kelas-select:focus {
      border-color: rgba(255,73,193,0.8);
      background-color: rgba(255,255,255,0.2);
    }
    .kelas-select option {
      background: #44113E;
      color: white;
    }

    /* HERO SECTION (sebelum pilih mapel) */
    .hero-section {
      text-align: center;
      padding: 40px 0 30px;
    }
    .hero-section h2 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 8px;
    }
    .hero-section p {
      opacity: 0.65;
      font-size: 0.95rem;
      margin-bottom: 0;
    }

    /* MAPEL BUTTONS */
    .mapel-grid {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 16px;
      margin: 32px 0 20px;
    }

    .mapel-btn {
      background: rgba(255,255,255,0.15);
      border: 1.5px solid rgba(255,255,255,0.2);
      color: white;
      padding: 20px 28px;
      border-radius: 16px;
      font-size: 1.1rem;
      font-weight: 600;
      min-width: 160px;
      transition: 0.3s;
      cursor: pointer;
      text-align: center;
      line-height: 1.4;
    }
    .mapel-btn .mapel-emoji {
      display: block;
      font-size: 2rem;
      margin-bottom: 6px;
    }
    .mapel-btn:hover {
      background: rgba(255,255,255,0.3);
      transform: translateY(-3px);
      border-color: rgba(255,255,255,0.45);
    }
    .mapel-btn.active {
      background: rgba(255,73,193,0.45);
      border-color: rgba(255,73,193,0.9);
      transform: translateY(-3px);
    }

    /* STATS CARDS */
    .stat-card {
  border-radius: 14px;
  padding: 16px 20px;
  flex: 1;
  min-width: 120px;
  text-align: center;
  color: white;
  border: none;
  transition: 0.3s;
}

/* warna beda tiap card */
.stat-card:nth-child(1) {
  background: linear-gradient(135deg, #FF4ECD, #C4008F);
}

.stat-card:nth-child(2) {
  background: linear-gradient(135deg, #FFD966, #FFB300);
  color: black;
}

.stat-card:nth-child(3) {
  background: linear-gradient(135deg, #00C9A7, #008F7A);
}

.stats-row {
  display: flex;
  gap: 20px;          /* jarak antar card */
  margin-bottom: 32px;
  flex-wrap: nowrap;  /* PENTING: biar ga turun ke bawah */
}

/* hover biar ada feel */
.stat-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.25);
}

    /* BAB LIST */
    .bab-btn {
      background: rgba(255,255,255,0.1);
      border: 1px solid rgba(255,255,255,0.15);
      color: white;
      padding: 12px 14px;
      border-radius: 10px;
      width: 100%;
      text-align: left;
      transition: 0.3s;
      margin-bottom: 8px;
      display: block;
      font-size: 0.88rem;
    }
    .bab-btn:hover {
      background: rgba(255,255,255,0.22);
      border-color: rgba(255,255,255,0.35);
    }
    .bab-btn.active {
      background: rgba(255,73,193,0.4);
      border-color: rgba(255,73,193,0.8);
    }

    /* EMPTY STATE (besar, bukan card) */
    .empty-state {
      text-align: center;
      padding: 60px 20px;
    }
    .empty-state .empty-emoji {
      font-size: 4rem;
      margin-bottom: 16px;
      display: block;
    }
    .empty-state h3 {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 8px;
    }
    .empty-state p {
      opacity: 0.5;
      font-size: 0.9rem;
    }

    /* INFO BANNER */
    .info-banner {
      background: rgba(255,255,255,0.07);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 14px;
      padding: 18px 22px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 16px;
      flex-wrap: wrap;
    }
    .info-banner .bi-tag {
      font-size: 1.5rem;
    }
    .info-banner .info-text strong {
      display: block;
      font-size: 1rem;
    }
    .info-banner .info-text span {
      font-size: 0.82rem;
      opacity: 0.6;
    }

    /* TIP CARDS */
    .tip-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
      gap: 12px;
      margin-top: 24px;
    }
    .tip-card {
      background: rgba(255,255,255,0.07);
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: 12px;
      padding: 16px;
      font-size: 0.85rem;
    }
    .tip-card .tip-icon { font-size: 1.5rem; margin-bottom: 8px; display: block; }
    .tip-card strong { display: block; margin-bottom: 4px; }
    .tip-card span { opacity: 0.55; font-size: 0.78rem; }
  </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Learnnova</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="materiLn.php">Materi</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Quiz</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Leaderboard</a></li>
        <li class="nav-item"><a href="logout.php" class="btn btn-danger ms-2">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-3">

  <!-- HERO -->
  <div class="hero-section">
    <h1>📚 Materi Pelajaran</h1>
    <p>Pilih kelas dan mata pelajaran untuk mulai belajar</p>
  </div>

  <!-- DROPDOWN KELAS + STATS -->
  <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-2">
    <div class="d-flex align-items-center gap-2">
      <span style="opacity:0.7; font-size:0.9rem;">Kelas:</span>
      <select class="kelas-select" id="kelasSelect" onchange="gantiKelas(this.value)">
        <option value="10">Kelas 10</option>
        <option value="11">Kelas 11</option>
        <option value="12">Kelas 12</option>
      </select>
    </div>
    <div class="stats-row mb-0">
      <div class="stat-card">
        <div class="stat-num">5</div>
        <div class="stat-label">Mata Pelajaran</div>
      </div>
      <div class="stat-card">
        <div class="stat-num" id="totalBab">15</div>
        <div class="stat-label">Total Bab</div>
      </div>
      <div class="stat-card">
        <div class="stat-num">🔥 5</div>
        <div class="stat-label">Streak Hari</div>
      </div>
    </div>
  </div>

  <!-- MAPEL BUTTONS (besar, tengah) -->
  <div class="mapel-grid" id="mapelGrid">
    <button class="mapel-btn" onclick="showMapel('ipa', this)">
      <span class="mapel-emoji">🔬</span>IPA
    </button>
    <button class="mapel-btn" onclick="showMapel('ips', this)">
      <span class="mapel-emoji">🌍</span>IPS
    </button>
    <button class="mapel-btn" onclick="showMapel('mtk', this)">
      <span class="mapel-emoji">📐</span>Matematika
    </button>
    <button class="mapel-btn" onclick="showMapel('indo', this)">
      <span class="mapel-emoji">📝</span>Bahasa Indonesia
    </button>
    <button class="mapel-btn" onclick="showMapel('inggris', this)">
      <span class="mapel-emoji">💬</span>Bahasa Inggris
    </button>
  </div>

  <!-- PANEL MATERI -->
  <div id="mainContent" class="row mt-3" style="display:none">

    <!-- KIRI: Daftar Bab -->
    <div class="col-md-3 mb-3">
      <div class="card p-3">
        <h6 class="mb-1" id="judulMapel">—</h6>
        <small class="mb-3 d-block" id="judulKelas" style="opacity:0.5"></small>
        <div id="babList"></div>
      </div>
    </div>

    <!-- KANAN: Konten -->
    <div class="col-md-9">

      <!-- Info banner -->
      <div class="info-banner" id="infoBanner" style="display:none">
        <span style="font-size:1.5rem">📖</span>
        <div class="info-text">
          <strong id="bannerJudul">—</strong>
          <span id="bannerSub">—</span>
        </div>
      </div>

      <div id="kontenBab">
        <!-- EMPTY STATE (besar, bukan card) -->
        <div class="empty-state">
          <span class="empty-emoji">👈</span>
          <h3>Pilih bab untuk mulai belajar</h3>
          <p>Klik salah satu bab di sebelah kiri</p>
        </div>

        <!-- TIP CARDS saat belum pilih bab -->
        <div class="tip-grid" id="tipGrid">
          <div class="tip-card">
            <span class="tip-icon">🎯</span>
            <strong>Belajar Fokus</strong>
            <span>Selesaikan satu bab sebelum lanjut ke bab berikutnya</span>
          </div>
          <div class="tip-card">
            <span class="tip-icon">📹</span>
            <strong>Tonton Videonya</strong>
            <span>Video penjelasan tersedia di setiap bab materi</span>
          </div>
          <div class="tip-card">
            <span class="tip-icon">✍️</span>
            <strong>Catat Poin Penting</strong>
            <span>Tulis ringkasan materi agar lebih mudah diingat</span>
          </div>
          <div class="tip-card">
            <span class="tip-icon">🏆</span>
            <strong>Kerjakan Quiz</strong>
            <span>Uji pemahaman kamu dengan quiz setelah belajar</span>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>

<script>
const materi = {
  10: {
    ipa: {
      judul: "🔬 IPA", 
      sub: "Ilmu Pengetahuan Alam · Kelas 10",
      bab: [
        { 
            judul: "Gerak Lurus", 
            video: "3YCRAse9irs", 
            teks: 
            `<h6> Gerak Lurus </h6><p>Manusia purba hidup nomaden. Menggunakan alat batu sederhana.</p>`},
        { 
            judul: "Konfigurasi Elektron", 
            video: "c6aQPwRnUw0", 
            teks: 
            `<h6>Konfigurasi Elektron</h6><p>Manusia purba hidup nomaden. Menggunakan alat batu sederhana.</p>` },
        { 
            judul: "Gerak Melingkar", 
            video: "PX57IZoUEvs", 
            teks: 
            `<h6>Gerak Melingkar</h6><p>Manusia purba hidup nomaden. Menggunakan alat batu sederhana.</p>` },
        { 
            judul: "Momentum dan Impuls", 
            video: "l6SVStydZT4", 
            teks: 
            `<h6>Momentum dan Impuls</h6><p>Manusia purba hidup nomaden. Menggunakan alat batu sederhana.</p>` },
        { 
            judul: "Virus", 
            video: "8glI_X1XoBE", 
            teks: 
            `<h6>Virus</h6><p>Manusia purba hidup nomaden. Menggunakan alat batu sederhana.</p>` },
        { 
            judul: "Efek Rumah Kaca dan Pemanasan Global", 
            video: "pVjXm340tbw", 
            teks: 
            `<h6>Efek Rumah Kaca dan Pemanasan Global</h6><p>Manusia purba hidup nomaden. Menggunakan alat batu sederhana.</p>` },
         { 
            judul: "Perubahan Lingkungan", 
            video: "abfIbM4hWIk", 
            teks: 
            `<h6>Perubahan Lingkungan</h6><p>Manusia purba hidup nomaden. Menggunakan alat batu sederhana.</p>` },
        { 
            judul: "Reaksi Kimia", 
            video: "YRZb_hmonsU", 
            teks: 
            `<h6>Reaksi Kimia</h6><p>Manusia purba hidup nomaden. Menggunakan alat batu sederhana.</p>` },
        { 
            judul: "Unsur, Senyawa, Campuran", 
            video: "qEnCeg07C-c", 
            teks: 
            `<h6>Unsur, Senyawa, Campuran</h6><p>Manusia purba hidup nomaden. Menggunakan alat batu sederhana.</p>` },
        { 
            judul: "Besaran, Satuan dan Dimensi", 
            video: "xefe-f5GxBI", 
            teks: 
            `<h6>Besaran, Satuan dan Dimensi</h6><p>Manusia purba hidup nomaden. Menggunakan alat batu sederhana.</p>` },
          
        
        
      ]
    },
    ips: {
      judul: "🌍 IPS", 
      sub: "Ilmu Pengetahuan Sosial · Kelas 10",
      bab: [
        { 
            judul: "Pengantar Ilmu Sejarah", 
            video: "gDVm1ncqTBU", 
            teks: 
            `<h6>Pengantar Ilmu Sejarah</h6><p>Diapit dua benua (Asia & Australia) dan dua samudra (Hindia & Pasifik).</p>` },
        { 
            judul: "Penelitian Sejarah", 
            video: "JLxJtMe1ycg", 
            teks: 
            `<h6>Penelitian Sejarah</h6><p>Diapit dua benua (Asia & Australia) dan dua samudra (Hindia & Pasifik).</p>` },
        { 
            judul: "Teori Asal Usul Nenek Moyang Indonesia", 
            video: "dgFLraT6wQg", 
            teks: 
            `<h6>Teori Asal Usul Nenek Moyang Indonesia</h6><p>Diapit dua benua (Asia & Australia) dan dua samudra (Hindia & Pasifik).</p>` },
        { 
            judul: "Mengenal Jejak Manusia Purba", 
            video: "hPN1CelBRGw", 
            teks: 
            `<h6>Mengenal Jejak Manusia Purba</h6><p>Diapit dua benua (Asia & Australia) dan dua samudra (Hindia & Pasifik).</p>` },
        { 
            judul: "Masuknya Agama dan Kebudayaan Hindu Budha di Indonesia", 
            video: "Qg3_Ef9uI9w", 
            teks: 
            `<h6>Masuknya Agama dan Kebudayaan Hindu Budha di Indonesia</h6><p>Diapit dua benua (Asia & Australia) dan dua samudra (Hindia & Pasifik).</p>` },
        { 
            judul: "Pengaruh Hindu dan Budha di Kehidupan Masa Kini", 
            video: "Bom8yxCo9Ww", 
            teks: 
            `<h6>Pengaruh Hindu dan Budha di Kehidupan Masa Kini</h6><p>Diapit dua benua (Asia & Australia) dan dua samudra (Hindia & Pasifik).</p>` },
        { 
            judul: "Teori Masuknya Islam ke Indonesia ", 
            video: "SJGglOpNj9g", 
            teks: 
            `<h6>Teori Masuknya Islam ke Indonesia </h6><p>Diapit dua benua (Asia & Australia) dan dua samudra (Hindia & Pasifik).</p>` },
        { 
            judul: "Pengaruh Agama Islam di Masa Kini", 
            video: "W05BbZTGJpg", 
            teks: 
            `<h6>Pengaruh Agama Islam di Masa Kini</h6><p>Diapit dua benua (Asia & Australia) dan dua samudra (Hindia & Pasifik).</p>` },
        { 
            judul: "Pengaruh Hasil dan Nilai Budaya Praaksara di Zaman Sekarang", 
            video: "15PXIlPR4To", 
            teks: 
            `<h6>Pengaruh Hasil dan Nilai Budaya Praaksara di Zaman Sekarang</h6><p>Diapit dua benua (Asia & Australia) dan dua samudra (Hindia & Pasifik).</p>` },
        { 
            judul: "Corak Kehidupan Manusia Masa Praaksara ", 
            video: "y_E6IqOEtJc", 
            teks: 
            `<h6>Corak Kehidupan Manusia Masa Praaksara </h6><p>Diapit dua benua (Asia & Australia) dan dua samudra (Hindia & Pasifik).</p>` },

        
      ]
    },
    mtk: {
      judul: "📐 Matematika", 
      sub: "Matematika · Kelas 10",
      bab: [
        { 
            judul: "Definisi dan Sifat Sifat Eksponen", 
            video: "lScgN1qnirY", 
            teks: `<p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
            judul: "Fungsi Eksponen", 
            video: "fj4B6etl8zs", 
            teks: `<p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
            judul: "Bentuk Akar", 
            video: "GoYk9NBdkn4", 
            teks: ` <p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
            judul: "Persamaan Logaritma", 
            video: "ErOxc0WHu2M", 
            teks: ` <p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
            judul: "Pertidaksamaan Logaritma", 
            video: "CGSuMUfkAxQ", 
            teks: ` <p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
            judul: "Deret Geometri", 
            video: "PoUUNz6StSw", 
            teks: ` <p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
            judul: "Konsep Dasar Vektor", 
            video: "5jKGcT-JYtw", 
            teks: ` <p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
            judul: "Mean", 
            video: "XQ8UJAMJcUQ", 
            teks: ` <p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
         { 
            judul: "Modus", 
            video: "1tQAn-wylgg", 
            teks: ` <p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
         { 
            judul: "Median", 
            video: "9oP4zCpNOnY", 
            teks: ` <p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
      ]
    },
    indo: {
      judul: "📝 Bahasa Indonesia", sub: "Bahasa Indonesia · Kelas 10",
      bab: [
        { 
          judul: "Teks Laporan Hasil Observasi", 
          video: "On2mvtL5U5k", 
          teks: `<h6>Teks Laporan Hasil Observasi</h6><p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
          judul: "Teks Editorial", 
          video: "On2DF22wOmesBA", 
          teks: `<h6>Teks Editorial</h6><p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
          judul: "Laporan Hasil Observasi", 
          video: "t-utIU_UAiI", 
          teks: `<h6>Laporan Hasil Observasi</h6><p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
          judul: "Teks Hikayat", 
          video: "Y4YnzVxywU0", 
          teks: `<h6>Teks Hikayat</h6><p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
          judul: "Teks Negosiasi", 
          video: "etGTCRh1w08", 
          teks: `<h6>Teks Negosiasi</h6><p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
      ]
    },
    inggris: {
      judul: "💬 Bahasa Inggris", sub: "Bahasa Inggris · Kelas 10",
      bab: [
        { 
          judul: "Descriptive Text", 
          video: "Fdl8WLeTy3o", 
          teks: `<h6>Descriptive Text</h6><p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
          judul: "Poster, Banner, Pamphlet and Brochure", 
          video: "BuEmHCpGUAw", 
          teks: `<h6>Poster, Banner, Pamphlet and Brochure</h6><p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
          judul: "Recount Text", 
          video: "zGRZlDudZtI", 
          teks: `<h6>Recount Text</h6><p></p>` },
        { 
          judul: "Narrative Text", 
          video: "GRQm4x6GtAo", 
          teks: `<h6>Narrative Text</h6><p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
          judul: "Reported Speech", 
          video: "cpRz1MPSV0Q", 
          teks: `<h6>Reported Speech</h6><p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
          judul: "Introducing Oneself and Others", 
          video: "IQDPx8FFexI", 
          teks: `<h6>Introducing Oneself and Others</h6><p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
          judul: "Hortatory Exposition", 
          video: "NQgATZ2tJqU", 
          teks: `<h6>Hortatory Exposition</h6><p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
          judul: "Announcement", 
          video: "M0lGABTY63s", 
          teks: `<h6>Announcement</h6><p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
          judul: "Report Text", 
          video: "-gBZCCOac8w", 
          teks: `<h6>Report Text</h6><p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        { 
          judul: "Analytical Exposition", 
          video: "-A3xhBuO8UQg", 
          teks: `<h6>Analytical Exposition</h6><p>Kebalikan dari eksponen. ᵃlog b = c artinya aᶜ = b</p>` },
        
      ]
    },
  },

  11: {
    ipa:     { judul: "🔬 IPA",             sub: "Ilmu Pengetahuan Alam · Kelas 11",   bab: [{ judul: "Bab 1 – Sel & Jaringan",        video: "VIDEO_ID", teks: `<h6>Jaringan Tumbuhan</h6><p>Terdiri dari jaringan meristem dan jaringan permanen (epidermis, parenkim, kolenkim, sklerenkim).</p><h6 class="mt-3">Jaringan Hewan</h6><p>Meliputi jaringan epitel, otot, saraf, dan ikat.</p>` }, { judul: "Bab 2 – Sistem Gerak", video: "VIDEO_ID", teks: `<h6>Tulang</h6><p>Fungsi tulang: penyangga tubuh, perlindungan organ, tempat melekatnya otot.</p><h6 class="mt-3">Sendi & Otot</h6><p>Sendi menghubungkan antar tulang. Otot menghasilkan gerakan melalui kontraksi dan relaksasi.</p>` }] },
    ips:     { judul: "🌍 IPS",             sub: "Ilmu Pengetahuan Sosial · Kelas 11",  bab: [{ judul: "Bab 1 – Kerajaan Hindu-Buddha", video: "VIDEO_ID", teks: `<h6>Kerajaan Kutai</h6><p>Kerajaan Hindu tertua di Indonesia, berdiri sekitar abad ke-4 M di Kalimantan Timur.</p><h6 class="mt-3">Kerajaan Majapahit</h6><p>Kerajaan Hindu-Buddha terbesar di Nusantara, berdiri tahun 1293 M.</p>` }, { judul: "Bab 2 – Kerajaan Islam", video: "VIDEO_ID", teks: `<h6>Samudera Pasai</h6><p>Kerajaan Islam pertama di Indonesia, berdiri di Aceh sekitar abad ke-13 M.</p><h6 class="mt-3">Kesultanan Demak</h6><p>Kerajaan Islam pertama di Pulau Jawa, didirikan oleh Raden Patah.</p>` }] },
    mtk:     { judul: "📐 Matematika",      sub: "Matematika · Kelas 11",              bab: [{ judul: "Bab 1 – Limit Fungsi",          video: "VIDEO_ID", teks: `<h6>Pengertian Limit</h6><p>Limit fungsi f(x) saat x mendekati a adalah nilai yang didekati f(x) ketika x semakin dekat ke a.</p><h6 class="mt-3">Sifat-sifat Limit</h6><ul><li>lim [f(x) ± g(x)] = lim f(x) ± lim g(x)</li><li>lim [f(x) × g(x)] = lim f(x) × lim g(x)</li></ul>` }, { judul: "Bab 2 – Turunan Fungsi", video: "VIDEO_ID", teks: `<h6>Definisi Turunan</h6><p>f'(x) = lim [f(x+h) – f(x)] / h saat h → 0</p><h6 class="mt-3">Rumus Turunan</h6><ul><li>d/dx (xⁿ) = n·xⁿ⁻¹</li><li>d/dx (sin x) = cos x</li><li>d/dx (cos x) = −sin x</li></ul>` }] },
    indo:    { judul: "📝 Bahasa Indonesia", sub: "Bahasa Indonesia · Kelas 11",        bab: [{ judul: "Bab 1 – Teks Prosedur",         video: "VIDEO_ID", teks: `<h6>Struktur</h6><ul><li>Tujuan – hasil akhir yang ingin dicapai</li><li>Material – bahan/alat yang dibutuhkan</li><li>Langkah-langkah – urutan cara melakukan</li></ul>` }, { judul: "Bab 2 – Teks Eksplanasi", video: "VIDEO_ID", teks: `<h6>Pengertian</h6><p>Teks yang menjelaskan proses terjadinya suatu fenomena alam atau sosial.</p><h6 class="mt-3">Struktur</h6><ul><li>Pernyataan umum</li><li>Deretan penjelas</li><li>Interpretasi</li></ul>` }] },
    inggris: { judul: "💬 Bahasa Inggris",  sub: "Bahasa Inggris · Kelas 11",           bab: [{ judul: "Bab 1 – Passive Voice",         video: "VIDEO_ID", teks: `<h6>Formula</h6><ul><li>Active: S + V + O</li><li>Passive: S + to be + V3 + (by agent)</li></ul><h6 class="mt-3">Example</h6><ul><li>Active: She writes a letter.</li><li>Passive: A letter is written by her.</li></ul>` }, { judul: "Bab 2 – Conditional Sentence", video: "VIDEO_ID", teks: `<h6>Type 1 – Real Condition</h6><p>If + Simple Present, will + V1. Contoh: If it rains, I will stay home.</p><h6 class="mt-3">Type 2 – Unreal Present</h6><p>If + Simple Past, would + V1. Contoh: If I were rich, I would travel the world.</p>` }] },
  },

  12: {
    ipa:     { judul: "🔬 IPA",             sub: "Ilmu Pengetahuan Alam · Kelas 12",   bab: [{ judul: "Bab 1 – Pertumbuhan & Perkembangan", video: "VIDEO_ID", teks: `<h6>Pertumbuhan</h6><p>Pertambahan ukuran yang bersifat kuantitatif dan irreversibel. Dipengaruhi faktor internal (gen, hormon) dan eksternal (cahaya, suhu, air).</p>` }, { judul: "Bab 2 – Metabolisme", video: "VIDEO_ID", teks: `<h6>Katabolisme</h6><p>Reaksi pemecahan molekul kompleks menjadi sederhana disertai pelepasan energi. Contoh: respirasi seluler.</p><h6 class="mt-3">Anabolisme</h6><p>Reaksi pembentukan molekul kompleks dari sederhana dengan memerlukan energi. Contoh: fotosintesis.</p>` }] },
    ips:     { judul: "🌍 IPS",             sub: "Ilmu Pengetahuan Sosial · Kelas 12",  bab: [{ judul: "Bab 1 – Indonesia Masa Kemerdekaan", video: "VIDEO_ID", teks: `<h6>Proklamasi Kemerdekaan</h6><p>Diproklamasikan tanggal 17 Agustus 1945 oleh Soekarno-Hatta di Jakarta.</p><h6 class="mt-3">Sidang PPKI</h6><p>Mengesahkan UUD 1945 dan memilih presiden serta wakil presiden pertama.</p>` }, { judul: "Bab 2 – Orde Baru & Reformasi", video: "VIDEO_ID", teks: `<h6>Orde Baru (1966–1998)</h6><p>Dipimpin Soeharto. Fokus pada pembangunan ekonomi dengan stabilitas politik yang ketat.</p><h6 class="mt-3">Reformasi (1998–sekarang)</h6><p>Dimulai dengan pengunduran diri Soeharto. Terjadi demokratisasi dan desentralisasi pemerintahan.</p>` }] },
    mtk:     { judul: "📐 Matematika",      sub: "Matematika · Kelas 12",              bab: [{ judul: "Bab 1 – Integral",              video: "VIDEO_ID", teks: `<h6>Integral Tak Tentu</h6><p>∫xⁿ dx = xⁿ⁺¹/(n+1) + C, untuk n ≠ −1</p><h6 class="mt-3">Integral Tertentu</h6><p>∫[a→b] f(x) dx = F(b) − F(a), di mana F adalah antiturunan f.</p>` }, { judul: "Bab 2 – Statistika", video: "VIDEO_ID", teks: `<h6>Ukuran Pemusatan</h6><ul><li>Mean – rata-rata nilai</li><li>Median – nilai tengah</li><li>Modus – nilai yang paling sering muncul</li></ul><h6 class="mt-3">Ukuran Penyebaran</h6><ul><li>Jangkauan = nilai maks − nilai min</li><li>Simpangan baku (standar deviasi)</li></ul>` }] },
    indo:    { judul: "📝 Bahasa Indonesia", sub: "Bahasa Indonesia · Kelas 12",        bab: [{ judul: "Bab 1 – Teks Editorial",        video: "VIDEO_ID", teks: `<h6>Pengertian</h6><p>Teks yang berisi pendapat atau pandangan redaksi terhadap isu aktual yang berkembang di masyarakat.</p><h6 class="mt-3">Struktur</h6><ul><li>Pengenalan isu</li><li>Penyampaian pendapat</li><li>Penegasan ulang</li></ul>` }, { judul: "Bab 2 – Surat Lamaran Kerja", video: "VIDEO_ID", teks: `<h6>Komponen Surat</h6><ul><li>Tempat dan tanggal penulisan</li><li>Perihal dan lampiran</li><li>Alamat tujuan</li><li>Salam pembuka</li><li>Isi surat (pembuka, inti, penutup)</li><li>Salam penutup & tanda tangan</li></ul>` }] },
    inggris: { judul: "💬 Bahasa Inggris",  sub: "Bahasa Inggris · Kelas 12",           bab: [{ judul: "Bab 1 – Reported Speech",       video: "VIDEO_ID", teks: `<h6>Direct vs Indirect Speech</h6><p>Direct: She said, "I am happy."<br>Indirect: She said that she was happy.</p><h6 class="mt-3">Perubahan Tense</h6><ul><li>Simple present → Simple past</li><li>Present continuous → Past continuous</li><li>Will → Would</li></ul>` }, { judul: "Bab 2 – Argumentative Essay", video: "VIDEO_ID", teks: `<h6>Structure</h6><ul><li>Introduction – background & thesis statement</li><li>Body Paragraph 1 – argument + evidence</li><li>Body Paragraph 2 – argument + evidence</li><li>Counter-argument – opposing view + rebuttal</li><li>Conclusion – restate thesis & closing</li></ul>` }] },
  }
};

let kelasAktif = 10;

function gantiKelas(val) {
  kelasAktif = parseInt(val);
  // Reset tampilan
  document.getElementById('mainContent').style.display = 'none';
  document.querySelectorAll('.mapel-btn').forEach(b => b.classList.remove('active'));
}

function showMapel(key, btn) {
  document.querySelectorAll('.mapel-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');

  const mapel = materi[kelasAktif][key];
  document.getElementById('judulMapel').textContent = mapel.judul;
  document.getElementById('judulKelas').textContent = mapel.sub;

  let html = '';
  mapel.bab.forEach((bab, i) => {
    html += `<button class="bab-btn" onclick="showBab('${key}', ${i}, this)">${bab.judul}</button>`;
  });
  document.getElementById('babList').innerHTML = html;

  // Reset konten ke empty state
  document.getElementById('kontenBab').innerHTML = `
    <div class="empty-state">
      <span class="empty-emoji">👈</span>
      <h3>Pilih bab untuk mulai belajar</h3>
      <p>Klik salah satu bab di sebelah kiri</p>
    </div>
    <div class="tip-grid">
      <div class="tip-card"><span class="tip-icon">🎯</span><strong>Belajar Fokus</strong><span>Selesaikan satu bab sebelum lanjut ke berikutnya</span></div>
      <div class="tip-card"><span class="tip-icon">📹</span><strong>Tonton Videonya</strong><span>Video penjelasan tersedia di setiap bab materi</span></div>
      <div class="tip-card"><span class="tip-icon">✍️</span><strong>Catat Poin Penting</strong><span>Tulis ringkasan agar lebih mudah diingat</span></div>
      <div class="tip-card"><span class="tip-icon">🏆</span><strong>Kerjakan Quiz</strong><span>Uji pemahaman setelah selesai belajar</span></div>
    </div>
  `;
  document.getElementById('infoBanner').style.display = 'none';
  document.getElementById('mainContent').style.display = 'flex';
}

function showBab(key, i, btn) {
  document.querySelectorAll('.bab-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');

  const bab = materi[kelasAktif][key].bab[i];
  const mapel = materi[kelasAktif][key];

  document.getElementById('bannerJudul').textContent = bab.judul;
  document.getElementById('bannerSub').textContent = mapel.sub;
  document.getElementById('infoBanner').style.display = 'flex';

  document.getElementById('kontenBab').innerHTML = `
    <div class="card p-4">
      <h5 class="mb-3">${bab.judul}</h5>
      <div class="ratio ratio-16x9 mb-3">
        <iframe src="https://www.youtube.com/embed/${bab.video}" allowfullscreen></iframe>
      </div>
      ${bab.teks}
    </div>
  `;
}
</script>

</body>
</html>