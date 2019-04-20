<?php

header('Access-Control-Allow-Origin: *'); 
include("db.php");
$id = $_GET['id'];
$sql = "SELECT * FROM item WHERE id = $id LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<div align="left" style="color: black">
	<img src="icons/backBlack.png" width="90" height="90" onclick="showItemsPageLoader()" class="floateLeft" style="cursor: pointer">
	<br>
	<br>
	<br>
	<br>
	<h1 style="color: black">Item Name</h1>
	<input type="text" value="<?php echo($row['name']) ?>" id="itemNameEdit"><input type="button" value="Save" onClick="saveItemName(itemNameEdit.value,<?php echo($id) ?>)"><div id="itemNameMsg" class=""></div>
	<h1 style="color: black">Date</h1>
	<input type="date" value="<?php echo($row['sDate']); ?>" id="date"><input type="button" value="Save"onClick="editCommon('dateErro','<?php echo($id) ?>',date.value,'item','sDate')"><div id="dateErro" class=""></div>
	
	<h1 style="color: black">Price Range</h1>
	<input type="number" id="priceValue">
	<input type="button" value="Add" onClick="addItemRange('priceRangeError',<?php echo($id)?>,priceValue.value)">
	<div id="priceRangeError"></div>
	<br>
	
	
	<?php
	$sql = "SELECT * FROM `item_price_range` WHERE item_id = $id";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()){
		?>
		<strong  style="background-color:red;color:white;margin:10px;padding-top:5px;padding-bottom:5px;padding-left:15px;padding-right:15px;border-radius:30px;pointer:cursor" onClick="cDel('<?php echo($row['id']) ?>','priceRangeError','<?php echo($id) ?>')"><?php echo($row['price']) ?> X </strong>
		
		<?php
	}
	?>
	
</div>
<?php $conn->close(); ?>

