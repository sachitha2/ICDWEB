<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
include("url.php");
include("func/basic.class.php");
include("func/DB.class.php");
$co = new DB;
$co->dataConn($conn);

$main = new basic;
$date = $_GET['date'];

?>
<hr width="100%">
<img src="back.png" width="90" height="90" onClick="sellingSubMenu()" class="floateLeft" style="cursor: pointer">
<div  class="mainHeadDiv">Selling Report <?php echo($date) ?></div>
<hr width="100%">
<?php

$sql = "SELECT SUM(selling_price) FROM sell WHERE date = '$date';";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);


$sqlGetTodayIncome = "SELECT * FROM sell WHERE date = '$date';";
$resultGetTodayIncome = $conn->query($sqlGetTodayIncome);

$numRowGetTodayIncome = mysqli_num_rows($resultGetTodayIncome);

if($numRowGetTodayIncome != 0){
	?>
<center>
<h1>Shop vise | item vise </h1>
<a href="<?php echo($url) ?>pdfTodayIncome.php" target="_blank"><button>Print</button></a>


		<table id="table">
			<tr>
				<th>ID</th>
				<th>ITEM</th>
				<th>qty</th>
				<th>Total</th>
			</tr>
		
		<?php 
		/////////////////ITEMS
			$itemA = $co->select("item","WHERE status = 1");
//			print_r($itemA);
			$grandTotal = 0;
			foreach($itemA as $data){
				$qty = $co->getSumOfATable("sell","amount","WHERE date = '$date' AND item_id = ".$data['id'].";");
				if($qty != 0){
				?>
				<tr>
					
					<td><?php echo($data['id']); ?></td>
					<td><?php $co->getItemNameByStockId($data['id']) ?></td>
					<td><?php echo($qty) ?></td>
					<td>
						<?php
							$tmpTotalAr = $co->select("sell","WHERE date = '$date' AND item_id = ".$data['id'].";");
							$tmpTotal = 0;
							
							foreach($tmpTotalAr as $dataTmp){
//								print_r($dataTmp);
								$tmpTotal += ($dataTmp['amount'] * $dataTmp['selling_price']);
							}
							
							echo($tmpTotal);
						?>
						
						
					</td>
				</tr>
				
				<?php
				$grandTotal += $tmpTotal;
				}
				
			}
		/////////////////ITEMS
		?>
		<tr>
			<td colspan="3">
			<td><?php echo($grandTotal) ?></td>
		</tr>
		</table>
		<br>

<!--
<table id="table">
	<tr>
		<th>Id</td>
		<th>Item</th>
		<th>Amount</td>
		<th>Sell Price</th>
		<th>Total</th>
	</tr>
-->
<?php
	
$total = 0;
while($rowGetTodayIncome = mysqli_fetch_assoc($resultGetTodayIncome)){
	?>
	
<!--
	<tr>
		<td><?php echo($rowGetTodayIncome['id']); ?></td>
		<td>
		
			
		
			<?php $co->getItemNameByStockId($rowGetTodayIncome['item_id']);?>
			<?php //echo($rowGetTodayIncome['item_id']); ?>
		</td>
		<td><?php echo($rowGetTodayIncome['amount']); ?></td>
		<td><?php echo($rowGetTodayIncome['selling_price']); ?></td>
		<td><?php echo($rowGetTodayIncome['selling_price'] * $rowGetTodayIncome['amount']); ?></td>
	</tr>
-->
	
	<?php
	$total = $total + ($rowGetTodayIncome['selling_price'] * $rowGetTodayIncome['amount']);
}
	?>
<!--
	<tr>
		<td colspan="4">Total</td>
		<td><?php echo($total) ?></td>
	</tr>
-->
	<?php
}
else{
	//echo("No data found");
	$main->noDtaF();
}


?>
<!--</table></center>-->


<?php
$itemSql = "SELECT * FROM item WHERE status = 1 ";
$itemResult = $conn->query($itemSql);
while($rowItem = mysqli_fetch_assoc($itemResult)){
	//echo($rowItem['id']);
	
	
$sqlGetTodayIncome = "SELECT * FROM sell WHERE date = '$date' AND item_id = ".$rowItem['id'].";";
$resultGetTodayIncome = $conn->query($sqlGetTodayIncome);

$numRowGetTodayIncome = mysqli_num_rows($resultGetTodayIncome);

if($numRowGetTodayIncome != 0){
	?>
<center>
<br>
<br>
<caption><?php echo("Item name") ?></caption>
<table id="table">
	<tr>
		<th>Id</td>
		<th>Item</th>
		<th>Amount</td>
		<th>Sell Price</th>
		<th>Total</th>
	</tr>
<?php
	
$total = 0;
while($rowGetTodayIncome = mysqli_fetch_assoc($resultGetTodayIncome)){
	?>
	
	<tr>
		<td><?php echo($rowGetTodayIncome['id']); ?></td>
		<td>
		
			
		
			<?php $co->getItemNameByStockId($rowGetTodayIncome['item_id']);?>
			<?php //echo($rowGetTodayIncome['item_id']); ?>
		</td>
		<td><?php echo($rowGetTodayIncome['amount']); ?></td>
		<td><?php echo($rowGetTodayIncome['selling_price']); ?></td>
		<td><?php echo($rowGetTodayIncome['selling_price'] * $rowGetTodayIncome['amount']); ?></td>
	</tr>
	
	<?php
	$total = $total + ($rowGetTodayIncome['selling_price'] * $rowGetTodayIncome['amount']);
}
	?>
	<tr>
		<td colspan="4">Total</td>
		<td><?php echo($total) ?></td>
	</tr>
	<?php
}
else{
	//echo("No data found");
	
}


?>
</table></center>
	<?php
}

?>
<?php $conn->close(); ?>