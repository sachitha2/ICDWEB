<?php
	$shopId = $_GET['shopId'];
	$amount = $_GET['amount'];

	header('Access-Control-Allow-Origin: *'); 
	$id = $_GET['id'];
	include("db.php");
	$sql = $conn->query("UPDATE shop SET credit = credit + $amount WHERE shop.id = $shopId;");
	echo($shopId." ".$amount);
?>