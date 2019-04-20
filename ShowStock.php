<?php 
	//Connecting Database
	include("db.php");
	// End

	$sql = "SELECT *
			FROM t_stock";

	$result = mysqli_query($conn, $sql);

	
	
	echo "<table align='center'>";
	echo "<tr><th>Vehicle ID</th><th>Item ID</th><th>Amount</th></tr>";
	while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo '<td>' . $row['vehicle_id'] . '</td>';
		echo '<td>' . $row['item_id'] . '</td>';
		echo '<td>' . $row['amount'] . '</td>';
		echo "</tr>";
		
	}

	echo "</table>";
	/*$row = mysqli_fetch_assoc($result);*/

	
	
?>
