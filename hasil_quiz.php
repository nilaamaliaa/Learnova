<?php
session_start();
include "config.php";

// cek login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// ambil data user
$user = $_SESSION['user'];

$user_id = $user['id'];
$nama    = $user['nama'];

// ambil data quiz
$kelas = $_POST['kelas'];
$mapel = $_POST['mapel'];
$bab_id = $_POST['bab_id'];

$jawaban_user = $_POST['jawaban'];

$benar = 0;
$total = 0;

// ambil semua soal sesuai bab
$query = mysqli_query($conn,
"SELECT * FROM quiz 
WHERE kelas='$kelas'
AND mapel='$mapel'
AND bab_id='$bab_id'");

while ($soal = mysqli_fetch_assoc($query)) {

    $total++;

    $id_soal = $soal['id'];

    if (isset($jawaban_user[$id_soal])) {

        if ($jawaban_user[$id_soal] == $soal['jawaban']) {
            $benar++;
        }
    }
}

// hitung skor
$skor = 0;

if ($total > 0) {
    $skor = ($benar / $total) * 100;
}

// simpan hasil quiz
mysqli_query($conn,
"INSERT INTO hasil_quiz
(user_id, nama, kelas, mapel, bab_id, skor)
VALUES
('$user_id', '$nama', '$kelas', '$mapel', '$bab_id', '$skor')
");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Quiz</title>
</head>
<body>

<h2>Hasil Quiz</h2>

<p>Nama: <?= $nama ?></p>

<p>Jawaban Benar: <?= $benar ?> dari <?= $total ?></p>

<h3>Skor Anda: <?= $skor ?></h3>

<a href="leaderboard.php">
    <button>Lihat Leaderboard</button>
</a>

</body>
</html>