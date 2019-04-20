<?php
header('Access-Control-Allow-Origin: *'); 
?>



<?php
include("db.php");
$amount = $_GET['amount'];
$itemId = $_GET['itemId'];
$shopId = $_GET['shopId'];
$billNumber = $_GET['billNumber'];
$itemPriceRangeId = $_GET['itemPriceRangeId'];


//find item amount is available or not

//availabel 
$sqlTotalOfItems = "SELECT SUM(amount) FROM item_amount WHERE item_id = $itemId AND amount != 0 ";
	$resultTotalOfItems = $conn->query($sqlTotalOfItems);
	$rowTotalOfItems = mysqli_fetch_assoc($resultTotalOfItems);
echo($rowTotalOfItems['SUM(amount)']);
if($rowTotalOfItems['SUM(amount)'] >= $amount ){
	$sqlLoad = "SELECT * FROM  item_amount WHERE item_id = $itemId AND amount !=0 ORDER BY  item_amount . date  ASC";
	$resultLoad = $conn->query($sqlLoad);
	$sqlRowLoad = mysqli_fetch_assoc($resultLoad);
	$iId = $sqlRowLoad['id'];
	if($sqlRowLoad['amount'] >= $amount){
		$sqlMakeBill = "INSERT INTO sell (id, item_id, item_price_range_id, amount, shop_id, date, stock_id, total_id, time,selling_price) VALUES (NULL, '$itemId', '$itemPriceRangeId', '$amount', '$shopId', curdate(), '1', '$billNumber', curtime(),$itemPriceRangeId);";
		$resultMakeBill = $conn->query($sqlMakeBill);


		$total = $amount * $itemPriceRangeId;
		$sqlUpdateTotal = "UPDATE total SET total = total + $total  WHERE total.id = $billNumber;";
		$resultUpdateTotal = $conn->query($sqlUpdateTotal);
		echo("<br>");
		echo($billNumber);
		echo("<br>");
		echo($total);
		$sqlUpdateStock = "UPDATE item_amount SET amount = amount - $amount  WHERE item_amount.id = $iId;";
		$resultUpdateStock = $conn->query($sqlUpdateStock);
		
	}else{
		echo("part method need");
		//part method
		/////////////////////////////////////
		
		$reqvestAmount = $amount;
		$remainAmount = $amount;
		//prob
		while($remainAmount >0){
			$getFRowSql = "SELECT * FROM  item_amount WHERE item_id = $itemId AND amount !=0 ORDER BY  item_amount . date  ASC";
			$getFRowResult = $conn->query($getFRowSql);
			$getFRow = mysqli_fetch_assoc($getFRowResult);
			$tempAmount = $getFRow['amount'];
			$tempId = $getFRow['id'];
			if($remainAmount > $tempAmount){
					$remainAmount = $remainAmount - $tempAmount;
					echo($tempAmount);
					echo("+");
					echo("in if");
					$sqlUpdateMainStock = "UPDATE item_amount SET amount = amount - $tempAmount WHERE item_amount.id = $tempId;";
					$resultUpdateMainStock = $conn->query($sqlUpdateMainStock);
					//add items to the sell table
					$sqlMakeBill = "INSERT INTO sell (id, item_id, item_price_range_id, amount, shop_id, date, stock_id, total_id, time,selling_price) VALUES (NULL, '$itemId', '$itemPriceRangeId', '$tempAmount', '$shopId', curdate(), '1', '$billNumber', curtime(),$itemPriceRangeId);";
					$resultMakeBill = $conn->query($sqlMakeBill);
				
				}
			else{
				echo($remainAmount);
				$sqlUpdateMainStock = "UPDATE item_amount SET amount = amount - $remainAmount WHERE item_amount.id = $tempId;";
					$resultUpdateMainStock = $conn->query($sqlUpdateMainStock);
					//add amount to sell table
					$sqlMakeBill = "INSERT INTO sell (id, item_id, item_price_range_id, amount, shop_id, date, stock_id, total_id, time,selling_price) VALUES (NULL, '$itemId', '$itemPriceRangeId', '$remainAmount', '$shopId', curdate(), '1', '$billNumber', curtime(),$itemPriceRangeId);";
					$resultMakeBill = $conn->query($sqlMakeBill);
				$remainAmount = 0;
				
				echo("+");
				echo("in else");
			}
			
			
		}
		//prob
		echo("Posion method");
	
		
		////////////////////////////////////
		
		//part method ending
	}
	
	
	

}else{
	echo("Out of stoc   hhk");
}

?>
<?php $conn->close(); ?>