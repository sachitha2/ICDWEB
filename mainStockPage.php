<?php
header('Access-Control-Allow-Origin: *');
include("url.php");
include("func/basic.class.php");

$basic = new basic;
$basic->modal();
?>
<hr width="100%">
<img src="back.png" width="90" height="90" onClick="BackToStockMenu()" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">Main Stock</div>
<hr width="100%">

<!----->
<div  class="tileButton viewMainStock" onClick="ajaxCommonGetFromNet('<?php echo($url) ?>viewStock.php' , 'mainStage')">
	<br>
	<div class="btnTxtP">View Stock</div>
</div>

<div  class="tileButton updateMainStock" onClick="ajaxCommonGetFromNet('<?php echo($url) ?>addStock.php', 'mainStage')">
	<br>
	<div class="btnTxtP">Update Main  Stock</div>

</div>
<div  class="tileButton deleteMainStock" onClick="ajaxCommon('removeStock.php', 'mainStage')">
	<br>
	<div class="btnTxtP">Remove Stock</div>
</div>

<a href="mainStockHistory.php" target="_blank">
	<div  class="tileButton mainStockHistory" onClick="">
		<br><div class="btnTxtP">HISTORY  Stock</div>
	</div>
</a>