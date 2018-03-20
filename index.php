<?php
	include_once 'database/db_inc.php';
?>

<!doctype html>

<html>
<head>
<title>Caculator</title>
</head>
<body>
	<form action="database/signup.php" method="post">
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
		Gender:
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
		Coach:
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
		Program:
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
	</form>
	<?php
		//take the URL
		//$fullUrl = "http://$_SEVER[HTTP_HOST]$_SEVER[REQUEST_URI]";
		if(!isset($_GET['signup'])){
			exit();
		}
		else{
			$signupCheck=$_GET['signup']; //take what after signup
			if($signupCheck == "empty"){
				printf("Hay dien het thong tin");
			}
			else if($signupCheck == "char"){
				printf("Ten khong hop le");
			}
			else if($signupCheck == "user"){
				printf("Ten user qua ngan");
			}
			else if($signupCheck == "pass"){
				printf("Kiem tra lai mat khau");
			}
			else if($signupCheck == "success"){
				printf("Dang ki thanh cmn cong");
			}
		}

	?>
</body>
</html>
