<?php
header('Access-Control-Allow-Origin: *'); 
?>



<hr width="100%">
<img src="back.png" width="90" height="90" onClick="backToRoutesMenu()" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">Routes</div>
<hr width="100%">

<?php 
	//Connecting Database
include("db.php");
	// End

	$sql = "SELECT *
			FROM root";

	$result = mysqli_query($conn, $sql);

	
	
	echo "<table align='center' id='table'>";
	echo "<tr><th>Root Id</th><th>Root Name</th><th>Edit</th><th>Delete</th></tr>";
	while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>";

		echo '<td>' . $row['id'] . '</td>';

		echo '<td>' . $row['name'] . '</td>';
			
		echo('<td><input type="submit" value="Edit" action=""></td><td><input type="submit" value="Delete" action=""></td>');

		echo "</tr>";
		
	}

	echo "</table>";
	/*$row = mysqli_fetch_assoc($result);*/

	
	
?>