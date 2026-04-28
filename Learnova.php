<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learnova</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: Arial, sans-serif;
      color: white;
      
      /* PINDAHKAN KODE BACKGROUND KE SINI */
      background-color: #44113E; 
      background-image: 
        radial-gradient(at 10% 10%, #FFF7AD 0%, transparent 50%),   
        radial-gradient(at 90% 15%, #FFB3AE 0%, transparent 50%),   
        radial-gradient(at 50% 50%, #FF49C1 0%, transparent 60%),   
        radial-gradient(at 20% 80%, #6A1452 0%, transparent 60%),   
        radial-gradient(at 80% 90%, #44113E 0%, transparent 50%);
      background-attachment: fixed; /* Agar background tidak ikut scroll */
    }

    .container-main {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    img {
      width: 1100px; /* Agar responsif */
      height: auto;
      margin-bottom: 20px;
    }

    .btn-group-custom {
      display: flex;
      gap: 15px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .btn-custom {
      padding: 10px 90px;
      border-radius: 50px; /* Lebih retro/rounded */
      font-weight: bold;
      border: none;
      color: #6A1452; /* Pakai salah satu warna palet biar nyambung */
      background: white;
      text-decoration: none;
      transition: 0.3s;
    }

    .btn-custom:hover {
      opacity: 0.9;
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      color: #FF49C1;
    }
  </style>
</head>
<body>

<div class="container-main">
  <img src="logoLearnovaa.png" alt="Learnova Logo">

  <div class="btn-group-custom">
    <a href="loginLearnova.php" class="btn-custom">Login</a>
    <a href="daftar.php" class="btn-custom">Daftar</a>
    <a href="materi.html" class="btn-custom">Pembelajaran</a>
    <a href="jadwal.html" class="btn-custom">Jadwal</a>
  </div>
</div>

</body>
</html>