<?php
session_start();
require_once '../../config/utils.php';

# get contacts table
$getContactsQuery = "select * from contact";
$contacts = queryExecute($getContactsQuery, true);

$getWebSettingQuery = "select * from web_setting where status = 1";
$webSetting = queryExecute($getWebSettingQuery, false);
?>
<!doctype html>
<html lang="en">

<!-- Mirrored from envato.megadrupal.com/html/flawleshotel/contact.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 05:48:20 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
	<title>Contact page</title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="stylesheet" type="text/css" href="css/libs/jquery-ui-1.10.3.custom.css">
	<link rel="stylesheet" type="text/css" href="css/libs/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/responsive-menu.css">


	<!-- Fix ie9  -->
	<!--[if IE 9]>
	<link rel="stylesheet" type="text/css" href="css/ie9.css">
	<![endif]-->
	<style>
		#map_canvas {
	        /*width: 500px;*/
	        height: 820px;
	      }

	</style>
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
	                    	<a href="<?=BASE_URL?>.php">Home</a>
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


			<section class="md-contact">
				<figure class="bg-contact">
					<img src="img/bg-contact.jpg" alt="">
					<div class="bg-pattern"></div>
				</figure>
				<div class="contact-wrap">
					<div class="layout-left">
						<header class="box-heading heading-large">
							C
							<div class="decription-override">
								<h2 class="h1">Contact</h2>
								<p>get in touch</p>
							</div>
						</header>
						<p id="contact-content" class="description">Praesent iaculis facilisis elit, sed pellentesque orci pulvinar vitae. Aenean laoreet non purus in faucibus. Maecenas ac felis lacinia, vulputate arcu porttitor, commodo mi. </p>
						<div class="row form-contact">
							<form id="contact-form" action="<?= ADMIN_URL . 'contact/save-add.php' ?>" class="label-placeholder" action="https://envato.megadrupal.com/html/flawleshotel/processContact.php" method="post">
								<div class="row clearfix"> 
									<div class="form-group">
										<input id="contact-name" type="text" name="name" class="input-control" placeholder="Name">
										<?php if (isset($_GET['nameerr'])) : ?>
                                            <label class="error"><?= $_GET['nameerr'] ?></label>
                                        <?php endif; ?>
									</div>
									<div class="form-group">
										<input id="contact-email" type="text" name="email" class="input-control" placeholder="Email">
										<?php if (isset($_GET['emailerr'])) : ?>
                                            <label class="error"><?= $_GET['emailerr'] ?></label>
                                        <?php endif; ?>
									</div>
								</div>
								<div class="form-group">
									<input type="text" name="subject" class="input-control" placeholder="Subject">
									<?php if (isset($_GET['subjecterr'])) : ?>
                                            <label class="error"><?= $_GET['subjecterr'] ?></label>
                                        <?php endif; ?>
								</div>
								<div class="form-group">
									<textarea  id="contact-textarea"  class="input-control" placeholder="Your message" name="message"></textarea>
									<?php if (isset($_GET['messageerr'])) : ?>
                                            <label class="error"><?= $_GET['messageerr'] ?></label>
                                        <?php endif; ?>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-alter btn-border btn-border-brown" id="submit-contact">Submit</button>
								</div>
							</form>
						</div><!-- /.form-contact -->
						<div class="address-wrap clearfix">
							<div class="address-info">
								<ul>
									<li><i class="icon icon-map-white"></i><?=$webSetting['address']?></li>
									<li><i class="icon icon-phone"></i><?=$webSetting['phone_number']?></li>
									<li><i class="icon icon-mail"></i><?=$webSetting['email']?></a></li>
								</ul>
							</div>
							<div class="address-map">
								<div>
									<i class="icon icon-map-brown"></i>
									<a class="popup-gmaps" href="<?=$webSetting['map_url']?>">See Map</a>
								</div>
							</div>
						</div><!-- /.address-wrap -->
					</div>
				</div>
			</section><!-- /.md-wrapper  -->

			
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


<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript" src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.js"></script>
<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/mlpushmenu.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="js/jquery.magnific-popup.map.js"></script>


<script type="text/javascript" src="js/script.js"></script>

<script type="text/javascript">
	$(function() {
		"use strict";
		$("#arrival-date, #departure-date").datepicker({
			// showOn: "button",
			// buttonImage: "images/calendar.gif",
			// buttonImageOnly: true
		});

		// Script for Popup Map Address
 	// 	$('.popup-gmaps').magnificPopup({
		// 	// disableOn: 700,
		// 	type: 'iframe',
		// 	mainClass: 'md-map',
		// 	removalDelay: 160,
		// 	preloader: false,
		// 	fixedContentPos: false
		// });

	$('.popup-gmaps').magnificPopupMap();

		if($("#contact-form").length > 0){
	      // Validate the contact form
	      $('#contact-form').validate({
	        // Add requirements to each of the fields
	        rules: {
	          name: {
	            required: true,
	            minlength: 2
	          },
	          email: {
	            required: true,
	            email: true
	          },
	          message: {
	            required: true,
	            minlength: 10
	          }
	        },

	        // Specify what error messages to display
	        // when the user does something horrid
	        messages: {
	          name: {
	            required: "Please enter your name.",
	            minlength: $.format("At least {0} characters required.")
	          },
	          email: {
	            required: "Please enter your email.",
	            email: "Please enter a valid email."
	          },
	          message: {
	            required: "Please enter a message.",
	            minlength: $.format("At least {0} characters required.")
	          }
	        },

	        // Use Ajax to send everything to processForm.php
	        submitHandler: function(form) {
	          $("#submit-contact").php("Sending...");
	          $(form).ajaxSubmit({
	            success: function(responseText, statusText, xhr, $form) {
	              $("#contact-content").slideUp(600, function() {
					$("#contact-content").php(responseText).slideDown(600);
				  });
				  $("#submit-contact").php("Submit");
	            }
	          });
	          return false;
	        }
	      });
	    }
	});

 	
 	</script>


</body>

<!-- Mirrored from envato.megadrupal.com/html/flawleshotel/contact.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 05:48:21 GMT -->
</html>