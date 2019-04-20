<?php
header('Access-Control-Allow-Origin: *'); 
?>
  


<?php date_default_timezone_set("Asia/Kolkata");?>
<hr width="100%">
<img src="back.png" width="90" height="90" onClick="backToCostMenu()" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">Add Cost</div>
<hr width="100%">
	
	<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4 transbox" align="center" style="color:beige;background-color: #3C3C3C">
	  	<div>
	  	
	  	  <h5>Cost</h5>
			<input type="text" class="txtbox" name="Cost" id="Cost" style="color: black"><br>
 	  	  <h5>Purpose</h5>
			<input type="text" class="txtbox" name="Purpose" id="Purpose" style="color: black"><br>
	  	  <h5>Date</h5>
			
 	  	  <input type="date" class="txtbox" name="DateTime" id="DateTime" style="color: black" onKeyPress="enterCost(event)" value="<?php echo date('Y-m-d'); ?>"><br>
  	  	  <h5 id="errorMessage" style="color: red"></h5><br>
	  	  <button id="AddCost" class=" btn-block button button1" type="button" onClick="addCost()">Add Cost</button>
		
		</div>
		</div>
		
		<div class="col-md-4">
			<div align="center" style="vertical-align:middle;">
				<h5 id="OutCost" ></h5>
				<h5 id="OutPurpose" ></h5>
				<h5 id="OutDateTime"</h5>
				<div id="DelUser" ></div>
			</div>
		</div>
		
	</div>