<?php
require "koneksi.php";
session_start();

// ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$email    = $_POST['email'];

// query ke database
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND email='$email'";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) >= 1) {
  $row = mysqli_fetch_assoc($result);

  // simpan data user ke session
  $_SESSION['user_id']   = $row['id'];
  $_SESSION['username']  = $row['username'];
  $_SESSION['role']      = $row['role'];

  // cek role untuk redirect
  if ($row['role'] === 'admin') {
    echo "<script>
  window.location.assign('admin/index.php');
    </script>";
  } else {
    echo "<script>
  window.location.assign('index.php');
    </script>";
  }
}
