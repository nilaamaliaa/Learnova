<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Leaderboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
  .podium{
    display:flex;
    justify-content:center;
    align-items:flex-end;
    gap:20px;
    margin-bottom:50px;
    }
  .rank{
        width:120px;
        text-align:center;
        border-radius:10px 10px 0 0;
        color:white;
        padding-top:10px;
    }
  .rank1{
        height:220px;
        background:#2b59c3;
    }
  .rank2{
        height:170px;
        background:#5b8def;
    }
  .rank3{
        height:140px;
        background:#89aef5;
    }
.custom-table {
    width: 100%;
}

.custom-table th {
    background-color: #b78edb;
    color: white;
    padding: 10px;
}

.custom-table td {
    background-color: #ddbbff;
    color: white;
    padding: 10px;
}

.custom-table tr:nth-child(even) td {
    background-color: #e9d3ff;
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
    <h3 class="text-center mb-5">Leaderboard</h3>

    <?php
    $data = mysqli_query($conn, "SELECT username, score FROM users ORDER BY score DESC");

    $leaderboard = [];
    while($row = mysqli_fetch_assoc($data)){
        $leaderboard[] = $row;
    }
    ?>

    <div class="podium">

        <?php if(isset($leaderboard[1])) { ?>
        <div class="rank rank2">
            <h4>2</h4>
            <p><?= $leaderboard[1]['username']; ?></p>
            <span><?= $leaderboard[1]['score']; ?></span>
        </div>
        <?php } ?>

        <?php if(isset($leaderboard[0])) { ?>
        <div class="rank rank1">
            <h3>1</h3>
            <p><?= $leaderboard[0]['username']; ?></p>
            <span><?= $leaderboard[0]['score']; ?></span>
        </div>
        <?php } ?>

        <?php if(isset($leaderboard[2])) { ?>
        <div class="rank rank3">
            <h4>3</h4>
            <p><?= $leaderboard[2]['username']; ?></p>
            <span><?= $leaderboard[2]['score']; ?></span>
        </div>
        <?php } ?>

    </div>

    <table class="custom-table mt-5">
    <thead>
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Score</th>
            <th>Rank</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $dataTable = mysqli_query($conn, "SELECT username, score FROM users ORDER BY score DESC");

        while($row = mysqli_fetch_assoc($dataTable)){
        ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['score'] ?></td>
            <td><?= $no ?></td>
        </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table> <br>
<a href="dashboard.php" class="btn btn-warning">⬅ Kembali</a>
</div>
</body>
</html>