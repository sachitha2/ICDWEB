<?php
header('Access-Control-Allow-Origin: *'); 
?>
<?php
$billId = $_GET['billId'];
$shopId = $_GET['shopId'];

include("db.php");
$sql = "SELECT * FROM sell WHERE total_id = $billId";
$result = $conn->query($sql);


$sqlGetShopName = "SELECT * FROM shop WHERE id = $shopId";
$resultGetShopName = $conn->query($sqlGetShopName);
$rowGetShopName = mysqli_fetch_assoc($resultGetShopName);
?>
<center><table id="table">
	<caption class="mainHeadDiv" style="font-size: 20px;">Shop Name - <?php  echo($rowGetShopName['name']) ?>
		<br>Invoice Number <?php echo($billId) ?>
	</caption>
	<tr>
		<th>Id</th>
		<th>Item</th>
		<th>Price</th>
		<th>Amount</th>
		<th>Total</th>
	</tr>
<?php

while($row = mysqli_fetch_assoc($result)){
	?>
	
	<tr>
		
		<td>
			
			<?php echo($row['id']) ?>
		</td>
		<td>
			<?php
			$sqlName = "SELECT * FROM item WHERE id = ".$row['item_id']." ";
			$resultName = $conn->query($sqlName);
			$rowName = mysqli_fetch_assoc($resultName);
			echo($rowName['name']);
			?>
		</td>
		<td>
			
			<?php echo($row['selling_price']) ?>
		</td>
		<td>
			<?php echo($row['amount']) ?>
		</td>
		<td><?php echo($row['amount']*$row['selling_price']) ?></td>
	</tr>
	<?php
}
?>
</table></center>
<?php $conn->close(); ?>