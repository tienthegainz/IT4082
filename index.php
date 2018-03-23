<!doctype html>

<html>
<head>
<title>HEDSPI STRENGTH TRAINING</title>
</head>
<body>
	<?php
	session_start();
		if(!isset($_SESSION['username']))
			echo '
			<p><a href="signup.php">Dang ki</a></p>
			<br>
			<p> <a href="login.php">Dang nhap</a></p>
			<br>
			';
		else{
			echo 'Xin chao '.$_SESSION['name'].'<br>';
			echo 'So calories hang ngay la:';
			if($_SESSION['gender']=="male"){
				printf("%f\n",13.397*$_SESSION['weight']+4.799*$_SESSION['height']-5.677*$_SESSION['age']+88.362);
				// [ (13.397 x Trọng lượng kg) + (4.799 x Chiều cao cm) - (5.677 x Tuổi năm) + 88.362 ]
			}
			else if($_SESSION['gender']=="female"){
				printf("%f\n",9.247*$_SESSION['weight']+3.098*$_SESSION['height']-4.33*$_SESSION['age']+447.593);
				//[ (9.247 x Trọng lượng kg) + (3.098 x Chiều cao cm) - (4.330 x Tuổi năm) + 447.593 ]
			}
			echo '<br><a href="logout.php">Log out</a>';
		}
	?>
</body>
</html>
