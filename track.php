<!DOCTYPE html>
<html>
	<head>
		<!--<meta charset="utf-8">-->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>HST &mdash; TRACKING</title>
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

		<!-- BIeu do -->
		<meta name="description" content="chart created using amCharts live editor" />

		<!-- amCharts javascript sources -->
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>

		<!-- amCharts javascript code -->
		<script type="text/javascript">
			AmCharts.makeChart("chartdiv",
				{
					"type": "serial",
					"categoryField": "date",
					"dataDateFormat": "YYYY-MM-DD",
					"categoryAxis": {
						"parseDates": true
					},
					"chartCursor": {
						"enabled": true
					},
					"chartScrollbar": {
						"enabled": true
					},
					"trendLines": [],
					"graphs": [
						{
							"bullet": "round",
							"id": "AmGraph-1",
							"title": "Squat",
							"valueField": "sq"
						},
						{
							"bullet": "round",
							"id": "AmGraph-2",
							"title": "OHP",
							"valueField": "ohp"
						},
						{
							"bullet": "round",
							"id": "AmGraph-3",
							"title": "Deadlift",
							"valueField": "dl"
						},
						{
							"bullet": "round",
							"id": "AmGraph-4",
							"title": "Bench Press",
							"valueField": "bp"
						},
						{
							"bullet": "round",
							"id": "AmGraph-5",
							"title": "Barbell Row",
							"valueField": "row"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "Weight in KG"
						}
					],
					"allLabels": [],
					"balloon": {},
					"legend": {
						"enabled": true,
						"useGraphSettings": true
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "Training Track"
						}
					],
          "dataProvider": [
						<?php
					include_once 'database/db_inc.php';
					$old_date = NULL;
					session_start();
					$sql = "SELECT * FROM (
			    SELECT * FROM t_tracking WHERE user_id='".$_SESSION['id']."' ORDER BY id DESC LIMIT 18
					) as foo ORDER BY foo.id ASC;";
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()){
						//echo $row['date'].'<br>';
						if($row['date'] != $old_date && $old_date == NULL){
							echo'{ "date":"'.$row['date'].'",';
							$old_date=$row['date'];
						}
						else if($row['date'] != $old_date && $old_date != NULL){
							echo'},';
							echo'{ "date": "'.$row['date'].'",';
							$old_date=$row['date'];
						}
						if($row['exercise']==1) echo ' "sq": ';
						elseif($row['exercise']==2) echo ' "ohp": ';
						elseif($row['exercise']==3) echo ' "row": ';
						elseif($row['exercise']==4) echo ' "bp": ';
						elseif($row['exercise']==5) echo ' "dl": ';
						echo $row['weight'].',';
					}
					echo'},';
					?>
					]
				}
			);
		</script>
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
								<li class="active has-dropdown">
									<a >User</a>
												<ul class="dropdown">
													<li><a href="userinfo.php">Change info</a></li>
													<li><a href="stronglift.php">Training</a></li>
													<li><a class="active" href="track.php">Tracking chart</a></li>
													<li><a href="logout.php">Logout</a></li>
												</ul>
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
								<h2>Một dự án nhỏ của <a href="http://freehtml5.co/" target="_blank">Nhóm 3</a></h2>
								<p><a href="https://www.youtube.com/watch?v=XCWfg_S4Bmc" class="btn btn-primary popup-vimeo">See our story</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div id="chartdiv" style="width: 100%; height: 600px; background-color: #FFFFFF;" ></div>

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
						<p><a href="#" class="btn btn-default btn-lg">Nang ta nao</a></p>
					</div>
				</div>
			</div>
		</div>


		<footer id="fh5co-footer" class="fh5co-bg" style="background-image: url(images/img_bg_1.jpg);" role="contentinfo">
			<div class="overlay"></div>
			<div class="container">
				<div class="row row-pb-md">


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
