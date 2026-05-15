<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body{
            min-height: 100vh;
            margin: 0;
            padding-top: 80px;
            background-color: #44113E;
            background-image:
            radial-gradient(at 10% 10%, #FFF7AD 0%, transparent 50%),
            radial-gradient(at 90% 15%, #FFB3AE 0%, transparent 50%),
            radial-gradient(at 50% 50%, #FF49C1 0%, transparent 60%),
            radial-gradient(at 20% 80%, #6A1452 0%, transparent 60%),
            radial-gradient(at 80% 90%, #44113E 0%, transparent 50%);
            background-attachment: fixed;
            color: white;
            font-family: Arial, sans-serif;
        }

        .navbar{
            background: rgba(0,0,0,0.25);
            backdrop-filter: blur(10px);
        }

        .navbar-brand{
            font-weight: bold;
            font-size: 24px;
        }

        .nav-link{
            color: white !important;
            margin-left: 10px;
        }

        .nav-link:hover{
            color: #ffd6f6 !important;
        }

        .logout-btn{
            background: #dc3545;
            padding: 8px 15px;
            border-radius: 8px;
        }

        .title{
            text-align: center;
            margin-bottom: 50px;
            font-weight: bold;
        }

        .podium{
            display: flex;
            justify-content: center;
            align-items: flex-end;
            gap: 20px;
            margin-bottom: 50px;
            flex-wrap: wrap;
        }

        .rank{
            width: 140px;
            text-align: center;
            border-radius: 15px 15px 0 0;
            padding: 15px 10px;
            color: white;
        }

        .rank i{
            font-size: 35px;
        }

        .rank p{
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .rank span{
            font-size: 18px;
        }

        .rank1{
            height: 230px;
            background: #FFB3AE;
        }

        .rank2{
            height: 180px;
            background: #ffc27d;
        }

        .rank3{
            height: 150px;
            background: #9ae68e;
        }

        .table-box{
            background: rgba(255,255,255,0.12);
            padding: 20px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
        }

        .custom-table{
            width: 100%;
            overflow: hidden;
            border-radius: 10px;
        }

        .custom-table th{
            background: #b78edb;
            color: white;
            padding: 12px;
            text-align: center;
        }

        .custom-table td{
            background: rgba(255,255,255,0.15);
            padding: 12px;
            text-align: center;
            color: white;
        }

        .custom-table tr:nth-child(even) td{
            background: rgba(255,255,255,0.08);
        }

        .back-btn{
            background: #ffd166;
            color: black;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: bold;
        }

        .back-btn:hover{
            background: #ffb703;
            color: black;
        }

        @media(max-width:768px){

            .podium{
                gap: 10px;
            }

            .rank{
                width: 110px;
            }

            .rank1{
                height: 190px;
            }

            .rank2{
                height: 160px;
            }

            .rank3{
                height: 130px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">

        <a class="navbar-brand" href="dashboard.php">
            Learnnova
        </a>

        <div class="d-flex align-items-center">
            <a class="nav-link" href="dashboard.php">Home</a>
            <a class="nav-link" href="materiLn.php">Materi</a>
            <a class="nav-link" href="quiz.php">Quiz</a>
            <a class="nav-link active" href="leaderboard.php">Leaderboard</a>
            <a class="nav-link logout-btn" href="logout.php">Logout</a>
        </div>

    </div>
</nav>

<div class="container">

    <h2 class="title">
        <i class="bi bi-trophy-fill"></i> Leaderboard
    </h2>

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
            <i class="bi bi-award-fill"></i>
            <p><?= $leaderboard[1]['username']; ?></p>
            <span><?= $leaderboard[1]['score']; ?></span>
        </div>
        <?php } ?>

        <?php if(isset($leaderboard[0])) { ?>
        <div class="rank rank1">
            <i class="bi bi-trophy-fill"></i>
            <p><?= $leaderboard[0]['username']; ?></p>
            <span><?= $leaderboard[0]['score']; ?></span>
        </div>
        <?php } ?>

        <?php if(isset($leaderboard[2])) { ?>
        <div class="rank rank3">
            <i class="bi bi-star-fill"></i>
            <p><?= $leaderboard[2]['username']; ?></p>
            <span><?= $leaderboard[2]['score']; ?></span>
        </div>
        <?php } ?>

    </div>

    <div class="table-box">

        <table class="custom-table">

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

        </table>

    </div>

    <div class="text-center mt-4 mb-5">
        <a href="dashboard.php" class="back-btn">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

</div>

<!-- COPYRIGHT -->
<div class="text-center mt-4">
  <small> © 2026 Learnnova Academy</small>
</div>

</body>
</html>