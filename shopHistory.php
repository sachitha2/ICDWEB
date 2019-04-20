<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");

$shopId = $_GET['shopId'];

$co = new DB;
$co->dataConn($conn);

//$lin = "ajaxCommonGetFromNet('".$url."SellPage.php?shopId='".$shopId.", 'mainStage');";
$lin = "sellPageGet($shopId)";
$sql = "SELECT * FROM total WHERE shopId = $shopId";
$basic = new basic;
$basic->menuBar("Shop History",$lin);
if($co->getNumRow($sql) != 0){
	echo($co->getNumRow($sql) );
	?>
	<center><table id="table">
	<tr>
		<th>Id</th>
		<th>Date</th>
		<th>Invoice Number</th>
		<th>Total</th>
	</tr>
	<?php
		
	 	$result = $conn->query($sql);
		$id = 1;
		while($row = mysqli_fetch_assoc($result)){
			?>
			<tr>
				<td><?php echo($id) ?></td>
				<td><?php echo($row['date']) ?></td>
				<td><?php echo($row['id']) ?></td>
				<td><?php echo($row['total']) ?></td>
				<td><button onClick='ajaxCommonGetFromNet("<?php echo($url) ?>shopHistoryViewBill.php?shopId=<?php echo($shopId) ?>&billId=<?php echo($row['id'] )?>", "mainStage");'>View</button></td>
			</tr>
			
			<?php
				$id++;
		}
		
	?>
	
</table></center>
<?php
	
}
else{
	echo("no data found");
}
?>
<?php $conn->close(); ?>
