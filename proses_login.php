<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Ambil data user
$data = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($data);

// Cek password
if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user['username'];
    header("Location: dashboard.php");
} else {
    echo "<script>alert('Username atau password salah!'); window.location='login.php';</script>";
}
date_default_timezone_set('Asia/Jakarta');

$today = date("Y-m-d");

// ambil data lama
$last_login = $user['last_login'];
$streak = $user['streak'];

if ($last_login == $today) {
    // login di hari yang sama → streak tetap
} else {
    if ($last_login == date("Y-m-d", strtotime("-1 day"))) {
        // login berurutan → tambah streak
        $streak++;
    } else {
        // putus → reset ke 1
        $streak = 1;
    }

    // update database
    mysqli_query($conn, "UPDATE users SET streak='$streak', last_login='$today' WHERE username='$username'");
}
?>