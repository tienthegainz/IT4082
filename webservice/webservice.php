<?php

include_once 'db_connect.php'; 

$user = $_GET['username'];
$pass = $_GET['pass'];

if($result = $conn->query("SELECT * FROM t_users WHERE username = '$user' AND password = '$pass'"))
{
	$obj = $result->fetch_object();
	$data = json_encode($obj);
	echo $data;
}

?>
