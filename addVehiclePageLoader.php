<?php
header('Access-Control-Allow-Origin: *'); 
?>


<?php include("modal.php") ?>
<hr width="100%">
<img src="back.png" width="90" height="90"  onClick="backToVehiclesMenu()" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">Add Vehicle</div>
<hr width="100%">




<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4 transbox" align="center" style="color:beige;background-color: #3C3C3C" >
	  	<div style="opacity: 1.0;">
  	  	  Select Driver
  	  	  <br>
  	  	  <?php echo("get drivers") ?>
	  	  <select   style="color: black;font-size: 20px;">
	  	  	<option>
	  	  		hello
	  	  	</option>
	  	  </select>
	  	  <br>
	  	  Enter Vehicle Number<br>
		  <input type="text" value="" placeholder="Enter vehicle number" id="vehicleNumber" onKeyPress="enterAddVehicle(event)" class="txtbox" style="color: black">
		  <br>
		  
		  <br>
		  <input type="button" value="Save" onClick="addVehicle()"  class=" btn-block button button1">
	  	  
		</div>
		</div>
		<div class="col-md-4"></div>
	</div>
<div id="mainStage"></div>


