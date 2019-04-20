<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");

$shopId = $_GET['shopId'];

$co = new DB;
$co->dataConn($conn);

$shopId = 10;

$credit = $co->getCreditOfShopFromId($shopId);

?>


	<center>
		<button onclick="hideModal()">Back</button>
		Credit
		<input type="number"  disabled="disabled" id="tmpCredit" value="<?php echo($credit) ?>">
		
		<input type="number" placeholder="enter cash">
		<div id="tmpOut"></div>
		<button>Finish</button>
	</center>
	<?php $conn->close(); ?>