<?php
session_start();
require_once './config/utils.php';

$getWebSettingQuery = "select * from web_setting where status = 1";
$webSetting = queryExecute($getWebSettingQuery, false);


$gethomeQuery = "select * from home_galleries";
$home = queryExecute($gethomeQuery, true);

// get data from room_types other rooms
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$getRoomQuery = "select * from room_types";
$total_records = count(queryExecute($getRoomQuery, true));

$limit = 3;
// tổng số trang làm tròn lên
$total_page = ceil($total_records / $limit);

// Tìm Start
$start =  ($current_page - 1) * $limit;

// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

// get data from room_types other rooms
$getRoomQuery = "select * from room_types LIMIT $start, $limit";
$rooms = queryExecute($getRoomQuery, true);

?>
<!doctype html>
<html lang="en">

<!-- Mirrored from envato.megadrupal.com/html/flawleshotel/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 05:47:35 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<!--  Viewport setting -->
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />

	<!--  Font -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?= THEME_ASSET_URL ?>/css/font.css">

	<!-- Jquery UI CSS   -->
	<link rel="stylesheet" type="text/css" href="<?= THEME_ASSET_URL ?>/css/libs/jquery-ui-1.10.3.custom.css">

	<!-- Library CSS  -->
	<link rel="stylesheet" type="text/css" href="<?= THEME_ASSET_URL ?>/css/jquery.bxslider.css">


	<!-- Main CSS  -->
	<link rel="stylesheet" type="text/css" href="<?= THEME_ASSET_URL ?>/css/style.css">



	<!-- Responsive CSS  -->
	<link rel="stylesheet" type="text/css" href="<?= THEME_ASSET_URL ?>/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="<?= THEME_ASSET_URL ?>/css/responsive-menu.css">


	<!-- Fix ie9  -->
	<!--[if IE 9]>
	<link rel="stylesheet" type="text/css" href="<?= THEME_ASSET_URL ?>/css/ie9.css">
	<![endif]-->

</head>

<body>
	<div class="md-hotel">
		<div id="mp-pusher" class="mp-pusher">
			<!-- Header -->
			<header class="md-header">
				<div class="container clearfix">
					<div class="grid_12">


						<!-- Logo -->
						<h1 class="md-logo">
							<a href="index.php">
								<img src="<?= THEME_ASSET_URL ?>/images/logo.png" alt="logo">
							</a>
						</h1>

						<!-- Menu -->
						<nav id="main-nav" class="nav-collapse">
							<ul id="main-menu" class="md-menu">
								<li><a href="index.php">Home</a></li>
								<li><a href="<?= THEME_ASSET_URL ?>accomodation.php">Accomodation</a></li>
								<li class="have-submenu"><a href="#">Pages</a>
									<div class="sub-menu">
										<ul class="sub-menu-inner">
											<li><a href="<?= THEME_ASSET_URL ?>blog.php">Blog</a></li>
											<li><a href="<?= THEME_ASSET_URL ?>testimonial.php">Testimonials</a></li>
											<li><a href="<?= THEME_ASSET_URL ?>shortcode.php">Shortcode</a></li>
											<li><a href="<?= THEME_ASSET_URL ?>typography.php">Typography</a></li>
										</ul>
									</div>
								</li>
								<li><a href="<?= THEME_ASSET_URL ?>new-deal.php">news &amp; deals</a></li>
								<li><a href="<?= THEME_ASSET_URL ?>world-of-flawles.php">world of flawles</a></li>
								<li><a href="<?= THEME_ASSET_URL ?>contact.php">contact</a></li>
							</ul>


						</nav>


						<!-- Icon Responsvie Menu -->
						<a id="sys_btn_toogle_menu" class="btn-toogle-res-menu" href="#alternate-menu"></a>


						<!-- Language Bar -->
						<ul class="language-bar">
							<li><a href="#"><img src="<?= THEME_ASSET_URL ?>images/english.png" alt="english"></a></li>
							<li><a href="#"><img src="<?= THEME_ASSET_URL ?>images/croatian.png" alt="croatian"></a></li>
							<li><a href="#"><img src="<?= THEME_ASSET_URL ?>images/german.png" alt="german"></a></li>
							<li><a href="#"><img src="<?= THEME_ASSET_URL ?>images/slovenian.png" alt="slovenian"></a></li>
							<li><a href="#"><img src="<?= THEME_ASSET_URL ?>images/czech.png" alt="czech"></a></li>
							<li><a href="#"><img src="<?= THEME_ASSET_URL ?>images/french.png" alt="french"></a></li>
						</ul>


					</div>
				</div>
			</header>
			<!-- Header End -->

			<!-- Menu Responsive -->
			<nav id="mp-menu" class="mp-menu alternate-menu mp-overlap right-side">
				<div class="mp-level">
					<h2>Menu</h2>
					<ul>
						<li>
							<a href="<?= THEME_ASSET_URL ?>index-2.php">Home</a>
						</li>
						<li>
							<a href="<?= THEME_ASSET_URL ?>accomodation.php">Accomodation</a>
						</li>
						<li class="has-sub">
							<a href="#">Pages</a>
							<div class="mp-level">
								<h2>Pages</h2>
								<a class="mp-back" href="#">Back</a>
								<ul>
									<li><a href="<?= THEME_ASSET_URL ?>blog.php">Blog</a></li>
									<li><a href="<?= THEME_ASSET_URL ?>testimonial.php">Testimonials</a></li>
									<li><a href="<?= THEME_ASSET_URL ?>shortcode.php">Shortcode</a></li>
									<li><a href="<?= THEME_ASSET_URL ?>typography.php">Typography</a></li>
									<li><a href="<?= THEME_ASSET_URL ?>booking-cart.php">Booking Cart</a></li>
									<li><a href="<?= THEME_ASSET_URL ?>checkout.php">CheckOut</a></li>
									<li><a href="<?= THEME_ASSET_URL ?>check-available.php">Check Available</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="<?= THEME_ASSET_URL ?>new-deal.php">News &amp; deals</a>
						</li>
						<li>
							<a href="<?= THEME_ASSET_URL ?>world-of-flawles.php">World of flawles</a>
						</li>
						<li>
							<a href="contact.php">Contact</a>
						</li>
						<li>
							<!-- Language Bar -->
							<div class="language-bar2">
								<span><a href="#"><img src="<?= THEME_ASSET_URL ?>/images/english.png" alt="english"></a></span>
								<span><a href="#"><img src="<?= THEME_ASSET_URL ?>/images/croatian.png" alt="croatian"></a></span>
								<span><a href="#"><img src="<?= THEME_ASSET_URL ?>/images/german.png" alt="german"></a></span>
								<span><a href="#"><img src="<?= THEME_ASSET_URL ?>/images/slovenian.png" alt="slovenian"></a></span>
								<span><a href="#"><img src="<?= THEME_ASSET_URL ?>/images/czech.png" alt="czech"></a></span>
								<span><a href="#"><img src="<?= THEME_ASSET_URL ?>/images/french.png" alt="french"></a></span>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- Menu Responsive End -->


			<!-- Slider with Jquery bxslider -->
			<section class="md-slide-wrapper md-slide-home">
				<!-- Slide Image-->
				<ul id="md-slide-fade" class="md-slide clearfix">
				<?php foreach ($home as $h) : ?>
					<li>
						<img src="<?=BASE_URL .$h['img_url'] ?>" alt="">
						<div class="content-slide">
							<div class="home-content">
								<h2 class="slide-title"><?= $h['small_text'] ?></h2>
								<div class="dots-line">
									<span></span>
									<span></span>
									<span></span>
								</div>
								<p class="slide-description"><?= $h['main_text'] ?></p>
								<a href="<?= $h['link_url'] ?>" class="btn btn-border btn-border-white">see more</a>
							</div>
						</div>
					</li>
					<?php endforeach ;?>
				</ul>
			</section>
			<!-- Slider End -->

			<!-- Body -->
			<div class="md-body-wrapper">
				<div class="md-home">
					<section class="row check-availability">
						<div class="container clearfix">
							<div class="grid_3">
								<h2 class="title-checkroom">Check availability</h2>
							</div>
							<div class="grid_9">
								<section class="md-booking">
									<div class="box-booking booking-inline clearfix">

										<form id="validate" action="<?= THEME_ASSET_URL ?>validate-time.php" method="get" enctype="multipart/form-data">
											<div class="form-group">
												<label class="label-control">Arrival Date</label>
												<div class="booking-form select-white">
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
												<div class="booking-form select-white">
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
												<div class="input-group select-white">
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
												<div class="input-group select-white">
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
								</section><!-- /.md-booking -->
							</div>
						</div><!-- /.container -->
					</section>
					<section class="row md-home-body">
						<div class="container clearfix">
							<aside class="grid_3 md-sidebar">
								<section class="widget-home-info">
									<h3 class="h3 header-sidebar">why Flawles hotel?</h3>
									<div class="home-content">
										<p><?= $webSetting['introduce_content'] ?></p>
										<p><?= $webSetting['introduce_content'] ?></p>
										<ul class="list list-check">
											<li>200 Rooms</li>
											<li>4 Restuarants</li>
											<li>2 Revolving Cocktail bar</li>
											<li>Swimming pool</li>
											<li>24h Parking & Security</li>
											<li>Free airport pick up service</li>
											<li>24 hour front desk staff</li>
										</ul>
									</div>
								</section>
								<section id="quote-slider" class="widget-quote">
									<div class="box-quote">
										<p><?= $webSetting['ceo_introduce'] ?></p>
										<a href="#" class="text-link link-direct">Lire plus, CEO & Founder</a>
									</div>
									<div class="box-quote">
										<p><?= $webSetting['ceo_introduce'] ?></p>
										<a href="#" class="text-link link-direct">Lire plus, CEO & Founder</a>
									</div>
									<div class="box-quote">
										<p><?= $webSetting['ceo_introduce'] ?></p>
										<a href="#" class="text-link link-direct">Lire plus, CEO & Founder</a>
									</div>

								</section>
							</aside><!-- /.md-sidebar -->

							<div class="grid_9 md-primary">
								<div class="row row-home">
								<?php foreach ($rooms as $r) : ?>
									<article class="media">
										<figure class="media-image">
											<img src="<?=BASE_URL. $r['feature_img'] ?>" alt="" class="media-object">
										</figure>
										<section class="media-body">
											<h3 class="media-header media-header-big">
												<a href="<?= THEME_ASSET_URL ?>room-detail.php?id=<?= $r['id'] ?>"><?= $r['name'] ?></a>
											</h3>
											<p class="media-content"><?= $r['about'] ?><a href="<?= THEME_ASSET_URL ?>room-detail.php?id=<?= $r['id'] ?>" class="text-link link-direct">see more</a></p>
										</section>
									</article>
								<?php endforeach;?>
								</div><!-- /.row-article -->
								<div class="text-center">
                                    <ul class="pagination">
                                        <?php
                                        // PHẦN HIỂN THỊ PHÂN TRANG
                                        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                                        if ($current_page > 1 && $total_page > 1) {
                                            echo '<li class="page-item"><a class="page-link" href="./index.php?page=' . ($current_page - 1) . '">Previous</a></li>';
                                        }

                                        // Lặp khoảng giữa
                                        for ($i = 1; $i <= $total_page; $i++) {
                                            // Nếu là trang hiện tại thì hiển thị thẻ span
                                            // ngược lại hiển thị thẻ a
                                            if ($i == $current_page) {
                                                echo '<li class="page-item active"><a class="page-link" href="./index.php?page=' . $i . '">' . $i . '</a></li>';
                                            } else {
                                                echo '<li class="page-item"><a class="page-link" href="./index.php?page=' . $i . '">' . $i . '</a></li>';
                                            }
                                        }

                                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút next
                                        if ($current_page < $total_page && $total_page > 1) {
                                            echo '<li class="page-item"><a class="page-link" href="./index.php?page=' . ($current_page + 1) . '">Next</a></li>';
                                        }
                                        ?>
                                    </ul>
                                </div>
							</div><!-- /.md-sidebar -->
						</div>
					</section><!-- /.md-home-body -->
				</div>
			</div>


			<!-- Footer -->
			<footer class="md-footer">
				<div class="container clearfix">
					<div class="grid_12">
						<div class="grid_3 footer-column inner-left">
							<div class="hotel-address">
								<h3><?=$webSetting['name']?></h3>
								<div class="footer-content">
									<address>
										<p><?=$webSetting['address']?></p>
									</address>
									<p> <a href="#" class="website">© Flawles.com</a></p>
								</div>
							</div>
						</div>
						<div class="grid_5 footer-column">
							<div class="hotel-contact">
								<h3>Contact</h3>
								<ul class="footer-content">
									<li>telephone <span class="hotel-number"><?=$webSetting['phone_number']?></span></li>
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
									<a href="<?=$webSetting['fb_url']?>"><i class="icon icon-facebook"></i></a>
									<a href="<?=$webSetting['twitter_url']?>"><i class="icon icon-twitter"></i></a>
									<a href="<?=$webSetting['email']?>"><i class="icon icon-google"></i></a>
									<a href="<?=$webSetting['youtube_url']?>"><i class="icon icon-dribbble"></i></a>
								</span>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- Footer End -->
		</div><!-- /.mp-pusher -->
	</div>

	<!-- Library Javascript  -->
	<script type="text/javascript" src="<?= THEME_ASSET_URL ?>/js/modernizr.custom.js"></script>
	<script type="text/javascript" src="<?= THEME_ASSET_URL ?>/js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="<?= THEME_ASSET_URL ?>/js/jquery-ui-1.10.3.js"></script>
	<script type="text/javascript" src="<?= THEME_ASSET_URL ?>/js/jquery.bxslider.min.js"></script>


	<!-- Responsive Menu Javascript  -->
	<script type="text/javascript" src="<?= THEME_ASSET_URL ?>/js/classie.js"></script>
	<script type="text/javascript" src="<?= THEME_ASSET_URL ?>/js/mlpushmenu.js"></script>

	<!-- Main Javascript  -->
	<script type="text/javascript" src="<?= THEME_ASSET_URL ?>/js/script.js"></script>

	<!-- Separate Javascript for each page -->
	<script type="text/javascript" src="<?= THEME_ASSET_URL ?>/js/home.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<script type="text/javascript">
		$(function() {
			"use strict";
			$("#arrival-date, #departure-date").datepicker({});
		});
		 <?php if (isset($_GET['msg'])) : ?>
                    Swal.fire({
                        position: 'bottom-center',
                        icon: 'warning',
                        title: "<?= $_GET['msg']; ?>",
                        showConfirmButton: false,
                        timer: 1500
                    });
                <?php endif; ?>
	</script>
	
</body>

<!-- Mirrored from envato.megadrupal.com/html/flawleshotel/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 21 Mar 2020 05:47:48 GMT -->

</html>