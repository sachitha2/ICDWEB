<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
include("url.php");
include("func/basic.class.php");
include("func/DB.class.php");
$db = new DB;
$db->dataConn($conn);
?>
<?php

$itemId = $_GET['itemId'];
$vehicleId = $_GET['vehicleId'];
$sql = "SELECT * FROM item WHERE id = $itemId";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$sqlTotal = "SELECT SUM(amount) FROM item_amount WHERE item_id = $itemId AND s ='1'";
$resultTotal = $conn->query($sqlTotal);
$rowTotal = mysqli_fetch_assoc($resultTotal);
$total = $rowTotal['SUM(amount)'];
$numRows = mysqli_num_rows($result);
if($numRows == 1){
	if($total != 0){
		
	echo("<h1>");
	$db->getItemNameByStockId($itemId);
	echo("</h1>");
	echo("<h1>Available amount ".$total."</h1>");
	echo("<br>");
	?>
	
	<input type="number" placeholder="Enter Item Amount" onKeyPress="enterLoadStock(event,amount.value,itemId.value,<?php echo($vehicleId) ?>)" id="amount" style="font-size: 20px;color: black;">
	<br>
	<br>
	<input type="button" class=" button button1" value="Load" onClick="loadingGoodsToVehicles(amount.value,itemId.value,<?php echo($vehicleId)?>)">
	<?php
}
else{
	echo("Available Amount is 0");
}
}else{
	echo("Item Not Found");
}
?>
<?php $conn->close(); ?>