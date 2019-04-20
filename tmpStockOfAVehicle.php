<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
include("func/DB.class.php");
include("func/basic.class.php");

$co = new DB;
$co->dataConn($conn);



?>
<?php $conn->close(); ?>