<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
if(isset($_REQUEST['id'])){
	
	$id = $_REQUEST['id'];
	$sql = "DELETE FROM item_price_range WHERE item_price_range.id = $id";
	echo($sql);
	$result = $conn->query($sql);
}

?>
<?php $conn->close(); ?>