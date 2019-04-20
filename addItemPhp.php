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
<img src="back.png" width="90" height="90" onClick="backToItemsMenu()" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">Items</div >
<hr width="100%">
		
			
		<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4 transbox" align="center" style="color:beige;background-color: #3C3C3C">
	  	<div style="opacity: 1.0;">
	  			<!--This is Activity area-->
	  			<h5>Select Item Type</h5>
				<select id="itemTypesList" style="font-size: 20px;color: black;width: 70%;">
					<?php include('loadItemTypeList.php'); ?>
				</select>
				<br>
				<br>
				<h5>Enter item name</h5>
			    <input type="text" id="itemName" onKeyPress="eAddItem(event)" style="font-size: 20px;color: black;width: 70%;"><br>
			    <br>
			    <input type="button"  value="Save" id="myBtn" onClick="addItem()" class="button button1">
			    <h5 id="errorMessage" style="color: red"></h5>
			    <!--This is Activity area-->    
	  	 
		</div>
		</div>
	</div>
	