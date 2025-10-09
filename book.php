<?php
session_start();
include "koneksi.php";

// Cek login
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
// ambil hotel idnya
$hotel_id = $_GET['hotel_id'];

// Ambil data hotel berdasarkan id_hotel yg di dapar dari url 
$query = mysqli_query($koneksi, "SELECT * FROM hotels WHERE id = $hotel_id");
$hotel = mysqli_fetch_assoc($query);

// Proses booking 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id  = $_SESSION['user_id']; // ambil dari session yg sednag aktfi atau ligin
  $checkin  = $_POST['checkin']; // ambil dari inputan pengguna
  $checkout = $_POST['checkout']; //ini ambil dari inputan pengguuna
  $price    = $hotel['price']; //ini ambil dari database

  // Hitung malam
  // $nights = (new DateTime($checkout))->diff(new DateTime($checkin))->days;
  $nights = (new DateTime($checkout))->diff(new DateTime($checkin))->days;
  // diff adalah function bawan php untuk hitung selisih hari


  // menghitung hari check in
  if ($nights <= 0) $nights = 1;
  $total_amount = $price * $nights;  // harga dikali permalam

  // Generate booking ID
  $booking_trx_id = 'TRX' . date("Ymd") . rand(100, 999);

  // Insert booking
  $sql = "INSERT INTO booking_transactions
          (booking_trx_id, user_id, hotel_id, check_in, check_out, price_at_booking, total_amount, status, created_at)
          VALUES ('$booking_trx_id', $user_id, $hotel_id, '$checkin', '$checkout', $price, $total_amount, 'Pending', NOW())";
// jalankan query nya
  mysqli_query($koneksi, $sql);

  echo "<script>
          alert('Booking berhasil!');
          window.location.href='my-booking.php?booking_trx_id=$booking_trx_id';
        </script>";
  exit;
  // jika berhasil booking arahkan ke halaman my-booking.php dengan membawa booking trx id yg sudah kita generate contoh my-booking.php?bookig_trx_id=TRX89454
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Checkout - <?= $hotel['name'] ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card p-3">
          <img src="img/hotels/<?= $hotel['foto'] ?>" class="card-img-top mb-3" alt="<?= $hotel['name'] ?>">
          <div class="card-body">
            <h4 class="card-title"><?= $hotel['name'] ?></h4>
            <p class="card-text"><?= $hotel['deskripsi'] ?></p>
            <p><strong>Price / night :</strong> $<?= $hotel['price'] ?></p>

            <form method="post">
              <div class="mb-3">
                <label class="form-label">Check-in</label>
                <input type="date" name="checkin" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Check-out</label>
                <input type="date" name="checkout" class="form-control" required>
              </div>
              <button type="submit" class="btn btn-success w-100">Confirm Booking</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>