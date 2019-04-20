<?php
	$uName = $_GET['uName'];
	
	session_start();
	$_SESSION['user']['username'] = $uName;
	echo($_SESSION['user']['username']);
?>