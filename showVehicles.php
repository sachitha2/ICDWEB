<?php
header('Access-Control-Allow-Origin: *'); 
?>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" id="mainModal" style="background-color: ;">
  <span class="close" onClick="hideModal()">&times;</span>
    <div class="" id="modalContent">
    	<h1>Loading</h1>
    
    </div>
  </div>

</div>



<hr width="100%">
<img src="back.png" width="90" height="90"  onClick="backToVehiclesMenu()" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">Vehicles</div>
<hr width="100%">
<?php
	include("db.php");
	$sql = "SELECT * FROM vehicle";

	$result = mysqli_query($conn, $sql);

	
	
	
	echo "<table align='center' id='table'>";
	echo "<tr><th>Id</th><th>Vehicle Number</th><th>Root</th><th>Driver</th><th>Status</th><th>Edit</th><th>Delete</th></tr>";
	while ($row = mysqli_fetch_assoc($result)){
		$sqlRootName = "SELECT * FROM root WHERE id =".$row['root_id'].";";
		$resultRootName = $conn->query($sqlRootName);
		$rowRootName = mysqli_fetch_assoc($resultRootName);
		
		
		echo "<tr>";

		echo '<td>' . $row['id'] . '</td>';

		echo '<td>' . $row['number'] . '</td>';
		
		echo '<td>'.$rowRootName['name'].'</td>';
		
		echo '<td>'.$row['username'].'</td>';
		
		echo '<td>'.$row['status'].'</td>';
				
		echo('<td><div onclick="editVehicle(1)" class="addBtnInItems">
		 EDIT </div></td><td><input type="submit" value="Delete" action=""</td>');

		echo "</tr>";
		
	}

	echo "</table>";
?>
<?php $conn->close(); ?>