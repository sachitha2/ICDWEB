<?php 
	header('Access-Control-Allow-Origin: *'); 
	//Connecting Database
	include("db.php");
	// End

	$Name = htmlspecialchars($_GET["Name"]);
	$Address = htmlspecialchars($_GET["Address"]);
	$Phone = htmlspecialchars($_GET["Phone"]);
	$NIC_Number = htmlspecialchars($_GET["NIC_Number"]);
	$Root_Id = htmlspecialchars($_GET["Root_Id"]);
	$id = $_GET['id'];
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
	$sql="SELECT *
		  FROM root
		  WHERE id = '$Root_Id';";
	
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	
				if ($resultCheck>0){
					
					$sql2 = "UPDATE shop SET name = '$Name', address = '$Address', tp = '$Phone', root_id = '$Root_Id', r_date = '2018-08-13', idCardN = '$NIC_Number' WHERE shop.id = $id;";

					$result = $conn->query($sql2);
					
					//mysqli_close($conn);
	
					echo "Changes have been saved successfully";
					//echo "<div style='color: blue'>User was registered successfully</div>";
					
				}else{
					//errorMessage = Passwords aren't matched
					echo "Invalid Root ID";
				}
			
		

	/**/

	
	
?>
<?php $conn->close(); ?>
