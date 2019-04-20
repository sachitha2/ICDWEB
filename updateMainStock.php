<?php
header('Access-Control-Allow-Origin: *'); 
?>
  


<?php
	include("db.php");
	$itemId = $_GET['itemId'];
	$sql = "SELECT * FROM  item WHERE  id  = $itemId AND  status  = 1";
	$result = $conn->query($sql);
	$numRow = mysqli_num_rows($result);
	if($numRow == 1){
			
			$item = mysqli_fetch_assoc($result);
			$itemTypeId = $item['itemTypeId']; 
			$sqlGetName = "SELECT * FROM item_type WHERE id = $itemTypeId";
			$resultGetNaem = $conn->query($sqlGetName);
			$rowGetName= mysqli_fetch_assoc($resultGetNaem);
			echo($rowGetName['name']);
			echo(" - ");
			echo($item['name']);
			?>	
			<br>
			<input type="number" placeholder="Enter Amount"  style="font-size: 20px;color: black;" id="amount" onKeyPress="enterUpdateMainStockItems(event)">
			<br>
			<br>
			<input type="number" placeholder="Buying price" style="font-size: 20px;color: black;" id="bPrice" >
			<br>
			Enetr expire date
			<input type="date"  style="font-size: 20px;color: black;" id="exDate" >
			<br>
			<br>
			<input type="button" value="ADD" style="font-size: 20px;color: black;" onClick="updateStock(amount.value,itemId.value,bPrice.value,exDate.value)">
		
		<?php
	}
else{
	echo("Item Not Availabel");
}
?>
<?php $conn->close(); ?>