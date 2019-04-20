<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");
$vehicleId = $_GET['vehicleId'];
$shopId = $_GET['shopId'];
$co = new DB;
$co->dataConn($conn);
$lin = "ajaxCommonGetFromNet('".$url."tmpInvoices.php?vehicleId=".$vehicleId."', 'mainStage');";


$basic = new basic;
$basic->menuBar("view invoice - ".$vehicleId."Shop Id - ".$shopId,$lin);
$invoiceN = $_GET['invoiceN'];
$basic->modal();
$sqlIN = "SELECT * FROM tmpInvoices WHERE id = $invoiceN";
$resultIN = $conn->query($sqlIN);
$rowIN = mysqli_fetch_assoc($resultIN);
$invoiceN = $rowIN['invoiceN'];

/*
$id = $_GET['invoiceN'];
echo($id);
echo("<br>");
$sqlGetIN = "SELECT * FROM tmpInvoices WHERE id = $id";
$resultGetIN = $conn->query($sqlGetIN);
$rowGetIN = mysqli_fetch_assoc($resultGetIN);
echo($rowGetIN['invoiceN']);
$invoiceN = $rowGetIN['invoiceN'];
///select data from tmp stock
$sql = "SELECT * FROM `tmpStock` WHERE `invoiceN` LIKE '2-1540275581044' ORDER BY `stockId` DESC";
$result = $conn->query($sql);
while($row = mysqli_fetch_assoc($result)){
	echo($row['id']);
}*/
$sql = "SELECT * FROM `tmpStock` WHERE `invoiceN` LIKE '$invoiceN'";
$result = $conn->query($sql);

?>
<!--<h1><?php echo($vehicleId) ?></h1>-->
<center><table id="table">
			<tr>
				<th>Id</th>
				<th>Item</th>
				<th>Qty</th>
				<th>Soled Price</th>
				<th>Total</th>
				<th></th>
				
			</tr>
<?php
	$total = 0;
while($row = mysqli_fetch_assoc($result)){
	
	?>
		
			<tr>
				<td><?php echo($row['id']); ?></td>
				
				<td><?php 
					//echo($row['stockId']);
					$co->getItemNameFromStockId($row['stockId']) ?></td>
				<td><?php echo($row['qty']); ?></td>
				<td><?php echo($row['selectedPrice']) ?></td>
				<td><?php echo($row['selectedPrice'] * $row['qty']); 
					$total+=$row['selectedPrice'] * $row['qty'];
					
					?></td>
					<td><button class="btn btn-danger btn-lg" onClick="alert('under construction')"> X </button></td>
			</tr>
			
		
	<?php
}
?>
<tr>
	<td></td>
				
	<td></td>
	<td></td>
	<td></td>
	<td><?php echo($total);?></td>
</tr>
</table>
<button class="btn btn-primary btn-lg" onclick="conformTmpInvoice(<?php echo($shopId) ?>,<?php echo($_GET['invoiceN']) ?>,<?php echo($vehicleId) ?>)">Conform</button>
</center>
<?php $conn->close(); ?>