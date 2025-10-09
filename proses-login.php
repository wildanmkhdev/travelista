<?php
include "koneksi.php";
session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND email='$email' AND password='$password'";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) >= 1) {
  $data = mysqli_fetch_assoc($result);

  // Simpan semua session penting
  $_SESSION['user_id']  = $data['id'];       // <--- ini penting untuk booking
  $_SESSION['username'] = $data['username'];
  $_SESSION['role']     = $data['role'];

  if ($_SESSION['role'] === "admin") {
    echo "<script>window.location.assign('admin/index.php');</script>";
  } else {
    echo "<script>window.location.assign('index.php');</script>";
  }
} else {
  echo "<script>alert('Login gagal! Username, email atau password salah.'); window.history.back();</script>";
}
