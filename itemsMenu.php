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
$menu->menuBar("Item Menu","BackToSettingsMenu()");
?>
<div   onClick="addItemPageLoader()" id=""  class="tileButton addItemBack"><br><div   class="btnTxtP">Add Item</div></div>
<div  onClick="deleteItemPageLoader()" id="" class="tileButton addShopDelBack"><br><div   class="btnTxtP">Delete Items</div></div>


<div  onClick="editItemPageLoader()" id="" class="tileButton addEditShopBack"><br><div   class="btnTxtP">Edit Items</div></div>


<div onClick="showItemsPageLoader()" id="" class="tileButton viewShopBack"><br><div   class="btnTxtP">View Items</div></div>