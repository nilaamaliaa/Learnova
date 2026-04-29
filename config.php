<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "learnova";

$conn = new mysqli($host, $user, $pass);

// cek koneksi server
if ($conn->connect_error) {
  die("Koneksi ke MySQL gagal: " . $conn->connect_error);
}

// cek database ada atau tidak
if (!$conn->select_db($db)) {
  die("Database '$db' belum ada. Buka phpMyAdmin dan buat dulu.");
}
?>