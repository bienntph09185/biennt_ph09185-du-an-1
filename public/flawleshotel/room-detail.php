<?php
session_start();
require_once 'utils.php';
$id = isset($_GET['id']) ? $_GET['id'] : "";

$getRoomQuery = "select * from room_types where id = '$id'";
$rooms = queryExecute($getRoomQuery, false);

$getroomGalerisQuery = "select * from room_galleries where room_id = '$id'";
$room_galleries = queryExecute($getroomGalerisQuery, true);

$getroomserviceQuery = "select * from room_service where status = 1";
$roomservice = queryExecute($getroomserviceQuery, true);
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from envato.megadrupal.com/html/flawleshotel/room-detail.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 05:48:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
	<title>Room Detail</title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/libs/jquery-ui-1.10.3.custom.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/responsive-menu.css">


	<!-- Fix ie9  -->
	<!--[if IE 9]>
	<link rel="stylesheet" type="text/css" href="css/ie9.css">
	<![endif]-->


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
							<a href="<?=BASE_URL?>index.php">
								<img src="images/logo.png" alt="logo">
							</a>
						</h1>
						


						<!-- Menu -->
						<nav id="main-nav" class="nav-collapse">
							<ul id="main-menu" class="md-menu">
								<li><a href="<?=BASE_URL?>index.php">Home</a></li>
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
	                    	<a href="<?=BASE_URL?>index.php">Home</a>
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
				<div class="md-body md-room-detail clearfix">
					<div class="grid_9 md-main">
						<section class="heading-absolute box-sidebar align-center">
							<header class="box-heading heading-large">
								D
								<div class="decription-override">
									<h2 class="h1"><?= $rooms['name']?></h2>
									<p>Sodales accumsan ante ornare</p>
								</div>
							</header>
						</section>
						<div class="row">
							<!--  Slide Preview Room -->
							<div class="row slide-preview-room">
								<div id="sliderBig">
									<ul>
										<?php foreach($room_galleries as $rg) :?>
										<li class="slideshow-photo"><img src="<?=$rg['img_url']?>" alt=""></li>
										<?php endforeach;?>
									</ul>
								</div>
								<div id="sliderThumb">
									<ul>
										<li slideIndex="0"><a href="#"><img src="img/thumbail/thumbail-1.jpg" alt=""></a></li>
										<li slideIndex="1"><a href="#"><img src="img/thumbail/thumbail-2.jpg" alt=""></a></li>
										<li slideIndex="2"><a href="#"><img src="img/thumbail/thumbail-3.jpg" alt=""></a></li>
										<li slideIndex="3"><a href="#"><img src="img/thumbail/thumbail-4.jpg" alt=""></a></li>
										<li slideIndex="4"><a href="#"><img src="img/thumbail/thumbail-5.jpg" alt=""></a></li>
										<li slideIndex="5"><a href="#"><img src="img/thumbail/thumbail-2.jpg" alt=""></a></li>
										<li slideIndex="6"><a href="#"><img src="img/thumbail/thumbail-3.jpg" alt=""></a></li>
										<li slideIndex="7"><a href="#"><img src="img/thumbail/thumbail-4.jpg" alt=""></a></li>
										<li slideIndex="8"><a href="#"><img src="img/thumbail/thumbail-5.jpg" alt=""></a></li>
										<li slideIndex="9"><a href="#"><img src="img/thumbail/thumbail-3.jpg" alt=""></a></li>
										<li slideIndex="10"><a href="#"><img src="img/thumbail/thumbail-4.jpg" alt=""></a></li>

									</ul>
								</div>
							</div>
							
							<div class="preview-content">
								<p><?=$rooms['about']?></p>
							
								<p><?= $rooms['short_desc']?></p>
							</div>

							<!-- Md booking -->
							<section class="md-booking">
								<h3 class="h3">Book <?= $rooms['name']?> only from <span class="number number-big"><?= $rooms['price']?>$<span class="one-night">/ Night</span></span></h3>
								<div class="box-booking booking-inline">
								<form id="validate" action="<?= THEME_ASSET_URL ?>validate-time.php" method="get" enctype="multipart/form-data">
											<div class="form-group">
												<label class="label-control">Arrival Date</label>
												<div class="booking-form select-black">
													<label class="collapse input">
														<input type="text" id="arrival-date" class="input-control border-white" name="checkin" />
													</label>
													<?php if (isset($_GET['checkinerr'])) : ?>
                                                        <span class="text-danger"><?= $_GET['checkinerr'] ?></span>
                                                    <?php endif ?>		
												</div>
											</div>
											<div class="form-group">
												<label class="label-control">Departure Date</label>
												<div class="booking-form select-black">
													<label class="collapse input">
														<input type="text" id="departure-date" class="input-control border-white" name="checkout" />
													</label>
													<?php if (isset($_GET['checkouterr'])) : ?>
                                                        <span class="text-danger"><?= $_GET['checkouterr'] ?></span>
                                                    <?php endif ?>
												</div>
											</div>
											<div class="form-group select">
												<label class="label-control">Adults</label>
												<div class="input-group select-black">
													<label class="collapse">
														<select id="form-select" class="form-select" name="adult">
															<option class="option-test" value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
														</select>
													</label>
												</div>
											</div>
											<div class="form-group select">
												<label class="label-control">Children</label>
												<div class="input-group select-black">
													<label class="collapse">
														<select class="form-select" name="children">
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
														</select>
													</label>
												</div>
											</div>
											<div class="form-group last">
												<label class="label-control"></label>
												<button type="submit" id="btn-search"  class="btn btn-darkbrown">TÌM KIẾM</button>
											</div>
										</form>
								</div><!-- /.box-booking -->
							</section>
						</div>
					</div><!-- /.md-main -->
					<aside class="grid_3 md-sidebar md-sidebar-pt">
						<section class="box-sidebar">
							<h2 class="h3 header-sidebar">Room Facilities</h2>
							<ul class="list list-check">
								<?php foreach($roomservice as $rs) :?>
								<li><?=$rs['name']?></li>
								<?php endforeach;?>
								
							</ul>
						</section>
					</aside><!-- /.md-sidebar -->
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

<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/room-detail.js"></script>

<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/mlpushmenu.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">
	$(function() {
		"use strict";
		$("#arrival-date, #departure-date").datepicker({});
	});
</script>
</body>

<!-- Mirrored from envato.megadrupal.com/html/flawleshotel/room-detail.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 05:48:22 GMT -->
</html>