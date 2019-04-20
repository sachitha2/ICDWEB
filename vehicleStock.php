<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
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
$menu->menuBar("Vehicle Stocks","BackToStockMenu()");

?>

<div  class="tileButton vehicleBack" onClick="ajaxCommonGetFromNet('<?php echo($url) ?>viewVehicles.php' , 'mainStage')"><br><div  class="btnTxtP">View Vehicle Stocks</div></div>




<div  class="tileButton stockLoading" onClick="selectVehicleToAddStocks()"><br><div  class="btnTxtP">Add  Stocks </div></div>


<!--<div  class="tileButton deleteIcon" onClick="ajaxCommon('removeStock.php', 'mainStage')";><br><div  class="btnTxtP">Remove Stocks</div></div>-->
						   
<div  class="tileButton stockLoading" onClick="ajaxCommonGetFromNet('<?php echo($url)  ?>selectVehicleForTmpStock.php', 'mainStage')"><br><div  class="btnTxtP">tmp Stocks</div></div>


<div  class="tileButton stockLoading" onClick="ajaxCommonGetFromNet('<?php echo($url)  ?>stockHistory.php', 'mainStage')"><br><div  class="btnTxtP">Stocks History</div></div>