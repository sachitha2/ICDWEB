<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
include("func/DB.class.php");
include("func/basic.class.php");

$tmpId = $_GET['id'];
$sId = $_GET['sId'];
$soledAmount = $_GET['soledAmount'];
$sql = "UPDATE tmpStock SET s = '0' WHERE tmpStock.id = $tmpId;";
$result = $conn->query($sql);


$sql2 = "UPDATE t_stock SET remainStock = (remainStock - $soledAmount )  WHERE t_stock.id = $sId;";
$result2 = $conn->query($sql2);
echo("1");
?>
<?php $conn->close(); ?>