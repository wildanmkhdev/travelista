	<!DOCTYPE html>
	<html lang="zxx" class="no-js">

	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Travel</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<!--
			CSS
			============================================= -->
		<link rel="stylesheet" href="css/linearicons.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/magnific-popup.css">
		<link rel="stylesheet" href="css/jquery-ui.css">
		<link rel="stylesheet" href="css/nice-select.css">
		<link rel="stylesheet" href="css/animate.min.css">
		<link rel="stylesheet" href="css/owl.carousel.css">
		<link rel="stylesheet" href="css/main.css">
	</head>

	<body>
		<!-- #header -->
		<?php include "navbar.php" ?>

		<!-- start banner Area -->
		<section class="about-banner relative">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex align-items-center justify-content-center">
					<div class="about-content col-lg-12">
						<h1 class="text-white">
							Hotels
						</h1>
						<p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="hotels.html"> Hotels</a></p>
					</div>
				</div>
			</div>
		</section>
		<!-- End banner Area -->

		<!-- Start destinations Area -->
		<?php
		include "koneksi.php";

		session_start();

		?>

		<section class="destinations-area section-gap">
			<div class="container">
				<div class="row d-flex justify-content-center">
					<div class="menu-content pb-40 col-lg-8">
						<div class="title text-center">
							<h1 class="mb-10">Popular Destinations</h1>
							<p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, day to.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
					$query = "SELECT * FROM hotels";
					$result = mysqli_query($koneksi, $query);
					while ($hotel = mysqli_fetch_assoc($result)):
					?>
						<div class="col-lg-4">
							<div class="single-destinations">
								<div class="thumb">
									<img src="img/hotels/<?= htmlspecialchars($hotel['foto']) ?>" alt="<?= htmlspecialchars($hotel['name']) ?>">
								</div>
								<div class="details">
									<h4 class="d-flex justify-content-between">
										<span><?= htmlspecialchars($hotel['name']) ?></span>
										<div class="star">
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star checked"></span>
											<span class="fa fa-star"></span>
										</div>
									</h4>
									<p><?= htmlspecialchars($hotel['deskripsi']) ?></p>

									<ul class="package-list">
										<li class="d-flex justify-content-between align-items-center">
											<span>Swimming Pool</span>
											<span><?= $hotel['swimming_pool'] ? "Yes" : "No" ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Gym</span>
											<span><?= $hotel['gym'] ? "Yes" : "No" ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Wi-Fi</span>
											<span><?= $hotel['wifi'] ? "Yes" : "No" ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Room Service</span>
											<span><?= $hotel['room_service'] ? "Yes" : "No" ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Air Condition</span>
											<span><?= $hotel['air_condition'] ? "Yes" : "No" ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Restaurant</span>
											<span><?= $hotel['restaurant'] ? "Yes" : "No" ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Price per night</span>
											<span>$<?= htmlspecialchars($hotel['price']) ?></span>
										</li>
									</ul>

									<div class="mt-3">
										<a href="<?php echo (isset($_SESSION['username']) && $_SESSION['username'] != "")

																? 'book.php?hotel_id=' . $hotel['id'] : 'login.php'; ?>"

											class="btn btn-primary">
											Book Now
										</a>
									</div>


								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</section>

		<!-- End destinations Area -->


		<!-- Start home-about Area -->
		<section class="home-about-area">
			<div class="container-fluid">
				<div class="row align-items-center justify-content-end">
					<div class="col-lg-6 col-md-12 home-about-left">
						<h1>
							Did not find your Package? <br>
							Feel free to ask us. <br>
							We‘ll make it for you
						</h1>
						<p>
							inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed.
						</p>
						<a href="#" class="primary-btn text-uppercase">request custom price</a>
					</div>
					<div class="col-lg-6 col-md-12 home-about-right no-padding">
						<img class="img-fluid" src="img/hotels/about-img.jpg" alt="">
					</div>
				</div>
			</div>
		</section>
		<!-- End home-about Area -->

		<!-- start footer Area -->
		<?php include "footer.php" ?>
		<!-- End footer Area -->

		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/easing.min.js"></script>
		<script src="js/hoverIntent.js"></script>
		<script src="js/superfish.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/mail-script.js"></script>
		<script src="js/main.js"></script>
	</body>

	</html>