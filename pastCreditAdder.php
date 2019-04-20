<?php
	$shopId = $_GET['shopId'];
	$amount = $_GET['amount'];
	echo($amount);
	echo($shopId);
	header('Access-Control-Allow-Origin: *'); 
	$id = $_GET['id'];
	include("db.php");
	$conn->query("UPDATE shop SET credit = credit + $amount WHERE shop.id = $shopId;");
	
?>