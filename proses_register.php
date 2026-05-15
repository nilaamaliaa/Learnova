<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Cek username sudah ada belum
$cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Username sudah dipakai!'); window.location='register.php';</script>";
    exit();
}

mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
header("Location: login.php");
?>