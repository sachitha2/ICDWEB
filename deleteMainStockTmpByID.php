<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");


$co = new DB;
$co->dataConn($conn);


$id = $_GET['id'];
echo($id);

?>