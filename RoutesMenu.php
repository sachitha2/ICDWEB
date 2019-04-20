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
$menu->menuBar("Route Menu","BackToSettingsMenu()");
?>

<div onClick="addRootPageLoader()" id="addPageLoaderId" class="tileButton addRouteBack"><br><div class="btnTxtP">Add Routes</div></div>
<div onClick="deleteRoutePageLoader()" id="" class="tileButton addShopDelBack"><br><div  class="btnTxtP">Remove Routes</div></div>
<div onClick="editRoutePageLoader()" id="" class="tileButton addEditShopBack"><br><div  class="btnTxtP">Edit Routes</div></div>
<div onClick="getRoutesPageLoader()" id="" class="tileButton viewShopBack"><br><div  class="btnTxtP">View Routes</div></div>