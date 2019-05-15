<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");


$co = new DB;
$co->dataConn($conn);
$id = $_GET['id'];

$sql = "UPDATE item_amount SET s = '2' WHERE item_amount.id = $id;";
echo($sql);
$conn->query($sql);
echo("DONE");

?>