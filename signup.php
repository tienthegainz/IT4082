<?php
	include_once 'database/db_inc.php';
?>

<!doctype html>

<html>
<head>
	<!--<meta charset="utf-8">-->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HST &mdash; Sign up</title>
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

  <!--Form dang ki -->
  <style>
  .form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
  }
  .form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
  }
	.form select {
	font-family: "Roboto", sans-serif;
	outline: 0;
	background: #f2f2f2;
	width: 100%;
	border: 0;
	margin: 0 0 15px;
	padding: 15px;
	box-sizing: border-box;
	font-size: 14px;
	}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #F85A16;
  color: #fff;
  width: 100%;
  border: 2px solid #F85A16;
  padding: 15px;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #f96c2f !important;
  border-color: #f96c2f !important;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
</style>

<!-- them box warning -->
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="form"><form action="database/signup_func.php" method="post">
		<?php
			if(isset($_GET['name'])&&!empty($name=$_GET['name'])){
				//$name=$_GET['name'];
				echo 'Name:<input type="text" name="fullname" placeholder="Name" value="'.$name.'">';
			}
			else echo 'Name:<input type="text" name="fullname" placeholder="Name">';
		?>
		<!--Name:<input type="text" name="fullname" placeholder="Name">-->
		<br>
		<?php
			if(isset($_GET['user'])&&!empty($user=$_GET['user'])){
				//$user=$_GET['user'];
				echo 'Username:<input type="text" name="username" placeholder="At least 5 characters" value="'.$user.'" >';
			}
			else echo 'Username:<input type="text" name="username" placeholder="At least 5 characters">';
		?>
		<!--Username:<input type="text" name="username" placeholder="At least 5 characters">-->
		<br>
		Password:<input type="password" name="pass" placeholder="Password">
		<br>
		Re-enter Password:<input type="password" name="pass1" placeholder="Password">
		<br>
		<?php
			if(isset($_GET['age'])&&!empty($age=$_GET['age'])){
				//$age=$_GET['age'];
				echo 'Age:<input type="number" name="age" placeholder="Age" value="'.$age.'" >';
			}
			else echo 'Age:<input type="number" name="age" placeholder="Age">';
		?>
		<!--Age:<input type="number" name="age" placeholder="Age">-->
		<br>
		Gender:<br>
		<select name="gender">
				<option value="male">Male</option>
				<option value="female">Female</option>
		</select>
		<br>
		<?php
			if(isset($_GET['weight'])&&!empty($weight=$_GET['weight'])){
				//$weight=$_GET['weight'];
				echo 'Weight:<input type="number" name="weight" placeholder="In kg" value="'.$weight.'" >';
			}
			else echo 'Weight:<input type="number" name="weight" placeholder="In kg" >';
		?>
		<!--Weight:<input type="number" name="weight" placeholder="In kg">-->
		<br>
		<?php
			if(isset($_GET['height'])&&!empty($height=$_GET['height'])){
				//$height=$_GET['height'];
				echo 'Height:<input type="number" name="height" placeholder="In cm" value="'.$height.'" >';
			}
			else echo 'Height:<input type="number" name="height" placeholder="In cm" >';
		?>
		<!--Height:<input type="number" name="height" placeholder="In cm">-->
		<br>
		Coach:<br>
		<select name="coach">
		<?php
			$sql1="SELECT id,name FROM `t_trainers`;";
			$result1= mysqli_query($conn,$sql1);
			while($row = mysqli_fetch_assoc($result1)){
				echo'<option value="'.$row['id'].'">'.$row['name'].'</option>';
			}
		?>
		<!--<select name="coach">
				<option value="1">Rich Piana</option>
				<option value="2">Duy Nguyen</option>-->
		</select>
		<br>
		Program:<br>
		<select name="program">
			<?php
				$sql2="SELECT id_program,name FROM `t_programs`;";
				$result2= mysqli_query($conn,$sql2);
				while($row = mysqli_fetch_assoc($result2)){
					echo'<option value="'.$row['id_program'].'">'.$row['name'].'</option>';
				}
			?>
		</select>
		<br>
		<button type="submit" name="submit">Sign up</button>
		<br>
		<p><a href="login.php">Login</a></p>
	</form>
</div>
	<?php
		//take the URL
		//$fullUrl = "http://$_SEVER[HTTP_HOST]$_SEVER[REQUEST_URI]";
		if(!isset($_GET['signup'])){
			exit();
		}
		else{
			$signupCheck=$_GET['signup']; //take what after signup
			if($signupCheck == "empty"){
				echo'<div class="alert alert-warning">
				<strong>Warning!</strong> Input empty, try again</a>.
				</div>
				';
			}
			else if($signupCheck == "char"){
				echo'<div class="alert alert-warning">
				<strong>Warning!</strong> Name error, try again</a>.
				</div>
				';
			}
			else if($signupCheck == "user"){
				echo'<div class="alert alert-warning">
				<strong>Warning!</strong> User too short, try again</a>.
				</div>
				';
			}
			else if($signupCheck == "pass"){
				echo'<div class="alert alert-warning">
				<strong>Warning!</strong> Pass error, try again</a>.
				</div>
				';
			}
			else if($signupCheck == "success"){
				printf("Dang ki thanh cmn cong");
			}
		}
	?>
</body>
</html>
