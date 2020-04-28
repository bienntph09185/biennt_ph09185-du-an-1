<?php
session_start();
require_once 'utils.php';
$id = isset($_GET['id']) ? $_GET['id'] : -1;
$checkin = isset($_GET['checkin']) ? $_GET['checkin'] : "";
$checkout = isset($_GET['checkout']) ? $_GET['checkout'] : "";
$getRoomQuery = "select *from room_types where id = $id and status = 1";
$rooms = queryExecute($getRoomQuery, false);
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from envato.megadrupal.com/html/flawleshotel/checkout.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 05:48:12 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
	<title>Check out</title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="stylesheet" type="text/css" href="css/libs/jquery-ui-1.10.3.custom.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/responsive-menu.css">
</head>

<body>
	<!-- PRELOADER -->
	<div id="preloader">
		<span class="loader" data-loading-text="loading">
		</span>
	</div>
	<!-- END / PRELOADER -->
	<div class="md-hotel">
		<div id="mp-pusher" class="mp-pusher">
			<header class="md-header">
				<div class="container clearfix">
					<div class="grid_12">

						<!-- Logo -->
						<h1 class="md-logo">
							<a href="<?= BASE_URL ?>index.php">
								<img src="images/logo.png" alt="logo">
							</a>
						</h1>



						<!-- Menu -->
						<nav id="main-nav" class="nav-collapse">
							<ul id="main-menu" class="md-menu">
								<li><a href="<?= BASE_URL ?>index.php">Home</a></li>
								<li><a href="accomodation.php">Accomodation</a></li>
								<li class="have-submenu"><a href="#">Pages</a>
									<div class="sub-menu">
										<ul class="sub-menu-inner">
											<li><a href="blog.php">Blog</a></li>
											<li><a href="testimonial.php">Testimonials</a></li>
											<li><a href="shortcode.php">Shortcode</a></li>
											<li><a href="typography.php">Typography</a></li>
											<li><a href="booking-cart.php">Booking Cart</a></li>
											<li><a href="checkout.php">CheckOut</a></li>
											<li><a href="check-available.php">Check Available</a></li>
										</ul>
									</div>
								</li>
								<li><a href="new-deal.php">news &amp; deals</a></li>
								<li><a href="world-of-flawles.php">world of flawles</a></li>
								<li><a href="contact.php">contact</a></li>
							</ul>

						</nav>
						<!-- Icon Responsvie Menu -->
						<a id="sys_btn_toogle_menu" class="btn-toogle-res-menu" href="#alternate-menu"></a>


						<!-- Language Bar -->
						<ul class="language-bar">
							<li><a href="#"><img src="images/english.png" alt="english"></a></li>
							<li><a href="#"><img src="images/croatian.png" alt="croatian"></a></li>
							<li><a href="#"><img src="images/german.png" alt="german"></a></li>
							<li><a href="#"><img src="images/slovenian.png" alt="slovenian"></a></li>
							<li><a href="#"><img src="images/czech.png" alt="czech"></a></li>
							<li><a href="#"><img src="images/french.png" alt="french"></a></li>
						</ul>



					</div>
				</div>
			</header><!-- /.md-header -->

			<!-- Menu Responsive -->
			<nav id="mp-menu" class="mp-menu alternate-menu mp-overlap right-side">
				<div class="mp-level">
					<h2>Menu</h2>
					<ul>
						<li>
							<a href="<?= BASE_URL ?>index.php">Home</a>
						</li>
						<li>
							<a href="accomodation.php">Accomodation</a>
						</li>
						<li class="has-sub">
							<a href="#">Pages</a>
							<div class="mp-level">
								<h2>Pages</h2>
								<a class="mp-back" href="#">Back</a>
								<ul>
									<li><a href="blog.php">Blog</a></li>
									<li><a href="testimonial.php">Testimonials</a></li>
									<li><a href="shortcode.php">Shortcode</a></li>
									<li><a href="typography.php">Typography</a></li>
									<li><a href="booking-cart.php">Booking Cart</a></li>
									<li><a href="checkout.php">CheckOut</a></li>
									<li><a href="check-available.php">Check Available</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="new-deal.php">News &amp; deals</a>
						</li>
						<li>
							<a href="world-of-flawles.php">World of flawles</a>
						</li>
						<li>
							<a href="contact.php">Contact</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- Menu Responsive End -->


			<div class="container">
				<div class="md-body md-checkout clearfix">
					<aside class="grid_3 md-sidebar align-center">
						<header class="box-heading heading-large">
							C
							<div class="decription-override">
								<h2 class="h1">Check out</h2>
								<p>Ipsum non tristique iaculis </p>
							</div>
						</header>
					</aside><!-- /.md-sidebar -->
					<div class="grid_9 md-main">
						<section class="row row-shoping clearfix">
							<header class="box-heading">
								<h3 class="head headborder">Shopping cart contents</h3>
							</header><!-- /.box-heading -->
							<div class="row-room clearfix">
								<div class="col-thumbnail-room">
									<img src="img/demo1.jpg" alt="" class="media-object mini">
								</div>
								<div class="col-info-room">
									<h4 class="h4"><?= $rooms['name'] ?></h4>
									<span class="day-arrival">Arrival: <?php echo $checkin ?></span><br>
									<span class="day-departure">Departure:<?php echo $checkout ?></span>
								</div>
								<div class="col-number-price">
									<span class="number">$<?= $rooms['price'] ?></span>
								</div><!-- /.col-number-price -->
							</div>

						</section><!-- /.shopping-card -->
						<section class="row row-billing clearfix">
							<header class="box-heading">
								<h3 class="head headborder"> Information</h3>
							</header><!-- /.box-heading -->
							<div class="box-body">
								<div class="col-left">
									<form action="save-booking.php" method="post" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?= $rooms['id'] ?>">
										<div class="form-group">
											<label class="label-control">Email<span class="start">*</span></label>
											<input type="text" class="input-control" name="email">
										</div>
										<div class="form-group">
											<label class="label-control">Checkin<span class="start">*</span></label>
											<input type="text" id="form-checkin" value="<?= $checkin ?>" name="checkin" class="datepicker input-control">
										</div>
										<div class="form-group">
											<label class="label-control">Checkout<span class="start">*</span></label>
											<input type="text" value="<?= $checkout ?>" name="checkout" class="datepicker input-control">
										</div>
										<div class="form-group">
											<label class="label-control">Full name<span class="start">*</span></label>
											<input type="text" class="input-control" name="customer_name">
										</div>
										<div class="form-group">
											<label class="label-control">Số người lớn<span class="start">*</span></label>
											<input class="input-control" type="text" name="adult" id="form-adults" value="<?= $rooms['adult'] ?> NGƯỜI LỚN" disabled>
										</div>
										<div class="form-group">
											<label class="label-control">Số trẻ nhỏ<span class="start">*</span></label>
											<input class="input-control" type="text" name="children" id="form-adults" value="<?= $rooms['children'] ?> TRẺ NHỎ" disabled>
										</div>
										<div class="form-group">
											<label class="label-control">Address<span class="start">*</span></label>
											<input type="text" class="input-control" name="address">
										</div>
										<div class="form-group">
											<label class="label-control">Lời nhắn<span class="start">*</span></label>
											<input type="text" class="input-control" name="message">
										</div>
										<input type="hidden" name="check_in" value="1">
										<div class="form-group">
											<label class="label-control"></label>
											<button type="submit" class="btn btn-large btn-darkbrown">BOOK</button>
										</div>
								</div>
							</div>
					</div><!-- /.box-body -->
					</section><!-- /.billing-info -->
				</div>
			</div><!-- /.md-main -->
		</div><!-- /.md-testimonail -->
	</div><!-- /.md-wrapper  -->


	<footer class="md-footer">
		<div class="container clearfix">
			<div class="grid_12">
				<div class="grid_3 footer-column inner-left">
					<div class="hotel-address">
						<h3>Flawles Hotel</h3>
						<div class="footer-content">
							<address>
								<p>125 West 26th Street</p>
								<p>Suite 600 New York, NY 10011</p>
							</address>
							<p class="website">© Flawles.com</p>
						</div>
					</div>
				</div>
				<div class="grid_5 footer-column">
					<div class="hotel-contact">
						<h3>Contact</h3>
						<ul class="footer-content">
							<li>telephone <span class="hotel-number">(012) 345-6789</span></li>
							<li>fax <span class="hotel-number">(012) 345-6789</span></li>
							<li>reservations <span class="hotel-number">(012) 345-6789</span></li>
						</ul>
					</div>
				</div>
				<div class="grid_4 footer-column inner-right">
					<div class="hotel-news">
						<h3>Newsletter</h3>
						<div class="footer-content">
							<p>Sign up for our newsletter, and we’ll keep you updated on all events at Flawles!</p>
							<form>
								<input type="text"><button type="submit" class="btn btn-brown">Send</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="grid_12">
				<div class="footer-social">
					<div class="social-inner">
						<h4>Follow us</h4>
						<span class="social-group">
							<a href="#"><i class="icon icon-facebook"></i></a>
							<a href="#"><i class="icon icon-twitter"></i></a>
							<a href="#"><i class="icon icon-google"></i></a>
							<a href="#"><i class="icon icon-dribbble"></i></a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- /.md-footer -->
	</div>
	</div>
	<script type="text/javascript" src="js/modernizr.custom.js"></script>
	<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.3.js"></script>
	<script type="text/javascript" src="js/classie.js"></script>
	<script type="text/javascript" src="js/mlpushmenu.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

	<script type="text/javascript">
		$(function() {
			"use strict";
			$("#arrival-date, #departure-date").datepicker({
				// showOn: "button",
				// buttonImage: "images/calendar.gif",
				// buttonImageOnly: true
			});
		});
	</script>
</body>

<!-- Mirrored from envato.megadrupal.com/html/flawleshotel/checkout.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 05:48:12 GMT -->

</html>