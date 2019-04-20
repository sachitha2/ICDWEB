<?php 
include("db.php");
$sql = "SELECT * FROM inComing ORDER BY inComing.id DESC";
$result = $conn->query($sql);
while($row = mysqli_fetch_assoc($result)){
	?>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Data</th>
			<th>Dat</th>
			<th>Time</th>
		</tr>
		<tr>
			<td><?php echo($row['id']);?></td>
			<td><?php echo($row['data']);?></td>
			<td><?php echo($row['day']);?></td>
			<td><?php echo($row['time']);?></td>
		</tr>
	</table>
	<?php
}

?>
<?php $conn->close(); ?>