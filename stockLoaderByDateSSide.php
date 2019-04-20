<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
include("func/DB.class.php");
include("func/basic.class.php");
$co = new DB;
$co->dataConn($conn);
$basic = new basic;
$basic->modal();
$lin = "ajaxCommonGetFromNet('http://icd.infinisolutionslk.com/stockHistorySelectDate.php?vehicleId=2', 'mainStage');";
$date = $_GET['date'];
$vehicleId = $_GET['vehicleId'];
$basic->menuBar($vehicleId." - Stock History - ".$date,$lin);

?>
<?php 
	$sql = "SELECT * FROM t_stock WHERE vehicle_id = $vehicleId AND date = '".$date."'";
	$result = $conn->query($sql);
	
		$numRow = $co->getNumRow("SELECT * FROM t_stock WHERE vehicle_id = $vehicleId AND date = '".$date."'");
		if($numRow > 0){
			?>
	
	<center><table id="table">
			<tr>
				<th>TSID</th>
				<th>MSID</th>
				<th>Item</th>
				<th>LA</th>
				<th>RS</th>
				<th>SA</th>
				<th>S</th>
			</tr>
			
			<?php
		
	while($row = mysqli_fetch_assoc($result)){
		
		?>
		
			<tr>
				<td><?php echo($row['id'] ) ?></td>
				<td><?php echo($row['amount_id'])  ?></td>
				<td><?php $co->getItemNameByStockId($row['item_id']) ?></td>
				<td><?php echo($row['amount'])  ?></td>
				<td><?php echo($row['remainStock']) ?>
			
				<br>
				<?php
			
				//echo($co->getNumRow("SELECT * FROM `t_stock` WHERE `vehicle_id` = $vehicleId AND `date` = '".$date."'"));
			?>
				</td>
				<td><?php echo($row['amount'] - $row['remainStock'] ) ?></td>
				<td><?php echo($row['s']) ?></td>
			</tr>
		
		
		
		<?php
	}
			?>
			</table>
				0 = Unconformed
				1 = in vehicle
				2 = unloaded
				3 = mistake of loading and unloaded to main stock
		</center>
			<?php
			
		}else{
			$basic->noDtaF();
		}
	?>
	<?php $conn->close(); ?>