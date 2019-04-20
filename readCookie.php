<?php
session_start();
if((isset($_SESSION['user']['username']))) {
	echo($_SESSION['user']['username']);
}
else{
	echo("0");
}
?>