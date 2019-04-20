<?php
include("db.php");
$itemTypeId = $_REQUEST['itemTypeId'];
//search vehicle
$sql = "SELECT * FROM item_type WHERE id = $itemTypeId";
$result = $conn->query($sql);
$row = mysqli_num_rows($result);

if($row ==1){
	echo($row);
	$sql = "DELETE FROM item_type WHERE item_type.id = $itemTypeId;";
	$result = $conn->query($sql);
}
else{
	echo("Item Type not found");
}
?>