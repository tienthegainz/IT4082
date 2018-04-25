<?php

include_once 'connection.php'; 

$user = $_GET['username'];

if($result = $conn->query("SELECT * FROM t_users WHERE username = '$user'"))
{
	$obj = $result->fetch_object();
	$data = json_encode($obj);
	echo $data;
}

?>