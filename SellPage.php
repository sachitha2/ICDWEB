<?php
header('Access-Control-Allow-Origin: *'); 

include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");
$co = new DB;
$co->dataConn($conn);



$basic = new basic;

$basic->modal();

$shopId = $_GET['shopId'];
$shopId = $_REQUEST["shopId"];



//checking availability of shop 
$sql = "SELECT * FROM shop WHERE id = $shopId";
$result = $conn->query($sql);
$numRows = mysqli_num_rows($result);
$shopName = mysqli_fetch_assoc($result);


$lin = "sellingSubMenu()";
$basic->menuBar($shopName['name'],$lin);

?>

<?php
if($numRows == 1){
	?>
<!--
	<hr width="100%">
	<div class="mainHeadDiv">+ <?php echo($shopName['name'])?></div>
	<hr width="100%">
-->

	<?php
		$credit = $shopName['credit'];
	?>
	<h1>Credit - <?php echo($credit);?></h1>
	
	<div class="tileButton" onClick="searchShopAvailability(<?php echo($shopId) ?>)">Add Transaction</div>
	<div class="tileButton" >Return Item</div>
	<div class="tileButton" onClick="billHistory(<?php echo($shopId) ?>)">History</div>
	
	
	
	
	<?php
}
else{
	?>
	<div class="mainHeadDiv">Shop Not Found</div>
	<?php
}

?>
<?php $conn->close(); ?>