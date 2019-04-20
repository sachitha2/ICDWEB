<?php
header('Access-Control-Allow-Origin: *'); 
?>
  
<?php
	include("db.php");
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
<img src="back.png" width="90" height="90" onClick="backToShopsMenu()" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">Add Shop</div>
<hr width="100%">

  	  
  	 			<div class="col-md-4"></div>
  	 			
  	  			<div class="col-md-4 transbox"  align="center" style="color:beige;background-color: #3C3C3C;opacity: 0.9;">
	  			<div style="opacity: 1.0;">
	  	
	  	  		<h5>Shop Name</h5>
				<input type="text" class="txtbox" name="Name" id="Name" required><br>
  	  	  		<h5>Address</h5>
				<textarea rows="3" cols="24" name="Address" id="Address" style="color: black;width: 70%"></textarea>
 	  	  		<h5>Phone Number</h5>
				<input type="text" class="txtbox" name="Phone" id="Phone" required><br>
	  	  		<h5>Select Root</h5>
 	  	  		<select style="color: black;width: 70%;font-size: 20px;" id="Root_Id">
 	  	  			<?php
						$sql = "SELECT * FROM root";
						$result = $conn->query($sql);
						while($row = mysqli_fetch_assoc($result)){
							?>
								<option value="<?php echo($row['id']) ?>"><?php echo($row['name']) ?></option>
							<?php
						}
					?>
 	  	  		</select>
				<!--<input type="text" class="txtbox" name="Root_Id" required><br>-->
 	  	  		<h5>Owner's NIC Number</h5>
				<input type="text" class="txtbox" name="NIC_Number" id="NIC_Number" required onKeyPress="enterAddShop(event)" ><br>
 	  	  		
  	  	  		<h5 id="errorMessage" style="color: red"></h5><br>
	  	  		<button id="AddShop" class=" button button1" type="button" onClick="addShop()">Add Shop</button>
		
		</div>
		</div>
	  
		<!--<div class="col-md-4">
			<div align="center" style="vertical-align:middle;">
				<h5 id="OutName" ></h5>
				<h5 id="OutAddress" ></h5>
				<h5 id="OutPhone" ></h5>
				<h5 id="OutNIC" ></h5>
				<h5 id="OutRoot" ></h5>
				<div id="DelShop" ></div>
			</div>
		</div>-->
<?php $conn->close(); ?>
