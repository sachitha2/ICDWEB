<?php
$shopId = $_GET['shopId'];
include("db.php");
$shopId = $_REQUEST["shopId"];
//checking availability of shop 
$sql = "SELECT * FROM shop WHERE id = $shopId";
$result = $conn->query($sql);
$numRows = mysqli_num_rows($result);
$shopName = mysqli_fetch_assoc($result);
?>

<?php
if($numRows == 1){
	?>
	<hr width="100%">
	<div class="mainHeadDiv">+ <?php echo($shopName['name'])?></div>
	<hr width="100%">
	
	<div class="tileButton" onClick="searchShopAvailability(<?php echo($shopId) ?>)">Add Transaction</div>
	<div class="tileButton" >Return Item</div>
	<div class="tileButton" onClick="billHistory()">History</div>
	<?php
}
else{
	?>
	<div class="mainHeadDiv">Shop Not Found</div>
	<?php
}

?>