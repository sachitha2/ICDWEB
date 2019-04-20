<?php
include("func/basic.class.php");
include("url.php");
$menu = new basic;
$menu->modal();

$menu->menuBar("Shop Menu","BackToSettingsMenu()");
?>
	

<div class="tileButton addShopBack" onClick="addShopPageLoader()"><br><div   class="btnTxtP">Add Shop</div> </div>

<div class="tileButton addShopDelBack"><br><div   class="btnTxtP">Delete Shop</div> </div>


<div class="tileButton addEditShopBack" onClick="ajaxCommon('editShopInterface.php','mainStage')"><br><div   class="btnTxtP">Edit Shop</div></div>


<div class="tileButton viewShopBack" onClick="ajaxCommonGetFromNet('<?php echo($url) ?>rootsAndShops.php','mainStage')"><br><div   class="btnTxtP">View Shop</div></div>
