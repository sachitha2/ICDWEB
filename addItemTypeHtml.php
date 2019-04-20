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


	<div class="mainDiv">
		<hr width="100%">
		<img src="back.png" width="90" height="90" onClick="backToItemTypesMenu()" class="floateLeft" style="cursor: pointer">
		<div class="mainHeadDiv">Add Item Type </div>
		<hr width="100%">
			<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4 transbox" align="center" style="color:beige;background-color: #3C3C3C">
	  	<div style="opacity: 1.0;">
	  			<h5>Enter Item Type Name</h5>
	  	 		<input type="text" id="itemTypeName"  onKeyPress="e(event)" style="color: black">
	  	 		<br/>
	  	 		<br>
	  	 		<h5 id="errorMessage" style="color: red"></h5><br>
				<input type="button" value="Save" onClick="addItemType()" id="myBtn" style="color: black">
		</div>
		</div>
	</div>
				
		
		
	</div>


