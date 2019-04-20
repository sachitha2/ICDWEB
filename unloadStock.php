<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
include("url.php");
include("func/DB.class.php");
include("func/basic.class.php");
$co = new DB;
$co->dataConn($conn);
$basic = new basic;
$basic->modal();
$vehicleId = $_GET['$vehicleId'];
?>
<hr width="100%">
<img src="back.png" width="90" height="90" onClick="ajaxCommonGetFromNet('<?php echo($url) ?>selectVehicleForTmpStock.php', 'mainStage')" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">Unload TMP Stock   <?php  echo($vehicleId) //echo(date("M-d")) ?></div>
<hr width="100%"><center>
	
	<h1>Menu bar</h1>
	<?php
		if($co->getNumRow("SELECT * FROM tmpStock WHERE s = 1 AND invoiceN LIKE '%$vehicleId-%' ORDER BY stockId ASC") != 0){	
	?>
	<table border="1" width="80%" id="table">
	<tr>
		<th>Stock Id</th>
		<th>Item</th>
		<th>Loaded Amount</th>
		<th>Soled Amount</th>
		<th>UNLOAD</th>
	</tr>
	<?php 
	$sql = "SELECT * FROM tmpStock WHERE s = 1 AND invoiceN LIKE '%$vehicleId-%' ";
	$result = $conn->query($sql);
	while($row =mysqli_fetch_assoc($result)){
	?>
	<tr>
		<td><?php echo($row['stockId']) ?></td>
		<td><?php
			
			$sqlGetItemId = "SELECT * FROM `t_stock` WHERE `id` = ".$row['stockId'].";";
			$resultGetItemId = $conn->query($sqlGetItemId);
			$rowGetItemId = mysqli_fetch_assoc($resultGetItemId);
			//echo($rowGetItemId['item_id']);
			$id = $rowGetItemId['item_id'];
			$co->getItemNameByStockId($id);
			
			?></td>
		<td><?php echo($row['loadedStock']) ?></td>
		<td><?php echo($row['qty']) ?></td>
		<td><button class="btn btn-primary btn-lg" onClick="unloadStockOneByOneSS(<?php echo($row['stockId']) ?>,<?php echo($row['qty'])?>,<?php echo($row[id]) ?>)"> UNLOAD </button></td>
	</tr>
		
			<?php	
	
	
	}	?>
	</table>
	<button class="btn btn-primary btn-lg btn-block"  onClick="unloadStockSS()" style="color: black">Unload All</button>
	<h1>Note - Find old s = 1 data and display a error msg</h1>
	<?php
	}else{
			$basic->noDtaF();
		} ?>
	<br>
	
</center>
<?php $conn->close(); ?>
