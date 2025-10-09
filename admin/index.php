<?php
session_start();
if ($_SESSION["role"] != "admin") {
  echo "<script>
  alert('anda bukan admin silahkan login dengan akun admin')
  window.location.assign('../login.php')
  
  </script>";
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <head>
    <!-- Mobile Specific Meta -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png" />
    <!-- Author Meta -->
    <meta name="author" content="colorlib" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>Travel</title>

    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700"
      rel="stylesheet" />
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href=".css/linearicons.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/magnific-popup.css" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="css/nice-select.css" />
    <link rel="stylesheet" href="css/animate.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.css" />
    <link rel="stylesheet" href="css/main.css" />

  </head>
</head>

<body>
  <p>selamat datang <?= $_SESSION['username'] ?></p>
  <a href="../logout.php">logout</a> <br>
  <a href="./hotel/tambah-hotel.php">Tambah hotel</a> <br>
  <a href="./transaction/transaction.php">manage Transaction</a> <br>
  <!-- <header id="header">
    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 col-sm-6 col-6 header-top-left">
            <ul>
              <li><a href="#">Visit Us</a></li>
              <li><a href="#">Buy Tickets</a></li>
            </ul>
          </div>
          <div class="col-lg-6 col-sm-6 col-6 header-top-right">
            <div class="header-social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-dribbble"></i></a>
              <a href="#"><i class="fa fa-behance"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container main-menu">
      <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
          <a href="index.php"><img src="img/logo.png" alt="Logo" /></a>
        </div>

        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="hotels.php">Hotels</a></li>
            <li><a href="insurance.php">Insurance</a></li>
            <li><a href="contact.php">Contact</a></li>

            <!-- Dropdown User -->
  <li class="nav-item dropdown" style="list-style: none;">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
      data-bs-toggle="dropdown" aria-expanded="false">
      <?php echo $_SESSION['username']; ?>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
      <li><a class="dropdown-item" href="profile.php">Profile</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
    </ul>
  </li>
  </ul>
  </nav>
  <!-- #nav-menu-container -->
  </div>
  </div>
  </header> -->

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>