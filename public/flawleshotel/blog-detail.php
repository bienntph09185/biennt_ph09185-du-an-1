<?php
session_start();
require_once 'utils.php';

$id = isset($_GET['id']) ? $_GET['id'] : "";
$getnewsQuery = "select * from news where id='$id'";
$news = queryExecute($getnewsQuery, false);
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from envato.megadrupal.com/html/flawleshotel/blog-detail.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 05:48:22 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
	<title>Blog Detail</title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<!--  Viewport setting -->
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />

	<!--  Font -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/font.css">
	
	<!-- Jquery UI CSS   -->
	<link rel="stylesheet" type="text/css" href="css/libs/jquery-ui-1.10.3.custom.css">

	<!-- Main CSS  -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- Responsive CSS  -->
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
				<div class="md-body md-standar-post clearfix">
					<div class="grid_9 md-main">
						<section class="heading-absolute box-sidebar align-center">
							<header class="box-heading heading-large">
								B
								<div class="decription-override">
									<h2 class="h1">our blog</h2>
									<p>porttitor felis sit amet</p>
								</div>
							</header>
						</section>
						<div class="row">
							<section class="post-body">
								<div class="media">
									<header class="post-header">
										<span class="time">March 7, 2013 </span>
										<h2 class="h2"><?=$news['title']?></h2>
									</header>
									<figure>
										<img src="<?=BASE_URL.$news['feature_img']?>" alt="" class="media-object">
									</figure>
									<div class="media-body">
										<p><?=$news['content']?></p>
									</div>
								</div>
								
							</section>
							<footer class="post-footer clearfix">
								<div class="footer-left">
									<p class="author-post">
										Post by: <span>John Lorem</span>
									</p>
									<p class="meta-post">
										<span class="meta-divider">|</span>
										<span class="meta-view"><i class="icon icon-view"></i>125</span>
										<span class="meta-divider">//</span>
										<span class="meta-comment"><i class="icon icon-comment"></i>12</span>
										<span class="meta-divider">|</span>
									</p>
									<p class="tags-post">
										Tag:
										<a href="#" class="tag-post">Toutrism</a>,
										<a href="#" class="tag-post">Photography</a>
									</p>
								</div>
								<div class="footer-right">
									Share this:
									<a href="#"><i class="icon icon-facebook"></i></a>
									<a href="#"><i class="icon icon-twitter"></i></a>
									<a href="#"><i class="icon icon-google"></i></a>
									<a href="#"><i class="icon icon-dribbble"></i></a>
								</div>
							</footer>
						</div>
						<section class="row box-comment">
							<header class="box-heading">
								<h3 class="head headline">Comments <span class="amount-comment">(4)</span></h3>
							</header>
							<ul class="list-comment">
								<li class="media">
									<figure class="pull-left">
										<img class="media-object" src="img/avatar/cmt-1.jpg" alt="">
									</figure>
									<div class="media-body">
										<header class="header-body">
											<span class="left">Donec Nibh <span class="time"><span class="meta-divider">|</span>3 days ago</span></span>
											<span class="right"><i class="icon icon-reply"></i>Reply</span>
										</header>
										<p class="content-body">Vestibulum a nisl ipsum. Curabitur aliquet nec felis quis convallis. Quisque et auctor dui, id adipiscing nunc. Etiam et dui lobortis, volutpat justo ac, tempor lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus purus nisi, porttitor ac adipiscing ac, cursus eu massa. </p>
									</div>
									<ul class="child-comment">
										<li class="media">
											<figure class="pull-left">
												<img class="media-object" src="img/avatar/cmt-2.jpg" alt="">
											</figure>
											<div class="media-body clearfix">
												<header class="header-body">
													<span class="left">Selerisque Lectus<span class="time"><span class="meta-divider">|</span>3 days ago</span></span>
													<span class="right"><i class="icon icon-reply"></i>Reply</span>
												</header>
												<p class="content-body">Morbi nec sapien molestie, fringilla libero eu, pharetra ligula. Aenean sodales velit quam, dignissim vehicula neque consectetur eget</p>
											</div>
										</li>
									</ul>
								</li>
								<li class="media">
									<figure class="pull-left">
										<img class="media-object" src="img/avatar/cmt-3.jpg" alt="">
									</figure>
									<div class="media-body">
										<header class="header-body clearfix">
											<span class="left">Duis Scelerisque<span class="time"><span class="meta-divider">|</span>3 days ago</span></span>
											<span class="right"><i class="icon icon-reply"></i>Reply</span>
										</header>
										<p class="content-body">Vestibulum a nisl ipsum. Curabitur aliquet nec felis quis convallis. Quisque et auctor dui, id adipiscing nunc. Etiam et dui lobortis, volutpat justo ac, tempor lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus purus nisi, porttitor ac adipiscing ac, cursus eu massa. </p>
									</div>
								</li>
								<li class="media last">
									<figure class="pull-left">
										<img class="media-object" src="img/avatar/cmt-4.jpg" alt="">
									</figure>
									<div class="media-body">
										<header class="header-body clearfix">
											<span class="left">Donec Nibh <span class="time">| 3 days ago</span></span>
											<span class="right"><i class="icon icon-reply"></i>Reply</span>
										</header>
										<p class="content-body">Vestibulum a nisl ipsum. Curabitur aliquet nec felis quis convallis. Quisque et auctor dui, id adipiscing nunc. Etiam et dui lobortis, volutpat justo ac, tempor lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus purus nisi, porttitor ac adipiscing ac, cursus eu massa. </p>
									</div>
								</li>
							</ul>
						</section>
						<section class="row leave-comment">
							<header class="box-heading">
								<h3 class="head headline">leave a Comment</h3>
							</header>
							<form class="label-placeholder">
								<div class="form-group input-col">
									<label class="label-control">Name <span class="start">*</span></label>
									<input type="text" class="input-control">
								</div>
								<div class="form-group input-col">
									<label class="label-control">Email <span class="start">*</span></label>
									<input type="text" class="input-control">
								</div>
								<div class="clear"></div>
								<div class="form-group">
									<label class="label-control">Your message <span class="start">*</span></label>
									<textarea class="input-control"></textarea>
								</div>
								<div class="form-group">
									<a class="btn btn-alter btn-border btn-border-brown" href="#">Submit</a>
								</div>
							</form>
						</section>
					</div><!-- /.md-main -->
					<aside class="grid_3 md-sidebar md-sidebar-pt">
						<section class="box-sidebar">
							<h3 class="h3 header-sidebar">Categories</h3>
							<ul class="list-cate list list-triangle list-uppercase">
								<li><a href="#">Cras condimentum</a></li>
								<li><a href="#">Nibh et pellentesque</a></li>
								<li><a href="#">Leo nibh gravida velit</a></li>
								<li><a href="#">Tortor augue a eros</a></li>
								<li><a href="#">libero</a></li>
							</ul>
						</section>
						<section class="box-sidebar">
							<h3 class="h3 header-sidebar">Related posts</h3>
							<ul class="list-relate">
								<li>
									<h4 class="h6"><a href="#">Aliquam nibh sapien, feugiat id mollis quis</a></h4>
									<p class="meta">
										<span class="meta-view"><i class="icon icon-view"></i>125</span>
										<span class="meta-divider">//</span>
										<span class="meta-comment"><i class="icon icon-comment"></i>12</span>
									</p>
								</li>
								<li>
									<h4 class="h6"><a href="#">Fusce adipiscing laoreet augue a posuere</a></h4>
									<p class="meta">
										<span class="meta-view"><i class="icon icon-view"></i>15</span>
										<span class="meta-divider">//</span>
										<span class="meta-comment"><i class="icon icon-comment"></i>12</span>
									</p>
								</li>
								<li>
									<h4 class="h6"><a href="#">accumsan vitae lectus. Duis id varius magna</a></h4>
									<p class="meta">
										<span class="meta-view"><i class="icon icon-view"></i>125</span>
										<span class="meta-divider">//</span>
										<span class="meta-comment"><i class="icon icon-comment"></i>12</span>
									</p>
								</li>
							</ul>
						</section>
						<section class="box-sidebar">
							<h3 class="h3 header-sidebar">Check availability</h3>
							<div class="box-booking booking-stack">
								<form>
									<div class="form-group">
										<label class="label-control">Arrival Date</label>
										<div class="booking-form select-black">
											<label class="collapse input">
												<input type="text" id="arrival-date" class="input-control border-black"/>
											</label>
										</div>
									</div>
									<div class="form-group">
										<label class="label-control">Departure Date</label>
										<div class="booking-form select-black">
											<label class="collapse input">
												<input type="text" id="departure-date" class="input-control border-black"/>
											</label>
										</div>
									</div>
									<div class="form-group row clearfix">
										<div class="col-left">
											<div class="form-group">
												<label class="label-control">Adults</label>
												<div class="input-group select-black">
													<label class="collapse">
														<select class="form-select">
															<option>1</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>
														</select>
													</label>
												</div>
											</div>
										</div>
										<div class="col-right">
											<div class="form-group">
												<label class="label-control">Children</label>
												<div class="input-group select-black">
													<label class="collapse">
														<select class="form-select">
															<option>1</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>
														</select>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group last">
										<label class="label-control"></label>
										<a href="#" class="btn btn-large btn-darkbrown">check</a>
									</div>
								</form>
							</div><!-- /.box-booking -->
						</section>
						<section class="box-sidebar">
							<h3 class="h3 header-sidebar">Tags</h3>
							<ul class="list-tags clearfix">
								<li><a href="#">Suspendisse</a></li>
								<li><a href="#">justo</a></li>
								<li class="active-tag"><a href="#">consectetur</a></li>
								<li><a href="#">tristique tempus </a></li>
								<li><a href="#">laoreet in</a></li>
								<li><a href="#">pharetra</a></li>
							</ul>
						</section>
						<section class="box-sidebar">
							<h3 class="h3 header-sidebar">archives</h3>
							<ul class="list list-triangle list-uppercase">
								<li><a href="#">June 2013</a></li>
								<li><a href="#">May 2013</a></li>
								<li><a href="#">April 2013</a></li>
								<li><a href="#">March 2013</a></li>
								<li><a href="#">February 2013</a></li>
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


<!-- Library Javascript  -->
<script type="text/javascript" src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.js"></script>

<!-- Responsive Menu Javascript  -->
<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/mlpushmenu.js"></script>

<!-- Main Javascript  -->
<script type="text/javascript" src="js/script.js"></script>

<!-- Separate Javascript for each page -->	
<script type="text/javascript">
	$(function() {
		"use strict";
		$("#arrival-date, #departure-date").datepicker({
		});
	});
</script>
</body>

<!-- Mirrored from envato.megadrupal.com/html/flawleshotel/blog-detail.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 05:48:23 GMT -->
</html>