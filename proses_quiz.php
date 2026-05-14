<?php
session_start();
include 'koneksi.php';

$username = $_SESSION['user'];

$score_tambah = 0;

// cek jawaban
if ($_POST['q1'] == 'B') $score_tambah += 10;
if ($_POST['q2'] == 'C') $score_tambah += 10;
if ($_POST['q3'] == 'A') $score_tambah += 10;

// update score
mysqli_query($conn, "UPDATE users SET score = score + $score_tambah WHERE username='$username'");

header("Location: dashboard.php");
exit();
?>