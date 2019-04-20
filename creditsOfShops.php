<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");
$co = new DB;
$co->dataConn($conn);
$basic = new basic;
$basic->modal();

$lin = "dashSubMenu()";
$basic->menuBar("Credits",$lin);

$sql = "SELECT * FROM shop WHERE credit != 0";
$result = $conn->query($sql);

?>
<center><table id="table">
		<tr>
			<th>ID</th>
			<th>Shop Name</th>
			<th>Root</th>
			<th>Credit</th>
		</tr>
<?php
while($row = mysqli_fetch_assoc($result)){
	
	
	
	?>
	<tr>
		<td><?php echo($row['id']) ?></td>
		<td><?php echo($row['name']) ?></td>
		<td><?php echo($co->getRootNameById($row['root_id'])) ?></td>
		<td><?php echo($row['credit']) ?></td>
	</tr>
		
	
	<?php
}
?>
<tr>
	<td  colspan="3" > <center>Total</center></td>
	<td><?php echo($co->getSumOfATable("shop","credit","")) ?></td>
</tr>
</table></center>
<?php $conn->close(); ?>