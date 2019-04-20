<?php
 header("Access-Control-Allow-Origin: *");
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
<div class="mainHeadDiv">Edit Shop</div>
<hr width="100%">
	
	<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4 transbox" align="center" style="color:beige;background-color: #3C3C3C" >
	  	<div style="opacity: 1.0;">
	  
 	  	  <div id="show">
 	  	  
  	  	  <h5>Enter the shop ID, you want to edit.</h5><br>
 	  	  <h4>Shop ID</h4>
			<input type="number" class="txtbox" name="Id" id="Id" onKeyPress="enterEditShop(event,this.value)" required style="color: black"><br>
  	  	  <h5 id="errorMessage" style="color: red"></h5><br>
	  	  <button id="editShop" class=" btn-block button button1" type="button" onClick="editShop()">Edit Shop</button>
	  	  
	  	  </div>
	  	  
		</div>
		</div>
		<div class="col-md-4">
			<div align="center" style="vertical-align:middle;">
				<h5 id="OutId" ></h5>
				<h5 id="OutTypeId" ></h5>
				<h5 id="OutName" ></h5>
				<h5 id="OutDate" ></h5>
				<h5 id="OutStatus" ></h5>
			</div>
		</div>
	</div>
