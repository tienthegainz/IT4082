<!doctype html>
<html>
<head>

<!--<meta charset="utf-8">-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>HST &mdash; HEDSPI STRENGTH TRAINING</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Free HTML5 Website Template by freehtml5.co" />
<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
<meta name="author" content="freehtml5.co" />

<!--
//////////////////////////////////////////////////////

FREE HTML5 TEMPLATE
DESIGNED & DEVELOPED by FreeHTML5.co

Website: 		http://freehtml5.co/
Email: 			info@freehtml5.co
Twitter: 		http://twitter.com/fh5co
Facebook: 		https://www.facebook.com/fh5co

//////////////////////////////////////////////////////
 -->

	<!-- Facebook and Twitter integration -->
<meta property="og:title" content=""/>
<meta property="og:image" content=""/>
<meta property="og:url" content=""/>
<meta property="og:site_name" content=""/>
<meta property="og:description" content=""/>
<meta name="twitter:title" content="" />
<meta name="twitter:image" content="" />
<meta name="twitter:url" content="" />
<meta name="twitter:card" content="" />

<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">

<!-- Animate.css -->
<link rel="stylesheet" href="css/animate.css">
<!-- Icomoon Icon Fonts-->
<link rel="stylesheet" href="css/icomoon.css">
<!-- Bootstrap  -->
<link rel="stylesheet" href="css/bootstrap.css">

<!-- Magnific Popup -->
<link rel="stylesheet" href="css/magnific-popup.css">

<!-- Owl Carousel  -->
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">

<!-- Theme style  -->
<link rel="stylesheet" href="css/style.css">

<!-- Modernizr JS -->
<script src="js/modernizr-2.6.2.min.js"></script>
<!-- FOR IE9 below -->
<!--[if lt IE 9]>
<script src="js/respond.min.js"></script>
<![endif]-->
<!-- Bieu do calories -->
<!-- amCharts javascript sources -->
	<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
	<script type="text/javascript" src="https://www.amcharts.com/lib/3/pie.js"></script>

	<!-- Them vai ham linh tinh -->

</head>
<body>
	<div class="fh5co-loader"></div>

	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
						<p class="num">Call: +01 123 456 7890</p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-github"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="index.php">HEDSPI<span>.</span></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li ><a href="index.php">Homepage</a></li>
							<li class="has-dropdown">
								<a >User</a>
								<?php
                session_start();
									if(!isset($_SESSION['username'])) echo '
										<ul class="dropdown">
											<li><a href="login.php">Login</a></li>
											<li><a href="signup.php">Register</a></li>
										</ul>
										';
									else{
										echo '
											<ul class="dropdown">
												<li><a href="userinfo.php">Change info</a></li>
												<li><a href="stronglift.php">Training</a></li>
												<li><a href="track.php">Tracking chart</a></li>
												<li><a href="logout.php">Logout</a></li>
											</ul>
											';
									}
								?>
							</li>
							<li class="active"><a href="about_us.php">About us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>

	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>There is no shortcut</h1>
							<h2>Một dự án nhỏ của <a  target="_blank">Nhóm 3</a></h2>
							<p><a href="https://www.youtube.com/watch?v=XCWfg_S4Bmc" class="btn btn-primary popup-vimeo">See our story</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

  <div id="fh5co-trainer">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Thanh vien nhom</h2>
					<p>Xin phep duoc gui loi toi cac senpai, cac sama da nhiet tinh giup do.<br>本当にありがとうございます</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 animate-box">
					<div class="trainer">
						<a href="#"><img class="img-responsive" src="images/bach.jpg" alt="trainer"></a>
						<div class="title">
							<h3><a href="#">Đỗ Huy Bách</a></h3>
							<span>App Android</span>
						</div>
						<div class="desc text-center">
							<ul class="fh5co-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="https://www.facebook.com/profile.php?id=100004061041624"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-github"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 animate-box">
					<div class="trainer">
						<a href="#"><img class="img-responsive" src="images/chien.jpg" alt="trainer"></a>
						<div class="title">
							<h3><a href="#">Phạm Chiến</a></h3>
							<span>Front-end Web</span>
						</div>
						<div class="desc text-center">
							<ul class="fh5co-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="https://www.facebook.com/profile.php?id=100004061041624"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-github"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 animate-box">
					<div class="trainer">
						<a href="#"><img class="img-responsive" src="images/duc.jpg" alt="trainer"></a>
						<div class="title">
							<h3><a href="#">Trần Vũ Đức</a></h3>
							<span>App Android</span>
						</div>
						<div class="desc text-center">
							<ul class="fh5co-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-github"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<br><br>
			<div class="row">
				<div class="col-md-4 col-sm-4 animate-box">
					<div class="trainer">
						<a href="#"><img class="img-responsive" src="images/quang.jpg" alt="trainer"></a>
						<div class="title">
							<h3><a href="#">Trần Bá Quang</a></h3>
							<span>App Android</span>
						</div>
						<div class="desc text-center">
							<ul class="fh5co-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-github"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 animate-box">
					<div class="trainer">
						<a href="#"><img class="img-responsive" src="images/son.jpg" alt="trainer"></a>
						<div class="title">
							<h3><a href="#">Lưu Xuân Sơn</a></h3>
							<span>Sever-side APP</span>
						</div>
						<div class="desc text-center">
							<ul class="fh5co-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-github"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 animate-box">
					<div class="trainer">
						<a href="#"><img class="img-responsive" src="images/tien.png" alt="trainer"></a>
						<div class="title">
							<h3><a href="#">Hà Việt Tiến</a></h3>
							<span>Front,Back-end Web</span>
						</div>
						<div class="desc text-center">
							<ul class="fh5co-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-github"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
			if(isset($_SESSION['username'])) echo '
			<div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
			<div id="fh5co-started" class="fh5co-bg" style="background-image: url(images/img_bg_3.jpg);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 text-center">
							<h2>San sang chua nao? <br> <span> Khoi dong <br> VA </h2>
						</div>
					</div>
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 text-center">
							<p><a href="stronglift.php" class="btn btn-default btn-lg">Nang ta nao</a></p>
						</div>
					</div>
				</div>
			</div>
			';
	 ?>

	<footer id="fh5co-footer" class="fh5co-bg" style="background-image: url(images/img_bg_1.jpg);" role="contentinfo">
		<div class="overlay"></div>
		<div class="container">
			<div class="row row-pb-md">
				<?php
					if(!isset($_SESSION['username'])) echo '
					<div class=" col-md-12 text-center fh5co-widget "> <!-- col-md-4 fh5co-widget -->
						<h3 class="pos_right">HEDSPI STRENGTH TRAINING</h3>
						<p><a class="btn btn-primary" href="login.php">Become A Member</a></p>
					</div>
					';
				 ?>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; All Rights Reserved.</small>
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">Nhóm 3</a></small>
					</p>
					<p>
						<ul class="fh5co-social-icons">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>


</body>
</html>
