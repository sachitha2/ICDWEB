<?php
session_id($_COOKIE['PHPSESSID']); 
session_start();
$_SESSION['user']['username'] ="sam";
?>