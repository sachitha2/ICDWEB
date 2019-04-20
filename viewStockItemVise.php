<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");


$co = new DB;
$co->dataConn($conn);
$basic = new basic;
$basic->modal();

$itemId = $_GET['itemId'];
?>




<h1>View stock item vise</h1>


<?php $conn->close(); ?>