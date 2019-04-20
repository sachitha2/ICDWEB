<?php
header('Access-Control-Allow-Origin: *'); 
session_start();
$_SESSION['user']['username']= 'sam'; 			
//echo("pw ok");
echo($_SESSION['user']['username']);
?>