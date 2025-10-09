<?php
// Mulai session jika belum
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<header id="header">
  <!-- Top Header -->
  <div class="header-top">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-sm-6 col-6 header-top-left">
          <ul class="list-inline mb-0">
            <li class="list-inline-item"><a href="#">Visit Us</a></li>
            <li class="list-inline-item"><a href="#">Buy Tickets</a></li>
          </ul>
        </div>
        <div class="col-lg-6 col-sm-6 col-6 header-top-right text-end">
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

  <!-- Navbar -->
  <div class="container py-2">
    <div class="d-flex justify-content-between align-items-center">
      <!-- Logo -->
      <div id="logo">
        <a href="index.php"><img src="img/logo.png" alt="Logo" height="40" /></a>
      </div>

      <!-- Menu + User -->
      <ul class="nav align-items-center">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="hotels.php">Hotels</a></li>
        <li class="nav-item"><a class="nav-link" href="insurance.php">Insurance</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>

        <?php if (isset($_SESSION['role']) && $_SESSION['role'] != ""): ?>
          <!-- User sudah login -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= htmlspecialchars($_SESSION['role']) ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="my-booking.php">View My Booking</a></li>
        <?php else: ?>
          <!-- Belum login -->
          <li class="nav-item"><a class="btn btn-primary" href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</header>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>