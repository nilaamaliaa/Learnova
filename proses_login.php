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
?>