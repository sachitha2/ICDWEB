<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("func/basic.class.php");
$basic = new basic;
$basic->modal();

?>
  



<?php
include("db.php");
$vehicleId = $_GET['vehicleId'];

?>
<hr width="100%">
<img src="back.png" width="90" height="90" onClick="ajaxCommonGetFromNet('<?php echo($url) ?>viewVehicles.php' , 'mainStage')" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">Vehicle <?php echo($vehicleId);?> Stock</div>
<hr width="100%">


<?php
$sql = "SELECT * FROM t_stock WHERE  s = 1 AND vehicle_id = $vehicleId ";
/// s = is in vehicle stock

$result = $conn->query($sql);
$numRows = mysqli_num_rows($result);
if($numRows != 0){
	


?>
<h1>Item vise | Date vise | </h1>
<h1>HISTORY</h1>
<center><table id="table">
<tr>
	<th>ID</th>
	<th>IN</th>
	<th>D</th>
	<th>L</th>
	<th>RA</th>
	<th>SA</th>
	<th>R</th>
<th>LD</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
	$itemTypeId = $row['itemTypeId'];
	$itemId = $row['item_id'];
	$sqlItemName = "SELECT * FROM item WHERE id = $itemId";
	$resultItemName = $conn->query($sqlItemName);
	$getItemName = mysqli_fetch_assoc($resultItemName);
	$itemTypeI = $getItemName['itemTypeId'];
	$itemName = $getItemName['name'];
	
	$findItemTypeNameSql = "SELECT * FROM item_type WHERE id = $itemTypeI";
	$findItemTypeNameResult = $conn->query($findItemTypeNameSql);
	$findItemTypeNameRow = mysqli_fetch_assoc($findItemTypeNameResult);
	?>
	<tr <?php if($row['remainStock'] == 0){echo('style="background-color:#0080FF;color:white"');} ?>>
	
		<td <?php if($row['remainStock'] == 0){echo('style="color:white"');} ?>><?php echo($row['id']);?></td>
		<td <?php if($row['remainStock'] == 0){echo('style="color:white"');} ?>><?php echo($findItemTypeNameRow['name']."-"); echo($itemName);?></td>
		<td <?php if($row['remainStock'] == 0){echo('style="color:white"');} ?>><?php echo($row['date']);?></td>
		<td <?php if($row['remainStock'] == 0){echo('style="color:white"');} ?>><?php echo($row['amount']);?></td>
		<td <?php if($row['remainStock'] == 0){echo('style="color:white"');} ?>><?php echo($row['remainStock']) ?></td>
		<td <?php if($row['remainStock'] == 0){echo('style="color:white"');} ?>><?php echo($row['amount']-$row['remainStock']);?></td>
		<td <?php if($row['remainStock'] == 0){echo('style="color:black"');} ?>><button class="btn btn-primary" onClick="moveStock(<?php echo($vehicleId) ?>,<?php echo($row['remainStock']) ?>,<?php echo("1"/*$row['amount_id']*/) ?>,<?php echo($row['id']) ?>)">UNLOAD</button></td>
		<td>
			<?php echo($row['amount_id']) ?>
			
		
		</td>
	</tr>
	<?php
}
?>
</table></center>


<?php
}
else{
	$basic->noDtaF();
}
?>
<?php $conn->close(); ?>