<?php
include 'config.php';

if(isset($_POST['submit'])){
  $nama  = $_POST['nama'];
  $email = $_POST['email'];
  $pass  = $_POST['password'];

  $stmt = $conn->prepare("INSERT INTO users (nama,email,password) VALUES (?,?,?)");
  $stmt->bind_param("sss", $nama, $email, $pass);
  
  if($stmt->execute()){
    echo "<script>alert('Daftar berhasil'); window.location='login.php';</script>";
  } else {
    echo "<script>alert('Email sudah digunakan');</script>";
  }
}
?>