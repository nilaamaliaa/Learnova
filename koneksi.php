<?php
$conn = mysqli_connect("localhost", "root", "", "learnnova");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>