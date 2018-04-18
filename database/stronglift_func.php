<?php
  include_once 'db_inc.php';
  session_start();
  if($_SESSION['check']==3){
  //post all info into param
    $squat1 = $_GET['squat1'];
    $squat2 = $_GET['squat2'];
    $squat3 = $_GET['squat3'];
    $squat4 = $_GET['squat4'];
    $squat5 = $_GET['squat5'];
  /*$ohp1 = $_GET['ohp1'];
  $ohp2 = $_GET['ohp2'];
  $ohp3 = $_GET['ohp3'];
  $ohp4 = $_GET['ohp4'];
  $ohp5 = $_GET['ohp5'];
  $up1 = $_GET['up1'];
  $up2 = $_GET['up2'];
  $up3 = $_GET['up3'];
  $up4 = $_GET['up4'];
  $up5 = $_GET['up5'];*/
    $bp1 = $_GET['bp1'];
    $bp2 = $_GET['bp2'];
    $bp3 = $_GET['bp3'];
    $bp4 = $_GET['bp4'];
    $bp5 = $_GET['bp5'];
    $dl1 = $_GET['dl1'];
    $dl2 = $_GET['dl2'];
    $dl3 = $_GET['dl3'];
    $dl4 = $_GET['dl4'];
    $dl5 = $_GET['dl5'];
  //error handling
      if($squat1<5||$squat2<5||$squat3<5||$squat4<5||$squat5<5){
        if($_SESSION['s1']==5) $squat_set=1;
        else if($_SESSION['s1']==1) $squat_set=0;
      }
      else $squat_set=5;

      if($bp1<5||$bp2<5||$bp3<5||$bp4<5||$bp5<5){
        if( $_SESSION['s2'] ==5) $bp_set=1;
        else if($_SESSION['s2']==1) $bp_set=0;
      }
      else $bp_set=5;

      if($dl1<5||$dl2<5||$dl3<5||$dl4<5||$dl5<5){
        if($_SESSION['s3']==5) $dl_set=1;
        else if($_SESSION['s3']==1) $dl_set=0;
      }
      else $dl_set=5;
      $sql= "INSERT INTO t_tracking (date, nosets, noreps, weight, exercise, user_id)
      VALUES (?,?,?,?,?,?);";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL error";
        header("Location: ../stronglift.php?record=failed");
      }
      else{
        $today=date("Y/m/d");
        $rep=5;
        $ex=1;
        mysqli_stmt_bind_param($stmt,"siiiii",$today,$squat_set,$rep,$_SESSION['w1'],$ex,$_SESSION['id']);
        mysqli_stmt_execute($stmt);
        $ex=4;
        mysqli_stmt_bind_param($stmt,"siiiii",$today,$bp_set,$rep,$_SESSION['w2'],$ex,$_SESSION['id']);
        mysqli_stmt_execute($stmt);
        $ex=5;
        mysqli_stmt_bind_param($stmt,"siiiii",$today,$dl_set,$rep,$_SESSION['w3'],$ex,$_SESSION['id']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../index.php?record=success");
    }
  }
  else {
    $squat1 = $_GET['squat1'];
    $squat2 = $_GET['squat2'];
    $squat3 = $_GET['squat3'];
    $squat4 = $_GET['squat4'];
    $squat5 = $_GET['squat5'];
    $ohp1 = $_GET['ohp1'];
    $ohp2 = $_GET['ohp2'];
    $ohp3 = $_GET['ohp3'];
    $ohp4 = $_GET['ohp4'];
    $ohp5 = $_GET['ohp5'];
    $up1 = $_GET['up1'];
    $up2 = $_GET['up2'];
    $up3 = $_GET['up3'];
    $up4 = $_GET['up4'];
    $up5 = $_GET['up5'];
    if($squat1<5||$squat2<5||$squat3<5||$squat4<5||$squat5<5){
      if($_SESSION['s1']==5) $squat_set=1;
      else if($_SESSION['s1']==1) $squat_set=0;
    }
    else $squat_set=5;

    if($ohp1<5||$ohp2<5||$ohp3<5||$ohp4<5||$ohp5<5){
      if( $_SESSION['s2'] ==5) $ohp_set=1;
      else if($_SESSION['s2']==1) $ohp_set=0;
    }
    else $ohp_set=5;

    if($up1<5||$up2<5||$up3<5||$up4<5||$up5<5){
      if($_SESSION['s3']==5) $up_set=1;
      else if($_SESSION['s3']==1) $up_set=0;
    }
    else $up_set=5;
    $sql= "INSERT INTO t_tracking (date, nosets, noreps, weight, exercise, user_id)
    VALUES (?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      echo "SQL error";
      header("Location: ../stronglift.php?record=failed");
    }
    else{
      $today=date("Y/m/d");
      $rep=5;
      $ex=1;
      mysqli_stmt_bind_param($stmt,"siiiii",$today,$squat_set,$rep,$_SESSION['w1'],$ex,$_SESSION['id']);
      mysqli_stmt_execute($stmt);
      $ex=2;
      mysqli_stmt_bind_param($stmt,"siiiii",$today,$ohp_set,$rep,$_SESSION['w2'],$ex,$_SESSION['id']);
      mysqli_stmt_execute($stmt);
      $ex=3;
      mysqli_stmt_bind_param($stmt,"siiiii",$today,$up_set,$rep,$_SESSION['w3'],$ex,$_SESSION['id']);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      header("Location: ../index.php?record=success");
    }
  }
  unset($_SESSION['s1']);
  unset($_SESSION['w1']);
  unset($_SESSION['s2']);
  unset($_SESSION['w2']);
  unset($_SESSION['s3']);
  unset($_SESSION['w3']);
  unset($_SESSION['check']);
