<?php
header('Access-Control-Allow-Origin: *'); 
?>
  
<hr width="100%">
<img src="back.png" width="90" height="90" onClick="backToCostMenu()" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">This Month's cost</div>
<hr width="100%">

<div class="row">
	<div class="col-md-3"></div>
		<div class="col-md-6" align="center">
	  		<div style="opacity: 1.0;">

<?php 
	//Connecting Database
include("db.php");
	// End

	$sql = "SELECT *
			FROM cost
			WHERE MONTH(date)=MONTH(CURDATE()) AND YEAR(date)=YEAR(CURDATE());";

	$result = mysqli_query($conn, $sql);

	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck>0){
	
	echo "<table align='center' id='table'>";
	echo "<tr><th>ID</th><th>Purpose</th><th>Date</th><th>Cost</th></tr>";

	$Sum = 0;
	while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		
		echo '<td>' . $row['id'] . '</td>';
		echo '<td>' . $row['purpose'] . '</td>';
		echo '<td>' . $row['date'] . '</td>';
		echo '<td style="text-align: right;">' . $row['price'] . '</td>';

		echo "</tr>";
		
		$Sum = $Sum + $row['price'];
		
	}
	echo '<tr>';
		echo '<td colspan="3" style="text-align: right;">';
			echo "<h3>Total cost = </h3>";	
		echo '</td>';
		echo '<td style="text-align: right;">';
			echo "<h3>$Sum</h3>";	
		echo '</td>';
	echo '</tr>';
	echo "</table>";
	/*$row = mysqli_fetch_assoc($result);*/
	}else{
echo '<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4 transbox" align="center" style="color:beige;background-color: #3C3C3C">
	  	<div style="opacity: 1.0;">
	  		<h3>No Results Found</h3>
		</div>
	  <div class="col-md-4"></div>
	  </div>';
	}
	
	
?>

			</div>
		</div>
	<div class="col-md-3"></div>
</div>
