<?php
include("func/basic.class.php");
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
$menu = new basic;
$menu->menuBar("Vehicle Menu","BackToSettingsMenu()");
?>
<div onClick="addVehiclePageLoader()" id="addPageLoaderId" class="tileButton addVehicleBack"><br><div  class="btnTxtP">Add Vehicle</div></div>


<div onClick="deleteVehiclePageLoader()" id="" class="tileButton addShopDelBack"><br><div  class="btnTxtP">Remove Vehicle</div></div>


<div onClick="editVehiclePageLoader()" id="" class="tileButton addEditShopBack"><br><div  class="btnTxtP">Edit Vehicle</div></div>


<div onClick="showVehiclesPageLoader()" id="" class="tileButton viewShopBack"><br><div  class="btnTxtP">View Vehicle</div></div>