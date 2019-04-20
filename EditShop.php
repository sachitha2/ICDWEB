<?php 
 header("Access-Control-Allow-Origin: *");
	//Connecting Database
include("db.php");
$id = $_GET['id'];
	// End
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
		<img src="back.png" width="90" height="90" onClick="shopMenuLoading()" class="floateLeft" style="cursor: pointer">
	<div class="mainHeadDiv">Edit Shop</div>
	<hr width="100%">
<?php
	$id = htmlspecialchars($_GET["id"]);

	$sql01 = "SELECT *
			  FROM shop
			  WHERE id = '$id';";

	$result = mysqli_query($conn, $sql01);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck>0){
		$row = mysqli_fetch_assoc($result);
		?>
		<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4 transbox" align="center" style="color:beige;background-color: #3C3C3C">
	  	<div>
	  	
	  	  <?php
		echo("Shop id -".$id);
		echo "
		 <h5>Shop Name</h5>
		 <input type='text' class='txtbox' name='Name' id='Name' required autocomplete='off' value='".$row['name']."'>
		 <h5>Address</h5>
			<textarea rows='3' cols='24' name='Address' id='Address' style='color:black'>".$row['address']."</textarea>
 	  	  <h5>Phone Number</h5>
			<input type='text' class='txtbox' name='Phone' id='Phone' value='".$row['tp']."' required><br>
 	  	  <h5>Owner's NIC Number</h5>
			<input type='text' class='txtbox' name='NIC_Number' id='NIC_Number' value='".$row['idCardN']."' required><br>
 	  	  <h5>Root ID</h5>
			<input type='text' class='txtbox' name='Root_Id' id='Root_Id' value='".$row['root_id']."' onKeyPress='enter2(event)' required><br>
  	  	  <h5 id='errorMessage' style='color: red'></h5><br>
	  	  <button id='EditShop' class='btn-block button button1' type='button' onClick='saveInEditShop(Name.value,Address.value,Phone.value,NIC_Number.value,Root_Id.value,".$id.")'>Save Changes</button>";
		
			?>
		
		</div>
		</div>
		
		
	</div>
		
		<?php
		 
	
		
	}else{
		//errorMessage = Invalid name
		echo "Invalid Name";
	}
	

?>
<?php $conn->close(); ?>