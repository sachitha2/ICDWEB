<?php
header('Access-Control-Allow-Origin: *'); 
?>



<?php
include("db.php");
$itemId = $_GET['itemId'];
$shopId = $_GET['shopId'];
$billNumber = $_GET['billNumber'];
echo($billNumber);
$sqlItem = "SELECT * FROM item WHERE id = $itemId ";
$resultItem = $conn->query($sqlItem);
$numRowsItem = mysqli_num_rows($resultItem);
if($numRowsItem == 1){
	//echo("item found");
	$sqlTotalOfItems = "SELECT SUM(amount) FROM item_amount WHERE item_id = $itemId AND amount != 0 ";
	$resultTotalOfItems = $conn->query($sqlTotalOfItems);
	$rowTotalOfItems = mysqli_fetch_assoc($resultTotalOfItems);
	
	$sqlGetName = "SELECT name,itemTypeId FROM item WHERE id = $itemId ";
	$resultGetName = $conn->query($sqlGetName);
	$rowGetName = mysqli_fetch_assoc($resultGetName);
	$itemTypeId = $rowGetName['itemTypeId'];
	$sql = "SELECT name FROM item_type WHERE id = $itemTypeId;";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	echo("<h2>".$row['name']."-".$rowGetName['name']."</h1>");
	
	
	
	echo("<h1>Number of items ");
	
	
	if($rowTotalOfItems['SUM(amount)'] == NULL){
		echo(0);
	}else{
	echo($rowTotalOfItems['SUM(amount)']);
	?>
	
	<br>
	<h1>Select Price
	<select style="color: black" id="itemPriceRangeId">		
		<?php
			$sql = "SELECT * FROM item_price_range WHERE item_id = 1";
			$result = $conn->query($sql);
			while($row = mysqli_fetch_assoc($result)){
				echo("<option>".$row['price']."</option>");
			}
		
		?>
	</select>
	<br>
	<br>
	<input type="number" placeholder="Enter Amount" style="color: black" id="amount" onKeyDown="enterAddBill(event,amount.value,itemId.value,<?php echo($shopId) ?>,<?php echo($billNumber) ?>,itemPriceRangeId.value)">
	<?php
	}
}
else{
	echo("item not found");
}
?>
<?php $conn->close(); ?>