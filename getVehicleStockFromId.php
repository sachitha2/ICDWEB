<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");
$co = new DB;
$co->dataConn($conn);
$basic = new basic;
?>
<?php

$vehicleId = $_GET['vehicleId'];
$sql = "SELECT * FROM t_stock WHERE vehicle_id = $vehicleId AND amount != 0 AND s = 0";
$result = $conn->query($sql);
$numRows = mysqli_num_rows($result);

if($numRows !=0){
?>
<center>
<button class="btn btn-primary btn-lg btn-block" onClick='ajaxCommonGetFromNet("<?php echo($url) ?>conformVehicleStock.php?vId=<?php echo($vehicleId) ?>", "vehicleStockTable")'>Conform Stock</button>
<table id="table" width="100%">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Amount</th>
		<th width="20px">SId</th>
		<th align="center"></th>
	</tr>
<?php
while($row = mysqli_fetch_assoc($result)){

	?>
	<tr>
		<td><?php 	echo($row['id']);?></td>
		<td>
			<?php
				$getId = $row['item_id'];
				$sqlGetIName = "SELECT * FROM item WHERE id = $getId";
				$resultGetName = $conn->query($sqlGetIName);
				$rowGetName = mysqli_fetch_assoc($resultGetName);
				//echo($rowGetName['name']);
				$co->getItemNameByStockId($getId);
	
			?>
		</td>
		<td><?php 	echo($row['amount']);?></td>
		<td><?php echo($row['amount_id'])?></td>
		<td style="text-align: center"><button class="btn btn-danger" onClick="removeItemsFromVehicleStock(<?php 	echo($row['id']);?>,<?php echo($vehicleId) ?>)">X</button></td>
	</tr>
	<?php
}
?>
</table>
</center>


<?php
}else{
	echo("No stock in vehicle");
}
?>
<?php $conn->close(); ?>