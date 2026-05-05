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
        <li class="nav-item"><a class="nav-link" href="quiz.php">Quiz</a></li>
        <li class="nav-item"><a class="nav-link" href="leaderboard.php">Leaderboard</a></li>
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
        <div class="stat-num" id="totalBab">25</div>
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
            `<p>Gerak lurus adalah gerakan benda yang terjadi pada satu garis lurus, baik dengan kecepatan tetap (gerak lurus beraturan) maupun dengan percepatan (gerak lurus berubah beraturan). Dalam materi ini dipelajari hubungan antara jarak, perpindahan, waktu, kecepatan, dan percepatan, serta bagaimana membaca grafik gerak dalam kehidupan sehari-hari seperti kendaraan yang bergerak di jalan.</p>`},
        { 
            judul: "Konfigurasi Elektron", 
            video: "c6aQPwRnUw0", 
            teks: 
            `<p>Konfigurasi elektron adalah susunan elektron dalam atom berdasarkan tingkat energi dan kulit atom. Materi ini menjelaskan bagaimana elektron menempati orbital sesuai aturan tertentu seperti aturan Aufbau, prinsip Pauli, dan aturan Hund, yang sangat penting untuk memahami sifat kimia suatu unsur.</p>` },
        { 
            judul: "Gerak Melingkar", 
            video: "PX57IZoUEvs", 
            teks: 
            `<p>Gerak melingkar adalah gerakan benda yang mengikuti lintasan berbentuk lingkaran dengan kecepatan tertentu. Materi ini menjelaskan konsep kecepatan sudut, periode, frekuensi, serta gaya sentripetal yang membuat benda tetap bergerak melingkar, seperti pada roda atau planet.</p>` },
        { 
            judul: "Momentum dan Impuls", 
            video: "l6SVStydZT4", 
            teks: 
            `<p>Momentum adalah hasil kali massa dan kecepatan suatu benda, sedangkan impuls adalah gaya yang bekerja dalam selang waktu tertentu yang menyebabkan perubahan momentum. Materi ini menjelaskan hukum kekekalan momentum dalam peristiwa seperti tumbukan.</p>` },
        { 
            judul: "Virus", 
            video: "8glI_X1XoBE", 
            teks: 
            `<p>Virus adalah organisme yang sangat kecil dan hanya dapat berkembang biak di dalam sel inang. Materi ini membahas struktur virus, cara reproduksi, dan perannya sebagai penyebab penyakit.</p>` },
        { 
            judul: "Efek Rumah Kaca dan Pemanasan Global", 
            video: "pVjXm340tbw", 
            teks: 
            `<p>Efek rumah kaca adalah proses tertahannya panas di atmosfer bumi akibat gas tertentu, yang menyebabkan peningkatan suhu global. Materi ini juga membahas dampak dan upaya penanggulangannya.</p>` },
         { 
            judul: "Perubahan Lingkungan", 
            video: "abfIbM4hWIk", 
            teks: 
            `<p>Perubahan lingkungan terjadi akibat faktor alam seperti bencana atau aktivitas manusia seperti polusi. Materi ini menjelaskan dampaknya terhadap kehidupan makhluk hidup.</p>` },
        { 
            judul: "Reaksi Kimia", 
            video: "YRZb_hmonsU", 
            teks: 
            `<p>Reaksi kimia adalah proses perubahan zat menjadi zat baru yang biasanya ditandai dengan perubahan warna, suhu, atau terbentuk gas.</p>` },
        { 
            judul: "Unsur, Senyawa, Campuran", 
            video: "qEnCeg07C-c", 
            teks: 
            `<p>Materi ini menjelaskan jenis-jenis zat berdasarkan komposisinya, yaitu unsur sebagai zat murni, senyawa sebagai gabungan unsur, dan campuran sebagai gabungan fisik.</p>` },
        { 
            judul: "Besaran, Satuan dan Dimensi", 
            video: "xefe-f5GxBI", 
            teks: 
            `<p>Materi dasar fisika yang membahas jenis besaran seperti panjang dan massa, satuan pengukuran, serta dimensi untuk memastikan kesesuaian rumus.</p>` },
          
        
        
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
            `<p>Ilmu sejarah adalah ilmu yang mempelajari peristiwa masa lalu manusia secara sistematis untuk memahami perkembangan kehidupan manusia dari waktu ke waktu. Dalam materi ini dipelajari pengertian sejarah menurut para ahli, unsur-unsur sejarah seperti manusia, waktu, dan ruang, serta fungsi sejarah sebagai sumber pembelajaran agar manusia tidak mengulangi kesalahan di masa lalu.</p>` },
        { 
            judul: "Penelitian Sejarah", 
            video: "JLxJtMe1ycg", 
            teks: 
            `<p>Penelitian sejarah adalah proses untuk mengkaji dan merekonstruksi peristiwa masa lalu melalui langkah-langkah ilmiah. Tahapannya meliputi heuristik (pengumpulan sumber), verifikasi (pengujian keaslian sumber), interpretasi (penafsiran), dan historiografi (penulisan sejarah), sehingga hasil penelitian dapat dipercaya.</p>` },
        { 
            judul: "Teori Asal Usul Nenek Moyang Indonesia", 
            video: "dgFLraT6wQg", 
            teks: 
            `<p>Materi ini membahas berbagai teori tentang asal-usul bangsa Indonesia, seperti teori Yunan, Out of Taiwan, dan teori Nusantara. Setiap teori memiliki bukti dan pendukung masing-masing, seperti kesamaan bahasa, budaya, dan temuan arkeologi, yang membantu menjelaskan bagaimana nenek moyang bangsa Indonesia bermigrasi.</p>` },
        { 
            judul: "Mengenal Jejak Manusia Purba", 
            video: "hPN1CelBRGw", 
            teks: 
            `<p>Materi ini mempelajari jenis-jenis manusia purba yang ditemukan di Indonesia, seperti Meganthropus, Pithecanthropus, dan Homo sapiens. Selain itu, dibahas juga ciri-ciri fisik, pola kehidupan, serta peninggalan yang menunjukkan perkembangan manusia dari masa ke masa.</p>` },
        { 
            judul: "Masuknya Agama dan Kebudayaan Hindu Budha di Indonesia", 
            video: "Qg3_Ef9uI9w", 
            teks: 
            `<p>Materi ini menjelaskan bagaimana agama Hindu dan Buddha masuk ke Indonesia melalui jalur perdagangan dan interaksi budaya. Teori seperti Brahmana, Ksatria, dan Waisya digunakan untuk menjelaskan proses penyebarannya.</p>` },
        { 
            judul: "Pengaruh Hindu dan Budha di Kehidupan Masa Kini", 
            video: "Bom8yxCo9Ww", 
            teks: 
            `<p>Pengaruh Hindu-Buddha dapat dilihat dari berbagai aspek kehidupan seperti seni, arsitektur (candi), bahasa, dan sistem pemerintahan. Materi ini membantu memahami warisan budaya yang masih ada hingga sekarang.</p>` },
        { 
            judul: "Teori Masuknya Islam ke Indonesia ", 
            video: "SJGglOpNj9g", 
            teks: 
            `<p>Materi ini membahas bagaimana Islam masuk ke Indonesia melalui berbagai teori seperti teori Gujarat, Persia, dan Arab. Penyebarannya dilakukan secara damai melalui perdagangan, dakwah, dan budaya.</p>` },
        { 
            judul: "Pengaruh Agama Islam di Masa Kini", 
            video: "W05BbZTGJpg", 
            teks: 
            `<p>Pengaruh Islam terlihat dalam budaya, pendidikan, sistem sosial, dan kehidupan masyarakat Indonesia, termasuk tradisi dan nilai-nilai keagamaan.</p>` },
        { 
            judul: "Pengaruh Hasil dan Nilai Budaya Praaksara di Zaman Sekarang", 
            video: "15PXIlPR4To", 
            teks: 
            `<p>Budaya praaksara meninggalkan nilai-nilai seperti gotong royong, kepercayaan terhadap alam, dan cara hidup sederhana yang masih terlihat dalam kehidupan masyarakat modern.</p>` },
        { 
            judul: "Corak Kehidupan Manusia Masa Praaksara ", 
            video: "y_E6IqOEtJc", 
            teks: 
            `<p>Materi ini membahas kehidupan manusia sebelum mengenal tulisan, termasuk cara berburu, bercocok tanam, serta perkembangan alat-alat yang digunakan dalam kehidupan sehari-hari.</p>` },

        
      ]
    },
    mtk: {
      judul: "📐 Matematika", 
      sub: "Matematika · Kelas 10",
      bab: [
        { 
            judul: "Definisi dan Sifat Sifat Eksponen", 
            video: "lScgN1qnirY", 
            teks: `<p>Eksponen adalah cara menuliskan perkalian berulang dalam bentuk yang lebih sederhana, misalnya dua pangkat tiga berarti dua dikalikan dengan dirinya sendiri sebanyak tiga kali. Dalam materi ini, kamu akan mempelajari berbagai aturan penting seperti jika bilangan dengan basis sama dikalikan maka pangkatnya dijumlahkan, jika dibagi maka pangkatnya dikurangkan, dan jika dipangkatkan lagi maka pangkatnya dikalikan. Konsep ini sangat penting karena sering digunakan dalam perhitungan besar seperti pertumbuhan populasi atau perhitungan ilmiah.</p>` },
        { 
            judul: "Fungsi Eksponen", 
            video: "fj4B6etl8zs", 
            teks: `<p>Materi ini membahas fungsi eksponen, termasuk bentuk umum, grafik, dan aplikasinya dalam kehidupan sehari-hari.</p>` },
        { 
            judul: "Bentuk Akar", 
            video: "GoYk9NBdkn4", 
            teks: ` <p>Bentuk akar adalah kebalikan dari pangkat, misalnya akar kuadrat berarti mencari bilangan yang jika dikalikan dengan dirinya sendiri menghasilkan bilangan tertentu. Dalam materi ini kamu akan belajar menyederhanakan bentuk akar, mengalikan dan membagi akar, serta mengubah bentuk akar menjadi bentuk pangkat dan sebaliknya. Selain itu juga dipelajari cara merasionalkan penyebut agar bentuknya lebih sederhana.</p>` },
        { 
            judul: "Persamaan Logaritma", 
            video: "ErOxc0WHu2M", 
            teks: ` <p>Persamaan logaritma adalah persamaan yang mengandung logaritma dan harus diselesaikan dengan mengubahnya ke bentuk eksponen atau menggunakan sifat-sifat logaritma. Dalam penyelesaiannya, kamu juga harus memperhatikan bahwa nilai di dalam logaritma harus selalu positif, sehingga tidak semua hasil perhitungan bisa diterima sebagai jawaban.</p>` },
        { 
            judul: "Pertidaksamaan Logaritma", 
            video: "CGSuMUfkAxQ", 
            teks: ` <p>Pertidaksamaan logaritma adalah bentuk perbandingan yang melibatkan logaritma, seperti lebih besar atau lebih kecil. Dalam menyelesaikannya, kamu harus memahami sifat fungsi logaritma, terutama apakah grafiknya naik atau turun, karena hal ini memengaruhi arah tanda ketidaksamaan. Selain itu, syarat nilai logaritma tetap harus dipenuhi.</p>` },
        { 
            judul: "Deret Geometri", 
            video: "PoUUNz6StSw", 
            teks: ` <p>Deret geometri adalah jumlah dari barisan geometri. Materi ini membahas cara menghitung total dari suatu barisan yang berkembang secara perkalian, yang sering digunakan dalam perhitungan bunga majemuk atau pertumbuhan.</p>` },
        { 
            judul: "Konsep Dasar Vektor", 
            video: "5jKGcT-JYtw", 
            teks: ` <p>Vektor adalah besaran yang memiliki nilai dan arah, berbeda dengan skalar yang hanya memiliki nilai. Dalam kehidupan sehari-hari, vektor digunakan untuk menunjukkan arah dan besar suatu gaya atau perpindahan.</p>` },
        { 
            judul: "Mean", 
            video: "XQ8UJAMJcUQ", 
            teks: ` <p>Mean adalah nilai rata-rata yang dihitung dari sekumpulan data.</p>` },
         { 
            judul: "Modus", 
            video: "1tQAn-wylgg", 
            teks: ` <p>Modus adalah nilai yang paling sering muncul dalam sekumpulan data.</p>` },
         { 
            judul: "Median", 
            video: "9oP4zCpNOnY", 
            teks: ` <p>Median adalah nilai tengah dari sekumpulan data yang telah diurutkan.</p>` },
      ]
    },
    indo: {
      judul: "📝 Bahasa Indonesia", sub: "Bahasa Indonesia · Kelas 10",
      bab: [
        { 
          judul: "Teks Laporan Hasil Observasi", 
          video: "On2mvtL5U5k", 
          teks: `<p>Teks laporan hasil observasi adalah teks yang berisi hasil pengamatan terhadap suatu objek secara sistematis, objektif, dan faktual. Dalam teks ini, informasi disusun secara terstruktur mulai dari definisi umum hingga rincian bagian-bagian objek yang diamati. Tujuan utama teks ini adalah memberikan informasi yang akurat tanpa opini penulis, sehingga sering digunakan dalam bidang ilmiah dan pendidikan.</p>` },
        { 
          judul: "Teks Editorial", 
          video: "On2DF22wOmesBA", 
          teks: `<p>Teks editorial adalah teks yang berisi pendapat atau pandangan penulis terhadap suatu isu aktual yang sedang terjadi di masyarakat. Teks ini biasanya ditemukan di surat kabar dan bertujuan untuk memengaruhi pembaca dengan memberikan argumen yang logis dan didukung fakta. Struktur teks editorial meliputi pernyataan pendapat, argumentasi, dan penegasan ulang.</p>` },
        { 
          judul: "Laporan Hasil Observasi", 
          video: "t-utIU_UAiI", 
          teks: `<p>Pada bagian ini, pembahasan lebih menekankan pada analisis struktur dan kaidah kebahasaan teks laporan observasi, seperti penggunaan kalimat definisi, klasifikasi, dan deskripsi. Selain itu, siswa juga dilatih untuk membuat teks observasi sendiri berdasarkan hasil pengamatan langsung.</p>` },
        { 
          judul: "Teks Hikayat", 
          video: "Y4YnzVxywU0", 
          teks: `<p>...</p>` },
        { 
          judul: "Teks Negosiasi", 
          video: "etGTCRh1w08", 
          teks: `<p>Teks negosiasi adalah teks yang berisi proses tawar-menawar antara dua pihak atau lebih untuk mencapai kesepakatan bersama. Dalam teks ini terdapat dialog yang menunjukkan proses penawaran, permintaan, dan persetujuan dengan tujuan saling menguntungkan.</p>` },
        { 
          judul: "Teks Anekdot", 
          video: "nM6mIbTyJbU", 
          teks: `<p>Teks anekdot adalah cerita singkat yang lucu dan mengandung kritik terhadap suatu fenomena atau tokoh. Meskipun bersifat humor, teks ini memiliki tujuan menyampaikan sindiran atau pesan moral secara halus.</p>` },
        { 
          judul: "Teks Biografi", 
          video: "wVj3imtVH4I", 
          teks: `<p>Teks biografi adalah teks yang menceritakan riwayat hidup seseorang, biasanya tokoh terkenal, mulai dari latar belakang, perjalanan hidup, hingga pencapaiannya. Tujuannya adalah memberikan inspirasi dan teladan bagi pembaca.</p>` },
        { 
          judul: "Teks Debat", 
          video: "r1hrVHe_1sM", 
          teks: `<p>Teks debat adalah teks yang berisi pertukaran argumen antara dua pihak yang memiliki pendapat berbeda terhadap suatu isu. Dalam debat terdapat pihak pro dan kontra yang saling memberikan alasan untuk mempertahankan pendapat masing-masing secara logis dan sistematis.</p>` },
      ]
    },
    inggris: {
      judul: "💬 Bahasa Inggris", sub: "Bahasa Inggris · Kelas 10",
      bab: [
        { 
          judul: "Descriptive Text", 
          video: "Fdl8WLeTy3o", 
          teks: `<p>Descriptive text is a type of text used to describe a particular person, place, object, or animal in detail so that the reader can clearly imagine it. This text focuses on specific characteristics such as appearance, qualities, and features, and it commonly uses many adjectives. The structure usually consists of identification, which introduces the subject, and description, which explains its details in depth.</p>` },
        { 
          judul: "Poster, Banner, Pamphlet and Brochure", 
          video: "BuEmHCpGUAw", 
          teks: `<p>These are forms of visual communication used to deliver information, promotion, or messages to the public. A poster is usually short and eye-catching, a banner is often displayed in public places for announcements, a pamphlet provides brief information, while a brochure contains more detailed explanations, often used in marketing products, services, or events.</p>` },
        { 
          judul: "Recount Text", 
          video: "zGRZlDudZtI", 
          teks: `<p>Recount text is a type of text that retells past events or experiences in chronological order. Its main purpose is to inform or entertain readers by sharing what happened. It uses past tense verbs and typically has three parts: orientation (background information), events (series of happenings), and reorientation (closing or personal comment).</p>` },
        { 
          judul: "Narrative Text", 
          video: "GRQm4x6GtAo", 
          teks: `<p>Narrative text is a story text that aims to entertain readers by presenting a sequence of events involving characters, conflicts, and resolutions. It often includes elements such as setting, characters, and plot, and follows a structure of orientation, complication (problem), resolution (solution), and sometimes a moral lesson.</p>` },
        { 
          judul: "Reported Speech", 
          video: "cpRz1MPSV0Q", 
          teks: `<p>Reported speech is used to report what someone has said without quoting their exact words. It involves changes in tense, pronouns, and time expressions to fit the context of the sentence.</p>` },
        { 
          judul: "Introducing Oneself and Others", 
          video: "IQDPx8FFexI", 
          teks: `<p>This topic teaches how to introduce yourself and other people in English in both formal and informal situations. It includes expressions for stating name, origin, occupation, and other personal details, as well as polite responses in conversations.</p>` },
        { 
          judul: "Hortatory Exposition", 
          video: "NQgATZ2tJqU", 
          teks: `<p>Hortatory exposition is a text that aims to persuade readers to take or avoid certain actions. It includes arguments and ends with a recommendation, encouraging readers to follow the writer’s suggestion.</p>` },
        { 
          judul: "Announcement", 
          video: "M0lGABTY63s", 
          teks: `<p>An announcement is a short text used to inform a group of people about important information or events. It must be clear, concise, and direct, often including details such as time, place, and purpose of the announcement.</p>` },
        { 
          judul: "Report Text", 
          video: "-gBZCCOac8w", 
          teks: `<p>Report text is used to present general information about something, such as animals, plants, or natural phenomena, based on facts. It has a structure of general classification followed by detailed description and aims to inform objectively.</p>` },
        { 
          judul: "Analytical Exposition", 
          video: "A3xhBuO8UQg", 
          teks: `<p>Analytical exposition is a type of argumentative text that aims to convince readers that something is true by providing logical arguments. It consists of a thesis (main idea), arguments (supporting reasons), and reiteration (restatement of the opinion).</p>` },
      ]
    },
  },

  11: {
    ipa:   { 
      judul: "🔬 IPA", sub: "Ilmu Pengetahuan Alam · Kelas 11",   
      bab: [
        { 
          judul: "Sejarah Penemuan dan Komponen Penyusunan Sel ",        
          video: "CGRW_AMo3ZA", 
          teks: `<p>Materi ini membahas perkembangan penemuan sel sebagai unit terkecil kehidupan, dimulai dari penemuan mikroskop oleh ilmuwan hingga lahirnya teori sel yang menyatakan bahwa semua makhluk hidup tersusun atas sel. Selain itu, dipelajari juga komponen penyusun sel seperti membran sel, sitoplasma, dan inti sel yang masing-masing memiliki fungsi penting dalam menjaga kehidupan sel.</p>` },
        { 
          judul: "Kesetimbangan Kimia ",        
          video: "xD8TFFL9TRA", 
          teks: `<p>Kesetimbangan kimia adalah keadaan di mana reaksi maju dan reaksi balik berlangsung dengan laju yang sama sehingga tidak terjadi perubahan konsentrasi zat secara makroskopis. Materi ini juga membahas faktor-faktor yang memengaruhi kesetimbangan seperti suhu, tekanan, dan konsentrasi berdasarkan prinsip Le Chatelier.</p>` },  
        { 
          judul: "Komposisi dan Golongan Darah",        
          video: "dxRESjSNKV8", 
          teks: `<p>Materi ini menjelaskan komponen penyusun darah seperti plasma, sel darah merah, sel darah putih, dan trombosit, serta fungsi masing-masing dalam tubuh. Selain itu, dipelajari juga sistem golongan darah seperti ABO dan rhesus yang penting dalam transfusi darah.</p>` },
        { 
          judul: "Faktor Faktor Laju Reaksi",        
          video: "eZxtSQz1gE4", 
          teks: `<p>Laju reaksi adalah kecepatan terjadinya reaksi kimia. Materi ini membahas faktor-faktor yang memengaruhi laju reaksi seperti konsentrasi zat, suhu, luas permukaan, dan penggunaan katalis, serta bagaimana faktor-faktor tersebut mempercepat atau memperlambat reaksi.</p>` },
        { 
          judul: "Suhu dan Pemuaian",        
          video: "Cd8vxMmD9fA", 
          teks: `<p>Materi ini membahas konsep suhu sebagai ukuran panas suatu benda dan pemuaian sebagai perubahan ukuran benda akibat perubahan suhu. Dipelajari juga jenis pemuaian seperti panjang, luas, dan volume, serta penerapannya dalam kehidupan sehari-hari.</p>` },
        { 
          judul: "Sistem Ekskresi Manusia ",        
          video: "N6oly45yK6A", 
          teks: `<p>Sistem ekskresi adalah sistem dalam tubuh yang berfungsi mengeluarkan zat sisa metabolisme. Organ-organ yang terlibat antara lain ginjal, kulit, paru-paru, dan hati, masing-masing memiliki peran penting dalam menjaga keseimbangan tubuh.</p>` },
        { 
          judul: "Struktur dan Organel Sel ",        
          video: "Xxm6xtjsFx0", 
          teks: `<p>Materi ini membahas bagian-bagian sel secara lebih rinci, termasuk organel seperti mitokondria, ribosom, retikulum endoplasma, dan badan Golgi, serta fungsi masing-masing dalam proses kehidupan sel.</p>` },
        { 
          judul: "Jaringan Penyusun Organ Tumbuhan",        
          video: "G3RcGuBIe7I", 
          teks: `<p>Materi ini menjelaskan berbagai jenis jaringan pada tumbuhan seperti jaringan meristem, epidermis, dan jaringan pengangkut (xilem dan floem) yang berfungsi dalam pertumbuhan dan transportasi zat.</p>` },
        { 
          judul: "Zat Zat Makanan",        
          video: "eGV2AAfvG-A", 
          teks: `<p>Zat makanan adalah nutrisi yang dibutuhkan tubuh untuk energi, pertumbuhan, dan perbaikan sel. Materi ini membahas jenis-jenis zat makanan seperti karbohidrat, protein, lemak, vitamin, dan mineral serta fungsinya.</p>` },
        { 
          judul: "Sistem Pencernaan Manusia ",        
          video: "N0PS9OpNgvo", 
          teks: `<p>Sistem pencernaan adalah proses pengolahan makanan menjadi zat yang dapat diserap tubuh. Materi ini membahas organ-organ pencernaan seperti mulut, lambung, usus, serta proses pencernaan mekanik dan kimiawi.</p>` },   
        ] 
      },
    ips:     { 
      judul: "🌍 IPS", sub: "Ilmu Pengetahuan Sosial · Kelas 11",  
      bab: [
        { 
          judul: "Harmoni Sosial dan Integrasi Sosial ", 
          video: "Fo0DQapR_d4", 
          teks: `<p>Harmoni sosial adalah keadaan masyarakat yang hidup rukun, damai, dan seimbang meskipun memiliki perbedaan latar belakang seperti suku, agama, dan budaya. Integrasi sosial merupakan proses penyatuan berbagai unsur dalam masyarakat sehingga tercipta keserasian dan kestabilan sosial. Materi ini menjelaskan pentingnya toleransi, kerja sama, serta nilai-nilai kebersamaan untuk menjaga persatuan dalam kehidupan bermasyarakat.</p>` }, 
        { 
          judul: "Struktur Sosial ",        
          video: "-rNPywECyew", 
          teks: `<p>Struktur sosial adalah susunan atau pola hubungan sosial dalam masyarakat yang membentuk sistem tertentu. Struktur ini mencakup status sosial, peran sosial, dan lembaga sosial yang saling berhubungan. Materi ini membantu memahami bagaimana posisi seseorang dalam masyarakat memengaruhi interaksi sosialnya.</p>` },
        { 
          judul: "Stratifikasi Sosial ",        
          video: "-Jb6lDpuW-k", 
          teks: `<p>Stratifikasi sosial adalah pengelompokan masyarakat ke dalam lapisan-lapisan berdasarkan kriteria tertentu seperti kekayaan, kekuasaan, pendidikan, atau kehormatan. Materi ini membahas jenis-jenis stratifikasi, baik yang terbuka maupun tertutup, serta dampaknya terhadap kehidupan sosial.</p>` },
        { 
          judul: "Diferensi Sosial ",        
          video: "Ikuo1Kj1umU", 
          teks: `<p>Diferensiasi sosial adalah pengelompokan masyarakat secara horizontal tanpa adanya tingkatan, seperti perbedaan suku, agama, profesi, dan jenis kelamin. Materi ini menekankan bahwa perbedaan tersebut tidak menunjukkan mana yang lebih tinggi atau rendah, melainkan keberagaman dalam masyarakat.</p>` },
        { 
          judul: "Penanganan Konflik Sosial",        
          video: "FkDLF_d7LuU", 
          teks: `<p>Konflik sosial adalah pertentangan antara individu atau kelompok dalam masyarakat. Materi ini membahas cara-cara penyelesaian konflik seperti kompromi, mediasi, arbitrase, dan konsiliasi, yang bertujuan menciptakan kembali perdamaian dan kestabilan sosial.</p>` },
        { 
          judul: "Konflik Sosial",        
          video: "-4KB_oTQeec", 
          teks: `<p>Konflik sosial merupakan proses sosial di mana terdapat perbedaan kepentingan yang menimbulkan pertentangan. Materi ini membahas penyebab konflik, bentuk-bentuk konflik, serta dampak positif dan negatifnya dalam kehidupan masyarakat.</p>` },
        { 
          judul: "Definisi Kelompok Sosial ",        
          video: "L1ELn5CtpVM", 
          teks: `<p>Kelompok sosial adalah kumpulan individu yang memiliki interaksi dan kesadaran sebagai bagian dari kelompok tersebut. Materi ini menjelaskan ciri-ciri kelompok sosial seperti adanya tujuan bersama, norma, dan struktur yang mengatur hubungan antar anggota.</p>` },
        { 
          judul: "Permasalahan Sosial Akibat Pengelompokan Sosial",        
          video: "GQ5GeCdN5hw", 
          teks: `<p>Pengelompokan sosial dapat menimbulkan masalah seperti diskriminasi, konflik, dan kesenjangan sosial. Materi ini membahas berbagai bentuk permasalahan sosial serta upaya untuk mengatasinya agar tercipta masyarakat yang lebih adil.</p>` },
        { 
          judul: "Dinamika Kelompok Sosial ",        
          video: "NL92NdPjrfU", 
          teks: `<p>Dinamika kelompok sosial adalah perubahan yang terjadi dalam kelompok seiring waktu, baik dalam struktur, hubungan, maupun tujuan. Materi ini menjelaskan faktor-faktor yang memengaruhi perubahan tersebut serta dampaknya terhadap anggota kelompok.</p>` },
        { 
          judul: "Jenis Kelompok Sosial ",        
          video: "-GePFL9PTGg", 
          teks: `<p>Kelompok sosial memiliki berbagai jenis seperti kelompok primer dan sekunder, formal dan informal, serta kelompok keanggotaan dan referensi. Materi ini membantu memahami karakteristik masing-masing jenis kelompok dan perannya dalam kehidupan sosial.</p>` },
       ] 
      },
    mtk:     { 
      judul: "📐 Matematika", sub: "Matematika · Kelas 11",
      bab: [
        { 
          judul: "Operasi Aljabar Polinomial ",          
          video: "2oPK0eMkwQg", 
          teks: `<p>Materi ini membahas cara melakukan operasi hitung pada polinomial atau suku banyak, seperti penjumlahan, pengurangan, dan perkalian. Polinomial terdiri dari beberapa suku yang memiliki variabel dan pangkat tertentu, dan dalam operasinya harus memperhatikan suku sejenis agar bisa disederhanakan dengan benar.</p>` },
        { 
          judul: "Menetukan Nilai Polinomial dengan Subtitusi dan Skema Horner ",        
          video: "2yXGcZwHlcQ", 
          teks: `<p>Materi ini mengajarkan cara mencari nilai suatu polinomial dengan mengganti variabelnya dengan angka tertentu (substitusi). Selain itu, juga dipelajari metode Horner yang lebih cepat dan efisien untuk menghitung nilai polinomial terutama jika pangkatnya tinggi.</p>` },
        { 
          judul: "Pembagian Polinomial Cara Bersusun, Horner dan Horner-Kino",        
          video: "IcMsjdqXQ10", 
          teks: `<p>Materi ini membahas cara membagi polinomial menggunakan beberapa metode, yaitu cara bersusun seperti pembagian biasa, metode Horner, dan Horner-Kino yang lebih praktis. Tujuannya adalah untuk menyederhanakan bentuk polinomial atau mencari hasil bagi dan sisa.</p>` },
        { 
          judul: "Teorema Sisa dan Teorema Faktor ",        
          video: "cvaFiVOmcJ4", 
          teks: `<p>Teorema sisa digunakan untuk mengetahui sisa hasil pembagian polinomial tanpa harus melakukan pembagian secara lengkap. Sedangkan teorema faktor digunakan untuk menentukan apakah suatu polinomial memiliki faktor tertentu. Materi ini sangat penting dalam menyelesaikan soal pembagian dan faktorisasi.</p>` },
        { 
          judul: "Cara Menentukan Akar Akar Persmaan Polinomial",        
          video: "wHTGxIrINvw", 
          teks: `<p>Materi ini membahas cara mencari nilai yang membuat suatu polinomial bernilai nol, yang disebut akar-akar persamaan. Metode yang digunakan bisa berupa pemfaktoran, mencoba nilai tertentu, atau menggunakan hubungan antar koefisien.</p>` },
        { 
          judul: "Jumlah dan Hasil Kali Akar Akar Persamaan Polinomial dengan Teorema Vieta",        
          video: "0S0aF2nGuSo", 
          teks: `<p>Materi ini menjelaskan hubungan antara akar-akar suatu persamaan dengan koefisiennya tanpa harus mencari akar secara langsung. Dengan memahami hubungan ini, siswa dapat dengan cepat menentukan jumlah atau hasil kali akar-akar persamaan.</p>` },
        { 
          judul: "Pengenalan Matriks ",        
          video: "HqssIxIg7T4", 
          teks: `<p>Matriks adalah susunan bilangan yang ditulis dalam bentuk baris dan kolom. Materi ini membahas jenis-jenis matriks seperti matriks baris, kolom, dan persegi, serta penggunaannya dalam berbagai perhitungan matematika.</p>` },
        { 
          judul: "Operasi Matriks ",        
          video: "2mIQgRSsGyc", 
          teks: `<p>Materi ini membahas cara melakukan operasi pada matriks seperti penjumlahan, pengurangan, dan perkalian. Operasi ini memiliki aturan khusus, terutama dalam perkalian matriks yang harus memperhatikan ukuran baris dan kolom.</p>` },
        { 
          judul: "Determinan Matriks",        
          video: "0Ipy1aKNZa8", 
          teks: `<p>Determinan adalah nilai yang dapat dihitung dari suatu matriks persegi dan memiliki fungsi penting dalam menentukan apakah matriks memiliki invers atau tidak. Materi ini juga digunakan dalam menyelesaikan sistem persamaan.</p>` },
        { 
          judul: "Minor, Kofaktor dan Adjoin ",        
          video: "KWNkmpEpVBY", 
          teks: `<p>Materi ini membahas konsep lanjutan dalam matriks yang digunakan untuk mencari invers matriks. Minor adalah nilai determinan dari submatriks, kofaktor adalah hasil minor dengan tanda tertentu, dan adjoin adalah matriks yang dibentuk dari kofaktor yang ditranspos.</p>` },
       ] 
     },
    indo:    { 
      judul: "📝 Bahasa Indonesia", sub: "Bahasa Indonesia · Kelas 11",        
      bab: [
        { 
          judul: "Teks Cerita Pendek ",         
          video: "kiuspGbe5S4", 
          teks: `<p>Teks cerita pendek atau cerpen adalah karya sastra berbentuk prosa yang menceritakan suatu peristiwa atau pengalaman dengan alur yang singkat dan fokus pada satu konflik utama. Cerpen memiliki unsur intrinsik seperti tokoh, alur, latar, sudut pandang, dan amanat, serta biasanya memberikan kesan mendalam meskipun ceritanya tidak panjang.</p>` }, 
        { 
          judul: "Teks Berita ",        
          video: "H7Q2Jszgx80", 
          teks: `<p>Teks berita adalah teks yang menyampaikan informasi tentang peristiwa yang aktual, faktual, dan penting untuk diketahui masyarakat. Struktur teks berita terdiri dari judul, teras berita (lead), dan isi berita, serta menggunakan prinsip 5W+1H (apa, siapa, kapan, di mana, mengapa, dan bagaimana).</p>` },
        { 
          judul: "Teks Argumentasi",        
          video: "5Ldn0X09gjM", 
          teks: `<p>Teks argumentasi adalah teks yang bertujuan untuk meyakinkan pembaca terhadap suatu pendapat dengan memberikan alasan, bukti, dan data yang logis. Teks ini biasanya digunakan dalam diskusi atau tulisan ilmiah untuk memperkuat suatu pendapat.</p>` },
        { 
          judul: "Teks Ceramah ",        
          video: "N89LxMxBGY8", 
          teks: `<p>Teks ceramah adalah teks yang berisi penyampaian informasi, nasihat, atau ajakan kepada khalayak secara lisan. Ceramah biasanya disampaikan oleh seorang pembicara di depan umum dengan tujuan memberikan pemahaman atau memengaruhi pendengar.</p>` },
        { 
          judul: "Teks Drama ",        
          video: "DSTcuqNRLwE", 
          teks: `<p>Teks drama adalah karya sastra yang ditulis dalam bentuk dialog dan ditujukan untuk dipentaskan. Dalam drama terdapat unsur tokoh, konflik, dialog, dan latar yang menggambarkan kehidupan manusia melalui peran-peran tertentu.</p>` },
        { 
          judul: "Teks Negosiasi ",        
          video: "d9UMp03TYdE", 
          teks: `<p>Teks negosiasi adalah teks yang menggambarkan proses tawar-menawar antara dua pihak atau lebih untuk mencapai kesepakatan bersama. Teks ini biasanya berbentuk dialog yang menunjukkan adanya kepentingan berbeda yang disatukan melalui kesepakatan.</p>` },
        { 
          judul: "Karya Ilmiah ",        
          video: "MXlNyqE0Lks", 
          teks: `<p>Karya ilmiah adalah tulisan yang disusun secara sistematis berdasarkan hasil penelitian atau kajian dengan menggunakan metode ilmiah. Karya ini harus objektif, logis, dan dapat dipertanggungjawabkan, serta memiliki struktur seperti pendahuluan, pembahasan, dan penutup.</p>` },
      ] 
    },
    inggris: { 
      judul: "💬 Bahasa Inggris",  sub: "Bahasa Inggris · Kelas 11",           
      bab: [
        { 
          judul: "Personal Letter",         
          video: "Fq4o7tg9m70", 
          teks: `<p>A personal letter is an informal or semi-formal written message sent to friends, family members, or acquaintances. It is used to share personal experiences, feelings, or news. The structure typically includes the date, greeting, body of the letter, closing, and signature. The language used is usually relaxed and expressive, depending on the relationship between the writer and the recipient.</p>` }, 
        { 
          judul: "Procedure Text",        
          video: "IuNUsIyvUrk", 
          teks: `<p>A procedure text is a type of text that explains how to do something step by step. Its purpose is to guide the reader in completing a task or making something correctly. The structure usually includes a goal (the purpose), materials or ingredients, and steps. It uses imperative sentences, action verbs, and sequencing words like “first,” “next,” and “finally.”</p>` },
        { 
          judul: "Cause and Effect",        
          video: "HX92ebFn4gI", 
          teks: `<p>Cause and effect is a concept used to explain the relationship between events, where one event (the cause) leads to another event (the effect). In this material, students learn how to identify and express these relationships using conjunctions such as “because,” “since,” “therefore,” and “as a result.”</p>` },
        { 
          judul: "Explanation Text",        
          video: "aVzJ8zHy908", 
          teks: `<p>An explanation text is used to describe how or why something happens, especially natural or social phenomena. It focuses on processes and sequences rather than storytelling. The structure includes a general statement followed by a sequence of explanations. It often uses present tense and technical terms.</p>` },
        { 
          judul: "Narrative Essay",        
          video: "-oDXMS6D01w", 
          teks: `<p>A narrative essay is a form of writing that tells a story from the writer’s perspective, often based on real or imagined experiences. It includes elements such as characters, setting, plot, and conflict. The purpose is usually to entertain or convey a meaningful message through storytelling.</p>` },
        { 
          judul: "Reported Speech",        
          video: "cpRz1MPSV0Q", 
          teks: `<p>Reported speech is used to convey what someone else has said without quoting their exact words. It involves changes in verb tense, pronouns, and time expressions to fit the context. This helps in summarizing or retelling conversations.</p>` },
        { 
          judul: "Passive Voice",        
          video: "DGVOYCUoHxw", 
          teks: `<p>Passive voice is a grammatical structure where the focus is on the action or the object receiving the action rather than the subject performing it. It is commonly used in formal writing, reports, or when the doer is unknown or less important.</p>` },
        { 
          judul: "Fractured Story",        
          video: "v0F9CJ4yk5M", 
          teks: `<p>A fractured story is a creative version of a traditional or well-known story that has been altered in some way, such as changing the plot, characters, or point of view. This type of writing encourages creativity and deeper understanding of storytelling techniques.</p>` },
        { 
          judul: "Hortatory Exposition ",        
          video: "NQgATZ2tJqU", 
          teks: `<p>Hortatory exposition is a persuasive text that aims to influence readers to take or avoid a specific action. It presents arguments supported by reasons and ends with a recommendation. The structure includes thesis, arguments, and recommendation.</p>` },
        { 
          judul: "Adjective Order",        
          video: "mnEkTF_uBuA", 
          teks: `<p>Adjective order refers to the correct sequence of adjectives when more than one is used to describe a noun. English has a specific order such as opinion, size, age, shape, color, origin, material, and purpose. Following this order makes sentences sound natural and grammatically correct.</p>` },
      ] 
    },
  },

  12: {
    ipa:   { 
      judul: "🔬 IPA", sub: "Ilmu Pengetahuan Alam · Kelas 12",   
      bab: [
        { 
          judul: "Sel Elektrolisis",        
          video: "bybESKhKnrQ", 
          teks: `<p>Sel elektrolisis adalah sistem dalam kimia yang menggunakan energi listrik untuk memicu reaksi kimia yang sebenarnya tidak berlangsung secara spontan. Dalam proses ini, arus listrik dialirkan melalui larutan atau lelehan elektrolit sehingga terjadi reaksi reduksi di katoda dan oksidasi di anoda. Materi ini juga membahas penerapan sel elektrolisis dalam kehidupan sehari-hari seperti penyepuhan logam, pemurnian logam, dan produksi zat kimia tertentu.</p>` }, 
        { 
          judul: "Rangkaian Arus Searah",        
          video: "KvpiLUz3iPc", 
          teks: `<p>Rangkaian arus searah adalah rangkaian listrik yang dialiri arus dengan arah tetap, biasanya berasal dari sumber seperti baterai. Materi ini membahas komponen rangkaian seperti resistor, sumber tegangan, serta cara menghitung kuat arus, tegangan, dan hambatan dalam rangkaian seri maupun paralel.</p>` },
        { 
          judul: "Energi dan Daya Listrik ",        
          video: "-1yeB1l2fOI", 
          teks: `<p>Energi listrik adalah energi yang dihasilkan oleh aliran listrik, sedangkan daya listrik adalah laju penggunaan energi tersebut. Materi ini membahas hubungan antara energi, daya, tegangan, arus, dan waktu, serta penerapannya dalam penggunaan alat-alat listrik sehari-hari.</p>` },
        { 
          judul: "Genetik",        
          video: "pRLzqHAWTcs", 
          teks: `<p>Genetik adalah cabang biologi yang mempelajari pewarisan sifat dari induk kepada keturunannya melalui gen. Materi ini mencakup struktur DNA, gen, kromosom, serta bagaimana informasi genetik diturunkan dan memengaruhi ciri-ciri makhluk hidup.</p>` },
        { 
          judul: "Pembelahan Sel",        
          video: "MAt-PF5-E74", 
          teks: `<p>Pembelahan sel adalah proses di mana satu sel membelah menjadi dua atau lebih sel baru. Materi ini membahas dua jenis pembelahan yaitu mitosis (untuk pertumbuhan dan perbaikan) dan meiosis (untuk pembentukan sel kelamin), serta tahap-tahapnya.</p>` },
        { 
          judul: "Pewarisan Sifat ",        
          video: "ouDcvX4fgHw", 
          teks: `<p>Materi ini membahas bagaimana sifat-sifat tertentu diturunkan dari orang tua kepada anak melalui gen, termasuk konsep dominan dan resesif serta hukum pewarisan Mendel yang menjelaskan pola-pola dasar genetika.</p>` },
        { 
          judul: "Hukum Coulomb dan Medan Listrik",        
          video: "lG6sY2ysUSE", 
          teks: `<p>Hukum Coulomb menjelaskan gaya tarik atau tolak antara dua muatan listrik, sedangkan medan listrik adalah daerah di sekitar muatan yang masih dipengaruhi oleh gaya listrik. Materi ini penting untuk memahami interaksi antar muatan dalam fisika.</p>` },
        { 
          judul: "Hukum Gauss dan Potensial Listrik",        
          video: "QLHuYh4sgbk", 
          teks: `<p>Hukum Gauss digunakan untuk menghitung medan listrik pada sistem tertentu dengan cara yang lebih sederhana, sedangkan potensial listrik adalah energi potensial per satuan muatan. Materi ini membantu memahami distribusi medan listrik dalam ruang.</p>` },
        { 
          judul: "Pola Pola Hereditas ",        
          video: "hZ9_PxbDScc", 
          teks: `<p>Materi ini membahas berbagai pola pewarisan sifat yang lebih kompleks seperti persilangan dihibrid, kodominansi, dan pewarisan sifat yang dipengaruhi oleh banyak gen (poligenik).</p>` },
        { 
          judul: "Medan Magnetik",        
          video: "xomTBsI_Q34", 
          teks: `<p>Medan magnetik adalah daerah di sekitar magnet atau arus listrik yang masih dipengaruhi gaya magnet. Materi ini membahas sifat-sifat medan magnet, arah garis gaya magnet, serta hubungan antara listrik dan magnet dalam kehidupan sehari-hari.</p>` }, 
        ] 
      },
    ips:     { 
      judul: "🌍 IPS", sub: "Ilmu Pengetahuan Sosial · Kelas 12",  
      bab: [
        { 
          judul: "Globalisasi", 
          video: "eUBRVWQIF2s", 
          teks: `<p>Globalisasi adalah proses mendunianya berbagai aspek kehidupan seperti ekonomi, budaya, teknologi, dan informasi sehingga batas antarnegara menjadi semakin kabur. Dalam materi ini dibahas bagaimana globalisasi terjadi melalui kemajuan transportasi dan komunikasi, serta dampaknya terhadap kehidupan masyarakat, baik positif seperti kemudahan akses informasi maupun negatif seperti hilangnya budaya lokal.</p>` },
        { 
          judul: "Definisi dan Teori Perubahan Sosial ",        
          video: "O5sawcUXY1M", 
          teks: `<p>Perubahan sosial adalah perubahan yang terjadi dalam struktur dan pola kehidupan masyarakat dari waktu ke waktu. Materi ini membahas berbagai teori perubahan sosial seperti evolusi, konflik, dan fungsionalis, yang menjelaskan bagaimana dan mengapa masyarakat mengalami perubahan.</p>` },
        { 
          judul: "Jenis Perubahan Sosial dan Dampaknya ",        
          video: "atAGx7FUcoA", 
          teks: `<p>Materi ini mengelompokkan perubahan sosial berdasarkan sifatnya, seperti perubahan lambat (evolusi) dan cepat (revolusi), serta berdasarkan pengaruhnya seperti perubahan kecil dan besar. Selain itu, dibahas juga dampak perubahan sosial terhadap kehidupan masyarakat, baik yang menguntungkan maupun merugikan.</p>` },
        { 
          judul: "Ketimpangan Sosial, Penyebab, dan Jenisnya",        
          video: "2eT_1RHG4Ww", 
          teks: `<p>Ketimpangan sosial adalah kondisi di mana terdapat perbedaan yang tidak merata dalam masyarakat, seperti perbedaan ekonomi, pendidikan, dan kesempatan. Materi ini menjelaskan penyebab ketimpangan seperti faktor ekonomi dan kebijakan, serta jenis-jenis ketimpangan yang terjadi di masyarakat.</p>` },
        { 
          judul: "Upaya Mengatasi Ketimpangan Sosial Dalam Masyarakat",        
          video: "LM3PqiIxhxs", 
          teks: `<p>Materi ini membahas berbagai solusi untuk mengurangi ketimpangan sosial, seperti pemerataan pembangunan, peningkatan akses pendidikan, dan kebijakan pemerintah yang mendukung kesejahteraan masyarakat secara adil.</p>` },
        { 
          judul: "Konsep Wilayah dan Tata Ruang ",        
          video: "KR_qmLQfPr0", 
          teks: `<p>Konsep wilayah adalah pembagian ruang berdasarkan karakteristik tertentu seperti geografis, ekonomi, atau sosial. Tata ruang adalah perencanaan penggunaan lahan agar sesuai dengan fungsi dan kebutuhan masyarakat. Materi ini penting untuk memahami pengelolaan ruang yang efektif.</p>` },
        { 
          judul: "Pola Keruangan Desa dan Ciri Cirinya ",        
          video: "YCUhdRzBsM8", 
          teks: `<p>Materi ini membahas bagaimana pola permukiman di desa terbentuk, seperti pola memanjang, menyebar, atau mengelompok, serta ciri-ciri desa seperti hubungan sosial yang erat dan kegiatan ekonomi yang dominan di sektor agraris.</p>` },
        { 
          judul: "Faktor dan Dampak Interaksi Desa-Kota ",        
          video: "_vQLREGsRDo", 
          teks: `<p>Interaksi desa dan kota terjadi karena adanya hubungan timbal balik seperti perpindahan penduduk, distribusi barang, dan pertukaran informasi. Materi ini membahas faktor penyebab interaksi serta dampaknya seperti urbanisasi dan perubahan sosial.</p>` },
        { 
          judul: "Pola Keruangan Kota dan Ciri Cirinya ",        
          video: "x9JhlUfHDuE", 
          teks: `<p>Materi ini menjelaskan pola tata ruang kota seperti model konsentris, sektoral, dan inti berganda, serta ciri-ciri kota seperti kepadatan penduduk tinggi, aktivitas ekonomi beragam, dan kehidupan yang lebih modern.</p>` },
       ] 
      },
    mtk:     { 
      judul: "📐 Matematika", sub: "Matematika · Kelas 12",
      bab: [
        { 
          judul: "Aturan Penjumlahan dan Aturan Perkalian ",          
          video: "P6kH3U2fsOQ", 
          teks: `<p>Materi ini membahas dua prinsip dasar dalam menghitung banyaknya kemungkinan suatu kejadian. Aturan penjumlahan digunakan ketika memilih salah satu dari beberapa kejadian yang tidak bisa terjadi bersamaan, sedangkan aturan perkalian digunakan ketika beberapa kejadian dilakukan secara berurutan. Konsep ini penting dalam peluang dan kombinatorika karena membantu menentukan jumlah cara secara sistematis.</p>` },
        { 
          judul: "Aturan Pengisian Tempat (Filling Slots)",        
          video: "7LQxxuIQLlo", 
          teks: `<p>Materi ini menjelaskan cara menghitung banyaknya susunan dengan mengisi tempat-tempat yang tersedia satu per satu. Setiap tempat memiliki pilihan tertentu, dan jumlah keseluruhan diperoleh dari hasil perkalian semua kemungkinan pada setiap posisi. Konsep ini sering digunakan dalam soal penyusunan angka, huruf, atau objek.</p>` },
        { 
          judul: "Permutasi dan Kombinasi",        
          video: "706fNr8BKDc", 
          teks: `<p>Permutasi adalah cara menyusun objek dengan memperhatikan urutan, sedangkan kombinasi adalah cara memilih objek tanpa memperhatikan urutan. Materi ini menjelaskan perbedaan keduanya serta penerapannya dalam berbagai soal seperti penyusunan tim atau pengaturan tempat duduk.</p>` },
        { 
          judul: "Permutasi Unsur yang Sama dan Permutasi Siklis",        
          video: "A-IR8nmjwKg", 
          teks: `<p>Materi ini membahas permutasi dalam kondisi khusus, yaitu ketika ada unsur yang sama sehingga tidak semua susunan dianggap berbeda, serta permutasi siklis yang digunakan dalam susunan melingkar seperti duduk di meja bundar. Aturan perhitungannya berbeda dari permutasi biasa.</p>` },
        { 
          judul: "Konsep Dasar dan Persamaan Lingkaran ",        
          video: "A1EVg6s0NDg", 
          teks: `<p>Materi ini membahas lingkaran sebagai himpunan titik-titik yang memiliki jarak sama terhadap suatu titik pusat. Dipelajari juga bagaimana menentukan persamaan lingkaran berdasarkan pusat dan jari-jari serta memahami bentuk grafiknya dalam koordinat.</p>` },
        { 
          judul: "Kedudukan Titik Terhadap Lingkaran ",        
          video: "UkcVkfMUU6w", 
          teks: `<p>Materi ini menjelaskan bagaimana menentukan posisi suatu titik apakah berada di dalam, di luar, atau tepat pada lingkaran. Penentuannya dilakukan dengan membandingkan jarak titik ke pusat lingkaran dengan panjang jari-jari.</p>` },
        { 
          judul: "Kedudukan Garis Terhadap Lingkaran ",        
          video: "rZKv9W_7EQo", 
          teks: `<p>Materi ini membahas hubungan antara garis dan lingkaran, yaitu apakah garis memotong lingkaran, menyinggung, atau tidak berpotongan sama sekali. Hal ini ditentukan berdasarkan jarak garis ke pusat lingkaran.</p>` },
        { 
          judul: "Kedudukan Dua Buah Lingkaran ",        
          video: "XsjcCGW8J9U", 
          teks: `<p>Materi ini menjelaskan berbagai kemungkinan posisi dua lingkaran, seperti saling berpotongan, bersinggungan, terpisah, atau satu berada di dalam yang lain. Penentuannya berdasarkan jarak antara pusat kedua lingkaran dan panjang jari-jarinya.</p>` },
        { 
          judul: "Persamaan Garis Singgung Melalui Titik di Lingkaran ",        
          video: "Y_mciDUQ-EY", 
          teks: `<p>Materi ini membahas cara menentukan persamaan garis yang menyinggung lingkaran pada suatu titik tertentu. Garis singgung memiliki sifat khusus yaitu tegak lurus terhadap jari-jari yang melalui titik singgung tersebut.</p>` },
        { 
          judul: "Persamaan Garis Singgung Lingkaran Jika Diketahui Gradiennya ",        
          video: "nCUht9D5MKg", 
          teks: `<p>Materi ini menjelaskan cara menentukan persamaan garis singgung lingkaran jika kemiringan garis sudah diketahui. Dengan informasi gradien, kita dapat mencari garis yang hanya menyentuh lingkaran di satu titik.</p>` }, 
       ] 
     },
    indo:    { 
      judul: "📝 Bahasa Indonesia", sub: "Bahasa Indonesia · Kelas 12",        
      bab: [
        { 
          judul: "Teks Artikel ",         
          video: "S6o0jkFYBI0", 
          teks: `<p>Teks artikel adalah tulisan yang berisi gagasan, opini, atau informasi tentang suatu topik tertentu yang disampaikan secara sistematis dan logis. Artikel biasanya ditulis untuk media massa seperti koran atau majalah dengan tujuan memberikan informasi, meyakinkan, atau menghibur pembaca, serta menggunakan bahasa yang komunikatif dan mudah dipahami.</p>` },
        { 
          judul: "Kaidah Kebahasaan Novel ",        
          video: "IysKyhwAVdY", 
          teks: `<p>Materi ini membahas penggunaan bahasa dalam novel, seperti penggunaan majas (gaya bahasa), kalimat langsung dan tidak langsung, serta pilihan kata yang mampu menggambarkan suasana dan karakter tokoh. Kaidah kebahasaan ini penting untuk membangun cerita yang menarik dan hidup.</p>` },
        { 
          judul: "Unsur Intrinsik dan Ekstrinsik Novel ",        
          video: "LlSJoElD3ao", 
          teks: `<p>Unsur intrinsik adalah unsur yang membangun cerita dari dalam, seperti tokoh, alur, latar, tema, dan amanat, sedangkan unsur ekstrinsik adalah faktor dari luar cerita seperti latar belakang penulis, kondisi sosial, budaya, dan sejarah. Materi ini membantu memahami isi dan makna sebuah novel secara menyeluruh.</p>` },
        { 
          judul: "Definisi dan Struktur Teks Editorial ",        
          video: "-iQ4NX5UAtM", 
          teks: `<p>Teks editorial adalah teks yang berisi pendapat penulis atau redaksi terhadap suatu isu aktual. Struktur teks ini terdiri dari pernyataan pendapat (tesis), argumentasi yang mendukung, dan penegasan ulang. Tujuannya adalah memengaruhi pembaca agar setuju dengan pandangan yang disampaikan.</p>` },
        { 
          judul: "Kaidah Kebahasaan Teks Editorial ",        
          video: "TzP-PYEJnEc", 
          teks: `<p>Materi ini membahas ciri kebahasaan dalam teks editorial seperti penggunaan kalimat argumentatif, kata-kata persuasif, serta fakta dan opini yang disusun secara logis. Bahasa yang digunakan harus jelas, tegas, dan meyakinkan.</p>` },
        { 
          judul: "Teks Eksposisi",        
          video: "k9g_A-IZc10", 
          teks: `<p>Teks eksposisi adalah teks yang bertujuan menjelaskan suatu informasi atau pengetahuan secara objektif dan logis. Teks ini disusun dengan struktur tesis, argumentasi, dan penegasan ulang, serta bertujuan memberikan pemahaman kepada pembaca tanpa memaksakan pendapat.</p>` },
        { 
          judul: "Surat Lamaran Pekerjaan ",        
          video: "_Tddxr2Z6fc", 
          teks: `<p>Surat lamaran pekerjaan adalah surat resmi yang dibuat oleh seseorang untuk melamar pekerjaan pada suatu instansi atau perusahaan. Surat ini berisi identitas diri, tujuan melamar, serta kemampuan atau pengalaman yang dimiliki, dan ditulis dengan bahasa formal serta sopan.</p>` },
        { 
          judul: "Penulisan Surat Lamaran Pekerjaan ",        
          video: "Uhc1EbynAhA", 
          teks: `<p>Materi ini membahas cara menyusun surat lamaran pekerjaan dengan benar, mulai dari format penulisan, penggunaan bahasa yang tepat, hingga kelengkapan isi seperti lampiran dokumen pendukung. Tujuannya agar surat lamaran terlihat profesional dan menarik perhatian pihak perusahaan.</p>` },
        { 
          judul: "Esai dan Kritik Sastra",        
          video: "ArsWNQecFAE", 
          teks: `<p>Esai adalah tulisan yang berisi pendapat penulis tentang suatu topik secara subjektif namun tetap logis, sedangkan kritik sastra adalah penilaian terhadap karya sastra berdasarkan analisis tertentu. Materi ini melatih kemampuan berpikir kritis dan menyampaikan pendapat secara terstruktur.</p>` },
        { 
          judul: "Novel Cerita Sejarah",        
          video: "UjeWCF8j2QY", 
          teks: `<p>Novel cerita sejarah adalah karya sastra yang mengangkat peristiwa sejarah sebagai latar cerita. Meskipun berdasarkan fakta, cerita ini sering dikembangkan dengan unsur imajinasi sehingga tetap menarik, sekaligus memberikan pemahaman tentang peristiwa sejarah kepada pembaca.</p>` },
      ] 
    },
    inggris: { 
      judul: "💬 Bahasa Inggris",  sub: "Bahasa Inggris · Kelas 12",           
      bab: [
        { 
          judul: "Caption Text",         
          video: "1AfGsxUc-DQ", 
          teks: `<p>A caption text is a short piece of writing that accompanies an image, photo, or illustration to explain or describe it. Its purpose is to give context so the reader can better understand the visual content. Captions are usually concise, clear, and engaging, and they may provide factual information, highlight important details, or even add a persuasive or emotional touch depending on the purpose.</p>` },
        { 
          judul: "If Clause and If Conditional ",        
          video: "DS7fZ5c6JTM", 
          teks: `<p>If clauses, also known as conditional sentences, are used to express possible, imaginary, or hypothetical situations and their results. There are several types, including Type 1 (real and possible situations in the future), Type 2 (unreal or unlikely situations in the present), and Type 3 (imaginary situations in the past, often expressing regret). Each type follows a specific grammatical structure and helps convey different levels of possibility.</p>` },
        { 
          judul: "Application Letter",        
          video: "bkIumnXFQNI", 
          teks: `<p>An application letter is a formal letter written to apply for a job or position in a company or organization. It includes personal information, qualifications, skills, and reasons for applying. The language used must be formal, polite, and persuasive to convince the employer that the applicant is suitable for the position.</p>` },
        { 
          judul: "Discussion Text",        
          video: "ak4iRMHvIG4", 
          teks: `<p>A discussion text is a type of writing that presents different viewpoints about an issue, usually showing both advantages and disadvantages or pros and cons. Its purpose is to give a balanced perspective before reaching a conclusion. The structure generally includes an introduction of the issue, arguments for, arguments against, and a conclusion or recommendation.</p>` },
        { 
          judul: "Offering Help and Service ",        
          video: "teQcgCmpDyY", 
          teks: `<p>This material focuses on expressions used to offer help or services to others in English. Common expressions include “Can I help you?”, “Would you like some help?”, or “May I assist you?”. It also covers how to respond appropriately, whether accepting or declining the offer politely.</p>` },
        { 
          judul: "News Item Text",        
          video: "og-batHyRVk", 
          teks: `<p>A news item text is a text that reports current events or important happenings to the public. Its purpose is to inform readers about newsworthy events. The structure usually consists of the main event, background details, and sources or statements from witnesses or experts. The language is typically formal, factual, and objective.</p>` },
        { 
          judul: "Procedure Text",        
          video: "07tW8JcEg9w", 
          teks: `<p>A procedure text explains how to do something through a series of steps. It is designed to guide the reader in completing a task correctly. The structure includes the goal, materials or ingredients, and step-by-step instructions. It commonly uses imperative sentences and sequencing words.</p>` },
        { 
          judul: "Past Perfect Tense ",        
          video: "si7Di6CeWlw", 
          teks: `<p>The past perfect tense is used to describe an action that was completed before another action took place in the past. It helps show the order of past events clearly and is often used in storytelling or explaining sequences.</p>` },
        { 
          judul: "Simple Future Tense ",        
          video: "u3-O25lfaXE", 
          teks: `<p>The simple future tense is used to express actions that will happen in the future. It is commonly formed using “will” or “going to” and is used for predictions, plans, promises, or spontaneous decisions.</p>` },
        { 
          judul: "Present Perfect Tense",        
          video: "lohZr9A5SaQ", 
          teks: `<p>The present perfect tense is used to describe actions that happened at an unspecified time in the past but are still relevant to the present. It is often used for experiences, changes, or actions that have just been completed, and it connects past events with the present situation.</p>` }, 
      ] 
    },
  },
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