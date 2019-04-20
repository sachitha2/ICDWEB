<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");

$co = new DB;
$co->dataConn($conn);



$shopId = 10;

echo($co->getCreditOfShopFromId(10));

?>
<?php $conn->close(); ?>