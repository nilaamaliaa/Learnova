<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Learnnova</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
  <style>
    * { font-family: 'Poppins', sans-serif; }

    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #3b1a6e 0%, #6b2fa0 35%, #a0348a 65%, #c0446a 100%);
      color: #fff;
    }

    /* NAVBAR */
    .navbar {
      background: rgba(0,0,0,0.15);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .navbar-brand {
      font-weight: 800;
      font-style: italic;
      font-size: 1.4rem;
      letter-spacing: 1px;
      color: #fff !important;
    }
    .nav-link {
      color: rgba(255,255,255,0.85) !important;
      font-weight: 500;
      transition: color 0.2s;
    }
    .nav-link:hover { color: #fff !important; }
    .btn-logout {
      background: #e8365d;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      padding: 6px 20px;
      transition: background 0.2s;
    }
    .btn-logout:hover { background: #c82845; color: #fff; }

    /* HERO */
    .hero-section { padding: 3rem 0 2rem; text-align: center; }
    .hero-section h1 { font-size: 2.2rem; font-weight: 700; }
    .hero-section p { color: rgba(255,255,255,0.75); font-size: 1rem; }

    /* STAT CARDS */
    .stat-card {
      background: rgba(255,255,255,0.12);
      border: 1px solid rgba(255,255,255,0.18);
      border-radius: 18px;
      padding: 1.5rem;
      backdrop-filter: blur(8px);
      transition: transform 0.2s, background 0.2s;
    }
    .stat-card:hover {
      transform: translateY(-4px);
      background: rgba(255,255,255,0.18);
    }
    .stat-icon {
      width: 60px; height: 60px;
      background: rgba(255,255,255,0.18);
      border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.7rem;
      flex-shrink: 0;
    }
    .stat-label { font-size: 0.85rem; color: rgba(255,255,255,0.7); margin-bottom: 2px; }
    .stat-value { font-size: 1.9rem; font-weight: 700; line-height: 1.1; }
    .stat-sub { font-size: 0.78rem; color: rgba(255,255,255,0.6); margin-top: 4px; }

    /* TASKS SECTION */
    .tasks-card {
      background: rgba(255,255,255,0.1);
      border: 1px solid rgba(255,255,255,0.15);
      border-radius: 18px;
      backdrop-filter: blur(8px);
    }
    .tasks-card .card-header {
      background: transparent;
      border-bottom: 1px solid rgba(255,255,255,0.12);
      padding: 1.2rem 1.5rem;
      font-weight: 700;
      font-size: 1.1rem;
      color: #fff;
    }
    .task-item {
      display: flex; align-items: center;
      padding: 1rem 1.5rem;
      border-bottom: 1px solid rgba(255,255,255,0.08);
      transition: background 0.15s;
    }
    .task-item:last-child { border-bottom: none; }
    .task-item:hover { background: rgba(255,255,255,0.07); }
    .task-check {
      width: 22px; height: 22px;
      border: 2px solid rgba(255,255,255,0.4);
      border-radius: 5px;
      cursor: pointer;
      flex-shrink: 0;
      display: flex; align-items: center; justify-content: center;
      transition: all 0.2s;
    }
    .task-check.checked {
      background: #e8365d;
      border-color: #e8365d;
    }
    .task-check.checked::after {
      content: '';
      width: 10px; height: 6px;
      border-left: 2px solid #fff;
      border-bottom: 2px solid #fff;
      transform: rotate(-45deg) translate(1px, -1px);
      display: block;
    }
    .task-name { font-size: 0.95rem; font-weight: 500; }
    .task-name.done { text-decoration: line-through; color: rgba(255,255,255,0.45); }
    .badge-subject {
      font-size: 0.7rem; font-weight: 600;
      border-radius: 6px;
      padding: 3px 8px;
    }
    .badge-mat { background: rgba(168,85,247,0.35); color: #d8b4fe; }
    .badge-ipa { background: rgba(59,130,246,0.3); color: #93c5fd; }
    .btn-done {
      background: rgba(255,255,255,0.12);
      border: 1px solid rgba(255,255,255,0.2);
      color: rgba(255,255,255,0.8);
      border-radius: 8px;
      font-size: 0.78rem;
      padding: 5px 12px;
      white-space: nowrap;
      transition: background 0.2s;
    }
    .btn-done:hover { background: rgba(255,255,255,0.22); color: #fff; }

    /* LIHAT SEMUA */
    .lihat-card {
      background: linear-gradient(90deg, rgba(232,54,93,0.35), rgba(168,85,247,0.25));
      border: 1px solid rgba(232,54,93,0.3);
      border-radius: 16px;
      padding: 1.2rem 1.5rem;
      display: flex; align-items: center; gap: 1rem;
      cursor: pointer;
      transition: background 0.2s;
      text-decoration: none;
      color: #fff;
    }
    .lihat-card:hover {
      background: linear-gradient(90deg, rgba(232,54,93,0.5), rgba(168,85,247,0.4));
      color: #fff;
    }
    .lihat-icon {
      width: 50px; height: 50px;
      background: #e8365d;
      border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.4rem;
      flex-shrink: 0;
    }
    .lihat-title { font-weight: 700; font-size: 1rem; }
    .lihat-sub { font-size: 0.78rem; color: rgba(255,255,255,0.7); }

    /* FOOTER */
    footer { color: rgba(255,255,255,0.45); font-size: 0.8rem; padding: 2rem 0; text-align: center; }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">LEARNNOVA</a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <i class="bi bi-list text-white fs-4"></i>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navMenu">
      <ul class="navbar-nav align-items-center gap-3 me-3">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Materi</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Quiz</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Leaderboard</a></li>
      </ul>
      <button class="btn-logout">Logout</button>
    </div>
  </div>
</nav>

<!-- HERO -->
<section class="hero-section">
  <div class="container">
    <h1>Selamat datang, Nabila! 👋</h1>
    <p>Tetap semangat dan terus tingkatkan belajarmu!</p>
  </div>
</section>

<!-- STAT CARDS -->
<section class="container mb-4">
  <div class="row g-3">
    <!-- Streak -->
    <div class="col-12 col-md-4">
      <div class="stat-card d-flex align-items-center gap-3">
        <div class="stat-icon">
          <i class="bi bi-calendar3 text-white"></i>
        </div>
        <div>
          <div class="stat-label">Streak</div>
          <div class="stat-value">1 hari</div>
          <div class="stat-sub">Login berturut-turut</div>
        </div>
      </div>
    </div>
    <!-- Score -->
    <div class="col-12 col-md-4">
      <div class="stat-card d-flex align-items-center gap-3">
        <div class="stat-icon">
          <i class="bi bi-star-fill" style="color:#facc15;"></i>
        </div>
        <div>
          <div class="stat-label">Score</div>
          <div class="stat-value">110</div>
          <div class="stat-sub">Kumpulkan poin sebanyak-banyaknya!</div>
        </div>
      </div>
    </div>
    <!-- Aktivitas -->
    <div class="col-12 col-md-4">
      <div class="stat-card d-flex align-items-center gap-3">
        <div class="stat-icon">
          <i class="bi bi-clipboard2-check text-white"></i>
        </div>
        <div>
          <div class="stat-label">Aktivitas</div>
          <div class="stat-value">3 tugas</div>
          <div class="stat-sub">Tugas hari ini</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TUGAS HARI INI -->
<section class="container mb-4">
  <div class="tasks-card">
    <div class="card-header d-flex align-items-center gap-2">
      <i class="bi bi-list-check"></i> Tugas Hari Ini
    </div>
    <div id="task-list">
      <!-- Task 1 -->
      <div class="task-item" onclick="toggleTask(this)">
        <div class="task-check me-3"></div>
        <span class="task-name me-2">Kerjakan quiz Matematika</span>
        <span class="badge-subject badge-mat me-auto">Matematika</span>
        <button class="btn-done ms-3" onclick="event.stopPropagation()">
          <i class="bi bi-check-circle me-1"></i>Selesai! +5 poin
        </button>
      </div>
      <!-- Task 2 -->
      <div class="task-item" onclick="toggleTask(this)">
        <div class="task-check me-3"></div>
        <span class="task-name me-2">Baca materi Gerak Lurus</span>
        <span class="badge-subject badge-ipa me-auto">IPA</span>
        <button class="btn-done ms-3" onclick="event.stopPropagation()">
          <i class="bi bi-check-circle me-1"></i>Selesai! +5 poin
        </button>
      </div>
      <!-- Task 3 -->
      <div class="task-item" onclick="toggleTask(this)">
        <div class="task-check me-3"></div>
        <span class="task-name me-2">Tonton video tentang Tata Surya</span>
        <span class="badge-subject badge-ipa me-auto">IPA</span>
        <button class="btn-done ms-3" onclick="event.stopPropagation()">
          <i class="bi bi-check-circle me-1"></i>Selesai! +5 poin
        </button>
      </div>
    </div>
  </div>
</section>

<!-- LIHAT SEMUA TUGAS -->
<section class="container mb-5">
  <a href="#" class="lihat-card">
    <div class="lihat-icon">
      <i class="bi bi-clipboard2-list"></i>
    </div>
    <div class="flex-grow-1">
      <div class="lihat-title">Lihat Semua Tugas</div>
      <div class="lihat-sub">Klik untuk melihat semua tugas yang telah dan belum kamu selesaikan.</div>
    </div>
    <i class="bi bi-chevron-right fs-5 opacity-75"></i>
  </a>
</section>

<!-- FOOTER -->
<footer>© 2025 Learnnova. All rights reserved.</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function toggleTask(item) {
    const check = item.querySelector('.task-check');
    const name = item.querySelector('.task-name');
    check.classList.toggle('checked');
    name.classList.toggle('done');
  }
</script>
</body>
</html>