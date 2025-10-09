<?php
session_start();
include "koneksi.php";

// Cek login
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
//ambil user yg sedang aktif
$user_id = $_SESSION['user_id'];

// Cek apakah ada booking_trx_id dari GET (dari checkout)
$booking_trx_id = isset($_GET['booking_trx_id']) ? $_GET['booking_trx_id'] : '';

// Format rupiah
function rupiah($angka)
{
  return 'Rp ' . number_format($angka, 0, ",", ".");
}

// Jika ada booking_trx_id, tampilkan 1 booking spesifik
if ($booking_trx_id) {
  $query = "
    SELECT 
        booking_transactions.*, 
        hotels.name AS hotel_name, 
        hotels.foto AS hotel_foto
    FROM 
        booking_transactions
    JOIN 
        hotels
        ON booking_transactions.hotel_id = hotels.id
    WHERE 
        booking_transactions.booking_trx_id = '$booking_trx_id'
        AND booking_transactions.user_id = $user_id
";


  $result = mysqli_query($koneksi, $query);
  $single_booking = mysqli_fetch_assoc($result);
} else {
  // Jika tidak ada booking_trx_id, ambil semua booking user
  $query = "SELECT bt.*, h.name AS hotel_name, h.foto AS hotel_foto
            FROM booking_transactions bt
            JOIN hotels h ON bt.hotel_id = h.id
            WHERE bt.user_id = $user_id
            ORDER BY bt.created_at DESC";

  $result = mysqli_query($koneksi, $query);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Bookings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .status-pending {
      color: #ffc107;
      font-weight: bold;
    }

    .status-success {
      color: #28a745;
      font-weight: bold;
    }

    .highlight-card {
      border: 3px solid #28a745;
      box-shadow: 0 0 15px rgba(40, 167, 69, 0.3);
    }
  </style>
</head>

<body>
  <div class="container my-5">
    <h2 class="mb-4">📋 My Bookings</h2>

    <?php if ($booking_trx_id && $single_booking): ?>
      <!-- Tampilan untuk 1 booking dari checkout -->
      <div class="alert alert-success">
        ✅ Booking berhasil! Berikut detail booking Anda:
      </div>

      <?php
      $checkin = new DateTime($single_booking['check_in']);
      $checkout = new DateTime($single_booking['check_out']);
      $nights = $checkout->diff($checkin)->days;
      ?>

      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card highlight-card">
            <img src="img/hotels/<?= $single_booking['hotel_foto'] ?>" class="card-img-top" alt="<?= $single_booking['hotel_name'] ?>" style="height: 300px; object-fit: cover;">
            <div class="card-body">
              <h4 class="card-title"><?= $single_booking['hotel_name'] ?></h4>
              <hr>
              <p class="mb-2"><strong>Booking ID:</strong> <?= $single_booking['booking_trx_id'] ?></p>
              <p class="mb-2"><strong>Check-in:</strong> <?= $checkin->format('d M Y') ?></p>
              <p class="mb-2"><strong>Check-out:</strong> <?= $checkout->format('d M Y') ?></p>
              <p class="mb-2"><strong>Jumlah Malam:</strong> <?= $nights ?> malam</p>
              <p class="mb-2"><strong>Total:</strong> <?= rupiah($single_booking['total_amount']) ?></p>
              <p class="mb-3">
                <strong>Status:</strong>
                <span class="status-<?= strtolower($single_booking['status']) ?>">
                  <?= $single_booking['status'] ?>
                </span>
              </p>
              <a href="invoice.php?booking_trx_id=<?= $single_booking['booking_trx_id'] ?>" class="btn btn-primary">
                📄 Lihat Invoice
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-4">
        <a href="my-booking.php" class="btn btn-secondary">Lihat Semua Booking</a>
        <a href="index.php" class="btn btn-outline-secondary">Kembali ke Home</a>
      </div>

    <?php else: ?>
      <!-- Tampilan untuk semua booking user -->

      <?php if (mysqli_num_rows($result) == 0): ?>
        <div class="alert alert-info">Belum ada booking.</div>
      <?php else: ?>

        <div class="row">
          <?php while ($booking = mysqli_fetch_assoc($result)): ?>
            <?php
            $checkin = new DateTime($booking['check_in']);
            $checkout = new DateTime($booking['check_out']);
            $nights = $checkout->diff($checkin)->days;
            ?>

            <div class="col-md-6 mb-4">
              <div class="card h-100">
                <img src="img/hotels/<?= $booking['hotel_foto'] ?>" class="card-img-top" alt="<?= $booking['hotel_name'] ?>" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                  <h5 class="card-title"><?= $booking['hotel_name'] ?></h5>
                  <p class="mb-1"><strong>Booking ID:</strong> <?= $booking['booking_trx_id'] ?></p>
                  <p class="mb-1"><strong>Check-in:</strong> <?= $checkin->format('d M Y') ?></p>
                  <p class="mb-1"><strong>Check-out:</strong> <?= $checkout->format('d M Y') ?></p>
                  <p class="mb-1"><strong>Jumlah Malam:</strong> <?= $nights ?> malam</p>
                  <p class="mb-1"><strong>Total:</strong> <?= rupiah($booking['total_amount']) ?></p>
                  <p class="mb-3">
                    <strong>Status:</strong>
                    <span class="status-<?= strtolower($booking['status']) ?>">
                      <?= $booking['status'] ?>
                    </span>
                  </p>
                  <a href="invoice.php?booking_trx_id=<?= $booking['booking_trx_id'] ?>" class="btn btn-primary btn-sm">
                    📄 Lihat Invoice
                  </a>
                </div>
              </div>
            </div>

          <?php endwhile; ?>
        </div>

      <?php endif; ?>

      <a href="index.php" class="btn btn-secondary mt-3">← Kembali ke Home</a>

    <?php endif; ?>

  </div>
</body>

</html>