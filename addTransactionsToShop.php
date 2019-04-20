<?php
$shopId = $_REQUEST['shopId'];
?>
<h1>ADD Transaction To <?php echo($shopId)?></h1>
<div>Transactions</div>
<div>
	
	<label>Shop Id</label><input type="number" placeholder="Shop Id" value="<?php echo($shopId)?>">
	<br>
	<label>Item Id</label><input type="number" value="" placeholder="Item Id" > 
	<br>
	<label>quantity</label><input type="number" value="" placeholder="quantity" > 
</div>