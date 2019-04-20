<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");

$menu = new basic;

$menu->menuBar("name History","getVehiclePageLoader()");


?>
<?php

$sql = "SELECT DISTINCT date FROM t_stock ORDER BY date DESC";
$result = $conn->query($sql);
?>
		<center>
			
			<table border="1" id="table">
				<tr>
					<th>Date</th>
					<th>Total Loading</th>
					<th>Total UnLoading</th>
				</tr>
			

<?php
while($row = mysqli_fetch_assoc($result)){
	
	?>
				<tr>
					<td><?php echo($row['date']) ?></td>
						
						<?php
							
							$sql2 = "SELECT SUM(amount) FROM t_stock WHERE date = '".$row['date']."' ORDER BY id DESC";
							$result2 = $conn->query($sql2);
							$row = mysqli_fetch_assoc($result2);
						?>
					
					<td><?php echo($row['SUM(amount)'])  ?></td>
					<td><?php echo($row['remainStock']) ?></td>
					<td>View</td>
				</tr>
				
	
	<?php
}

?>
			</table>
		</center>
		<?php $conn->close(); ?>