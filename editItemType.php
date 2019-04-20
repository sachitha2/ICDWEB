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

<?php 
	//Connecting Database
include("db.php");
	
	// End

	$Id = htmlspecialchars($_GET["Id"]);

	$sql01 = "SELECT *
			  FROM item_type
			  WHERE id = $Id;";

	$result = mysqli_query($conn, $sql01);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck>0){
		
		$row = mysqli_fetch_assoc($result);	
		echo "
 	  	  <h5>Item Type</h5>
			<input type='text' class='txtbox' name='name' id='name' required value='".$row['name']."' style='color:black'><br>
 	  	  <h5>Date</h5>
			<input type='text' class='txtbox' name='date' id='date' required value='".$row['date']."' style='color:black'><br>
	  	  <h5>Status</h5>
			<input type='text' class='txtbox' name='status' id='status' required value='".$row['status']."' style='color:black' onKeyPress='enter2EditItemType(event)'><br>";

			
 	  	  
  	  	echo "<h5 id='errorMessage' style='color: red'></h5><br>
	  	      <button id='saveItemType' class= 'btn-block button button1' type='button' onClick='saveItemType()'>Save Changes</button>
		  ";
		//echo "<div style='color: blue'>User was removed successfully</div>";
		
	}else{
	echo 'Invalid ID';
	}
	

?>
<?php $conn->close(); ?>
