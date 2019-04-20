<?php 
	//Connecting Database
include("db.php");
	
	// End

	$Id = htmlspecialchars($_GET["Id"]);

	$sql01 = "SELECT *
			  FROM item
			  WHERE id = $Id;";

	$result = mysqli_query($conn, $sql01);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck>0){
		
		$row = mysqli_fetch_assoc($result);	
		echo "
 	  	  <h5>Item Name</h5>
			<input type='text' class='txtbox' name='name' id='name' required value='".$row['name']."' style='color:black'><br>
		  <h5>Item Type ID</h5>
			<input type='text' class='txtbox' name='TypeId' id='TypeId' required value='".$row['itemTypeId']."' style='color:black'><br>
 	  	  <h5>Date</h5>
			<input type='text' class='txtbox' name='date' id='date' required value='".$row['sDate']."' style='color:black'><br>
	  	  <h5>Status</h5>
			<input type='text' class='txtbox' name='status' id='status' required value='".$row['status']."' style='color:black' onKeyPress='enter2EditItem(event)'><br>";

			
 	  	  
  	  	echo "<h5 id='errorMessage' style='color: red'></h5><br>
	  	      <button id='saveItem' class= 'btn-block button button1' type='button' onClick='saveItem()'>Save Changes</button>
		  ";
		//echo "<div style='color: blue'>User was removed successfully</div>";
		
	}else{
	echo 'Invalid ID';
	}
	

?>
