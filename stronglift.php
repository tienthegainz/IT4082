<!doctype html>
<?php
include_once 'database/db_inc.php';
session_start();
 ?>
<html>
<head>
	<!--<meta charset="utf-8">-->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HST &mdash; STRONGLIFT</title>
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

	<div id="fh5co-schedule" class="fh5co-bg" style="background-image: url(images/stronglift.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>Stronglift schedule</h2>
				</div>
			</div>

			<div class="row animate-box">

				<div class="fh5co-tabs">
					<ul class="fh5co-tab-nav">
						<li class="active"><a href="#" data-tab="1"><span class="visible-xs">M</span><span class="hidden-xs">Day A</span></a></li>
						<li><a href="#" data-tab="2"><span class="visible-xs">T</span><span class="hidden-xs">Day B</span></a></li>
					</ul>-->

					<!-- Tabs -->
					<div class="fh5co-tab-content-wrap">
						<div class="fh5co-tab-content tab-content active" data-tab-content="1">
							<ul class="class-schedule">
								<li class="text-center">
									<span><img src="images/squat.svg" class="img-responsive" alt=""></span>
									<h4>Squat</h4>
								</li>
								<li class="text-center">
									<span><img src="images/ohp.svg" class="img-responsive" alt=""></span>
									<h4>Overhead Press</h4>
								</li>
								<li class="text-center">
									<span><img src="images/bent.svg" class="img-responsive" alt=""></span>
									<h4>Bent Over Rows</h4>
								</li>
							</ul>
						</div>

						<div class="fh5co-tab-content tab-content active" data-tab-content="2">
							<ul class="class-schedule">
								<li class="text-center">
									<span><img src="images/squat.svg" class="img-responsive" alt=""></span>
									<h4>Squat</h4>
								</li>
								<li class="text-center">
									<span><img src="images/bench.svg" class="img-responsive" alt=""></span>
									<h4>Bench Press</h4>
								</li>
								<li class="text-center">
									<span><img src="images/deadlift.svg" class="img-responsive" alt=""></span>
									<h4>Deadlift</h4>
								</li>
							</ul>
						</div>
						</div>
					</div>

				</div>
			</div>
		</div>


  <div id="fh5co-testimonial" class="fh5co-bg-section">
    <div class="container">
			<?php
			echo 'Xin chao, <h3><a  target="_blank">'.$_SESSION['name'].'</a><h3><br>';
		  //tim kiem bai tap lan truoc la gi
		  $sql = "SELECT * FROM `t_tracking` WHERE user_id='".$_SESSION['id']."' ORDER BY id DESC LIMIT 6";
		  $result = $conn->query($sql);

			//thuc hien viec luu muc ta de hien thi ra ngoai, cong thuc theo file stronglift
			if($result->num_rows <= 0){ //khoi tao muc ta ban dau
				$_SESSION['check']=5;
				$_SESSION['w1']=$_SESSION['weight']*0.6;
				$_SESSION['s1']=5;
				$_SESSION['w2']=$_SESSION['weight']*0.2;
				$_SESSION['s2']=5;
				$_SESSION['w3']=$_SESSION['weight']*0.7;
				$_SESSION['s3']=5;
			}
			else if($result->num_rows == 3){ //khoi tao muc ta ban dau
				$_SESSION['check']=3;
				$_SESSION['w1']=$_SESSION['weight']*0.6;
				$_SESSION['s1']=5;
				$_SESSION['w2']=$_SESSION['weight']*0.4;
				$_SESSION['s2']=5;
				$_SESSION['w3']=$_SESSION['weight']*0.7;
				$_SESSION['s3']=5;
			}
			else if ($result->num_rows ==6 ){
				$row = $result->fetch_assoc();
				$_SESSION['check']=$row['exercise'];
				$row = $result->fetch_assoc();
				$row = $result->fetch_assoc();
				//luu muc b3
				$row = $result->fetch_assoc();
				if($row['nosets']=5) {
					$_SESSION['w3']=$row['weight']+2;
					$_SESSION['s3']=5;
				}
				else if($row['nosets']=1) {
					$_SESSION['w3']=$row['weight'];
					$_SESSION['s3']=1;
				}
				else if($row['nosets']=0) {
					$_SESSION['w3']=$row['weight']-2;
					$_SESSION['s3']=5;
				}

				//luu muc b2
				$row = $result->fetch_assoc();
				if($row['nosets']=5) {
					$_SESSION['w2']=$row['weight']+2;
					$_SESSION['s2']=5;
				}
				else if($row['nosets']=1) {
					$_SESSION['w2']=$row['weight'];
					$_SESSION['s2']=1;
				}
				else if($row['nosets']=0) {
					$_SESSION['w2']=$row['weight']-2;
					$_SESSION['s2']=5;
				}
				//luu muc b3
				$row = $result->fetch_assoc();
				if($row['nosets']=5) {
					$_SESSION['w1']=$row['weight']+2;
					$_SESSION['s1']=5;
				}
				else if($row['nosets']=1) {
					$_SESSION['w1']=$row['weight'];
					$_SESSION['s1']=1;
				}
				else if($row['nosets']=0) {
					$_SESSION['w1']=$row['weight']-2;
					$_SESSION['s1']=5;
				}
		}
		  //in ra bang luyen tap hom nay
		  if($_SESSION['check']==3)
		  echo '
		    <form action="database/stronglift_func.php" method="get">
		      <a  target="_blank">Squat 5x5</a> '.$_SESSION['w1'].':<br>
		      <select name="squat1">
		        <option value= 1 >1</option>
		        <option value= 2 >2</option>
		        <option value= 3 >3</option>
		        <option value= 4 >4</option>
		        <option value= 5 >5</option>
		      </select>
		      <select name="squat2">
		      <option value= 1 >1</option>
		      <option value= 2 >2</option>
		      <option value= 3 >3</option>
		      <option value= 4 >4</option>
		      <option value= 5 >5</option>
		      </select>
		      <select name="squat3">
		      <option value= 1 >1</option>
		      <option value= 2 >2</option>
		      <option value= 3 >3</option>
		      <option value= 4 >4</option>
		      <option value= 5 >5</option>
		      </select>
		      <select name="squat4">
		      <option value= 1 >1</option>
		      <option value= 2 >2</option>
		      <option value= 3 >3</option>
		      <option value= 4 >4</option>
		      <option value= 5 >5</option>
		      </select>
		      <select name="squat5">
		      <option value= 1 >1</option>
		      <option value= 2 >2</option>
		      <option value= 3 >3</option>
		      <option value= 4 >4</option>
		      <option value= 5 >5</option>
		      </select>
		      <br> <br>
		      <a  target="_blank">Bench Press</a> 5x5 '.$_SESSION['w2'].':<br>
		      <select name="bp1">
		      <option value= 1 >1</option>
		      <option value= 2 >2</option>
		      <option value= 3 >3</option>
		      <option value= 4 >4</option>
		      <option value= 5 >5</option>
		      </select>
		      <select name="bp2">
		      <option value= 1 >1</option>
		      <option value= 2 >2</option>
		      <option value= 3 >3</option>
		      <option value= 4 >4</option>
		      <option value= 5 >5</option>
		      </select>
		      <select name="bp3">
		      <option value= 1 >1</option>
		      <option value= 2 >2</option>
		      <option value= 3 >3</option>
		      <option value= 4 >4</option>
		      <option value= 5 >5</option>
		      </select>
		      <select name="bp4">
					<option value= 1 >1</option>
					<option value= 2 >2</option>
					<option value= 3 >3</option>
					<option value= 4 >4</option>
					<option value= 5 >5</option>
		      </select>
		      <select name="bp5">
					<option value= 1 >1</option>
		      <option value= 2 >2</option>
		      <option value= 3 >3</option>
		      <option value= 4 >4</option>
		      <option value= 5 >5</option>
		      </select>
		      <br> <br>
		      <a  target="_blank">Deadlift</a> 5x5 '.$_SESSION['w3'].':<br>
		      <select name="dl1">
					<option value= 1 >1</option>
		      <option value= 2 >2</option>
		      <option value= 3 >3</option>
		      <option value= 4 >4</option>
		      <option value= 5 >5</option>
		      </select>
		      <select name="dl2">
					<option value= 1 >1</option>
					<option value= 2 >2</option>
					<option value= 3 >3</option>
					<option value= 4 >4</option>
					<option value= 5 >5</option>
		      </select>
		      <select name="dl3">
					<option value= 1 >1</option>
		      <option value= 2 >2</option>
		      <option value= 3 >3</option>
		      <option value= 4 >4</option>
		      <option value= 5 >5</option>
		      </select>
		      <select name="dl4">
					<option value= 1 >1</option>
		      <option value= 2 >2</option>
		      <option value= 3 >3</option>
		      <option value= 4 >4</option>
		      <option value= 5 >5</option>
		      </select>
		      <select name="dl5">
					<option value= 1 >1</option>
		      <option value= 2 >2</option>
		      <option value= 3 >3</option>
		      <option value= 4 >4</option>
		      <option value= 5 >5</option>
		      </select>
		      <br><br>
		      <button type="submit" name="submit">Luu thanh tich</button>
		      </form>
		      ';
		    else{
		      echo '
		        <form action="database/stronglift_func.php" method="get">
		          <a  target="_blank">Squat</a> 5x5 '.$_SESSION['w1'].':<br>
		          <select name="squat1">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <select name="squat2">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <select name="squat3">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <select name="squat4">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <select name="squat5">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <br> <br>
		          <a  target="_blank">Overhead</a> 5x5 '.$_SESSION['w2'].':<br>
		          <select name="ohp1">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <select name="ohp2">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <select name="ohp3">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <select name="ohp4">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <select name="ohp5">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <br> <br>
		          <a  target="_blank">Barbell Row</a> 5x5 '.$_SESSION['w3'].':<br>
		          <select name="up1">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <select name="up2">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <select name="up3">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <select name="up4">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <select name="up5">
							<option value= 1 >1</option>
				      <option value= 2 >2</option>
				      <option value= 3 >3</option>
				      <option value= 4 >4</option>
				      <option value= 5 >5</option>
		          </select>
		          <br> <br>
		          <button type="submit" name="submit" >Luu thanh tich</button>
		          </form>
		          ';
		    }
			?>
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
