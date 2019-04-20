<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");

$shopId = $_GET['shopId'];

$co = new DB;
$co->dataConn($conn);
?>


<hr width="100%">
<img src="back.png" width="90" height="90" onClick="sellingSubMenu()" class="floateLeft" style="cursor: pointer">
<div  class="mainHeadDiv">Month Income</div>
<hr width="100%">
<?php

$sql = "SELECT SUM(selling_price) FROM sell WHERE date = MONTH(date);";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);





$sqlGetTodayIncome = "SELECT * FROM sell WHERE MONTH(date) = MONTH(CURRENT_DATE());";
$resultGetTodayIncome = $conn->query($sqlGetTodayIncome);

$numRowsGetTodayIncome = mysqli_num_rows($resultGetTodayIncome);
if($numRowsGetTodayIncome != 0){
	?>
	<a href="<?php echo($url) ?>pdfMonthlyIncome.php" target="_blank"><button>Print</button></a>
<center><table id="table">
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
		$total += ($rowGetTodayIncome['selling_price'] * $rowGetTodayIncome['amount']);
}
?>
<tr>
	<td colspan="4">Total</td>
	<td><?php echo($total) ?></td>
</tr>
</table></center>
<?php } ?>
<?php $conn->close(); ?>