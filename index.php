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


	<!-- amCharts javascript code -->
	<script type="text/javascript">
		AmCharts.makeChart("chartdiv",
			{
				"type": "pie",
				"balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
				"titleField": "category",
				"valueField": "column-1",
				"allLabels": [],
				"balloon": {},
				"legend": {
					"enabled": true,
					"align": "center",
					"markerType": "circle"
				},
				"titles": [],
				"dataProvider": [
					<?php
					session_start();
					if($_SESSION['gender']=="male"){
						$_SESSION['carb']=13.397*$_SESSION['weight']+4.799*$_SESSION['height']-5.677*$_SESSION['age']+88.362;
						// [ (13.397 x Trọng lượng kg) + (4.799 x Chiều cao cm) - (5.677 x Tuổi năm) + 88.362 ]
					}
					else if($_SESSION['gender']=="female"){
						$_SESSION['carb']=9.;247*$_SESSION['weight']+3.098*$_SESSION['height']-4.33*$_SESSION['age']+447.593;
						//[ (9.247 x Trọng lượng kg) + (3.098 x Chiều cao cm) - (4.330 x Tuổi năm) + 447.593 ]
					}
					echo '
					{
						"category": "Protein",
						"column-1": "'.$_SESSION['carb']*0.3.'"
					},
					{
						"category": "Carb",
						"column-1": "'.$_SESSION['carb']*0.5.'"
					},
					{
						"category": "Protein",
						"column-1": "'.$_SESSION['carb']*0.2.'"
					}
					';
			?>

					/*{
						"category": "Protein",
						"column-1": "3"
					},
					{
						"category": "Carb",
						"column-1": "5"
					},
					{
						"category": "Fat",
						"column-1": "2"
					}*/
				]
			}
		);
	</script>
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
							<li class="active"><a href="index.php">Homepage</a></li>
							<li class="has-dropdown">
								<a >User</a>
								<?php
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
							<li><a href="about_us.php">About us</a></li>
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

	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span><img class="img-responsive" src="images/ohp.svg" alt=""></span>
						<h3>Strong lift</h3>
						<p>We lift strongly <br></p>
						<p><a href="#" class="btn btn-primary btn-outline btn-sm">More <i class="icon-arrow-right"></i></a></p>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span><img class="img-responsive" src="images/squat.svg" alt=""></span>
						<h3>Push pull Leg</h3>
						<p>We push pull and never skip leg days <br></p>
						<p><a href="#" class="btn btn-primary btn-outline btn-sm">More <i class="icon-arrow-right"></i></a></p>
					</div>
				</div>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span><img class="img-responsive" src="images/bench.svg" alt=""></span>
						<h3>Bro Lift</h3>
						<p>Only chest day bruh</p>
						<p><a href="#" class="btn btn-primary btn-outline btn-sm">More <i class="icon-arrow-right"></i></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-testimonial" class="fh5co-bg-section">
		<div class="container">
			<?php
				if(!isset($_SESSION['username']))
					echo '
					<p>Xin chao nguoi la. Ban dang tim kiem ....</p>
					<br>
					';
				else{
					echo 'Xin chao, <h3><a  target="_blank">'.$_SESSION['name'].'</a><h3><br>';
					echo 'So <a  target="_blank">calories </a> hang ngay la: '.$_SESSION['carb'];
				}
			?>
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
					<div class=" col-md-8 col-md-offset-2 text-center "> <!-- col-md-12 col-sm-12 text-center  fh5co-widget -->
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
