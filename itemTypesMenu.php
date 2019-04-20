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
$menu->menuBar("Item Type Menu","BackToSettingsMenu()");
?>
<div onClick="addPageLoader()" id="addPageLoaderId" class="tileButton addItemTypeBack"><br><div class="btnTxtP" >Add Item Type</div></div>
<div onClick="" id="" class="tileButton addShopDelBack"><br><div class="btnTxtP" >Delete Item Type</div></div>
<div onClick="ajaxCommon('editItemType.html', 'mainStage')" id="" class="tileButton addEditShopBack"><br><div class="btnTxtP" >Edit Item Type</div></div>


<div onClick="showItemTypesPageLoader()" id="" class="tileButton viewShopBack viewShopBack"><br><div class="btnTxtP" >View Item Type</div></div>