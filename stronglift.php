<!doctype html>

<html>
<head>
<title>STRONGLIFT</title>
</head>
<body>
	<?php
  include_once 'database/db_inc.php';
	session_start();
	echo 'Xin chao '.$_SESSION['name'].'<br>';
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
      Squat 5x5 '.$_SESSION['w1'].':<br>
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
      <br>
      Bench Press 5x5 '.$_SESSION['w2'].':<br>
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
      <br>
      Deadlift 5x5 '.$_SESSION['w3'].':<br>
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
      <br>
      <button type="submit" name="submit">Luu thanh tich</button>
      </form>
      ';
    else{
      echo '
        <form action="database/stronglift_func.php" method="get">
          Squat 5x5 '.$_SESSION['w1'].':<br>
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
          <br>
          Overhead 5x5 '.$_SESSION['w2'].':<br>
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
          <br>
          Barbell Row 5x5 '.$_SESSION['w3'].':<br>
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
          <br>
          <button type="submit" name="submit">Luu thanh tich</button>
          </form>
          ';
    }
	?>
</body>
</html>
