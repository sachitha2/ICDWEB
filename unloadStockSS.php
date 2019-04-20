<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
include("func/DB.class.php");
include("func/basic.class.php");
//This is the whole stock unloadind 
///note temp only

$sql = "SELECT * FROM tmpStock WHERE s = 1 ";
$result = $conn->query($sql);
while($row = mysqli_fetch_assoc($result)){
	$soledAmount = $row['qty'];
	$tmpId = $row['id'];
	$sqlT = "UPDATE tmpStock SET s = '0' WHERE tmpStock.id = $tmpId;";
	$resultT = $conn->query($sqlT);

	$sId = $row['stockId'];
	$sql2 = "UPDATE t_stock SET remainStock = (remainStock - $soledAmount)  WHERE t_stock.id = $sId;";
	$result2 = $conn->query($sql2);
}
///note temp only
?>
<?php $conn->close(); ?>