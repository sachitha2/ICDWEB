<?php
header('Access-Control-Allow-Origin: *'); 
?>
<?php

include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");
$co = new DB;
$co->dataConn($conn);
$itemId = $_GET['itemId'];
$itemAmount = $_GET['itemAmount'];
$vehicleId = $_GET['vehicleId'];

$tStock =array('data'=>array(),);

//Find Available stock amount
$sqlFindAvailableStockAmount = "SELECT SUM(amount) FROM item_amount WHERE item_id = $itemId AND amount != 0 ";
$resultFindAvailableStockAmount = $conn->query($sqlFindAvailableStockAmount);
$availableStockAmount = mysqli_fetch_assoc($resultFindAvailableStockAmount);
$currentAmount = $availableStockAmount['SUM(amount)'];
if($currentAmount >= $itemAmount){
	//find first stock amount is higher  than the requested amount
	$sqlLoad = "SELECT * FROM  item_amount WHERE item_id = $itemId AND amount !=0 ORDER BY  item_amount . date  ASC";
	$resultLoad = $conn->query($sqlLoad);
	$sqlRowLoad = mysqli_fetch_assoc($resultLoad);
	if($sqlRowLoad['amount'] >= $itemAmount){
		
		
		
		$loadId = $sqlRowLoad['id'];
		//less amount doing
		
		$oneStone2BirdsSql = "UPDATE item_amount SET amount = amount - $itemAmount WHERE item_amount.id = $loadId;";
		$oneStone2BirdsResult = $conn->query($oneStone2BirdsSql);
		
		//TRANSFER STOCK ADDIG NEW CNE
		$tStock['data'][0]['msid'] = $loadId;
		$tStock['data'][0]['a'] = $itemAmount;
		//TRANSFER STOCK ADDIG NEW CNE
		$tmpJSON= json_encode($tStock['data'][0]);
		
		
		//////////////////////////////////////////////////////////
		///
		/// 2018 / 11 / 18
		/// NEW Vehicle stock loading method
		///
		//////////////////////////////////////////////////////////
		
		$sqlFindTodayTS ="SELECT * FROM t_stock WHERE vehicle_id = $vehicleId AND item_id = $itemId AND date = curdate()";
		if($co->getNumRow($sqlFindTodayTS) == 0){
			$sqlAddStockToVehicle = "INSERT INTO t_stock (id, vehicle_id, item_id, amount, amount_id, date,remainStock,s) VALUES (NULL, '$vehicleId', '$itemId', '$itemAmount', '$tmpJSON', curdate(),'$itemAmount',0);";
			$resultAddStockToVehicle = $conn->query($sqlAddStockToVehicle);
		}else{
			//this is for find the id of that vehicle stock
			$resultFindTodayTS = $conn->query($sqlFindTodayTS);
			
			
			$tmpSql = "UPDATE t_stock SET amount = amount + 200, amount_id = '$tmpJSON' WHERE t_stock.id = 92;";
			$updRe = $conn->query($tmpSql);
		}
		
		
		//////////////////////////////////////////////////////////
		///
		/// 2018 / 11 / 18
		///New vehicle stock loading method
		///
		//////////////////////////////////////////////////////////
		
		
		echo("Available amount in stock is ");
		echo($sqlRowLoad['amount'] - $itemAmount);
		echo("<br>Stock id - ");
		echo($sqlRowLoad['id']);
		//less amount doing ending
	}else{
		$reqvestAmount = $itemAmount;
		$remainAmount = $itemAmount;
		//prob
		$x = 0;
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
					//TRANSFER STOCK ADDIG NEW CNE
					$tStock['data'][$x]['msid'] = $tempId;
					$tStock['data'][$x]['a'] = $tempAmount;
				
					$tmpJSON= json_encode($tStock['data'][$x]);
					//TRANSFER STOCK ADDIG NEW CNE
					$sqlAddVStock = "INSERT INTO t_stock (id, vehicle_id, item_id, amount, amount_id, date,remainStock,s) VALUES (NULL, '$vehicleId', '$itemId', '$tempAmount', '$tmpJSON', curdate(),'$tempAmount',0);";
					$resultAddVStock = $conn->query($sqlAddVStock);
					$sqlUpdateMainStock = "UPDATE item_amount SET amount = amount - $tempAmount WHERE item_amount.id = $tempId;";
					$resultUpdateMainStock = $conn->query($sqlUpdateMainStock);
				}
			else{
				echo($remainAmount);
				//TRANSFER STOCK ADDIG NEW CNE
					$tStock['data'][$x]['msid'] = $tempId;
					$tStock['data'][$x]['a'] = $remainAmount;
					$tmpJSON= json_encode($tStock['data'][$x]);
				//TRANSFER STOCK ADDIG NEW CNE
				$sqlAddVStock = "INSERT INTO t_stock (id, vehicle_id, item_id, amount, amount_id, date,remainStock,s) VALUES (NULL, '$vehicleId', '$itemId', '$remainAmount', '$tmpJSON', curdate(),'$tempAmount',0);";
					$resultAddVStock = $conn->query($sqlAddVStock);
				$sqlUpdateMainStock = "UPDATE item_amount SET amount = amount - $remainAmount WHERE item_amount.id = $tempId;";
					$resultUpdateMainStock = $conn->query($sqlUpdateMainStock);
				$remainAmount = 0;
				
				echo("+");
				echo("in else");
			}
			
			$x++;
		}
		//prob
		echo("Posion method");
	}
	//find first stock amount is higher than the requested amount
	$Loading = $itemAmount;
	
}
else{
	
	
	if($currentAmount == NULL){
		echo("OUT OF STOCK<br>");
	}
	else{
		echo("<br>Stock adding is can not be done.<br>");
		echo("Available amount is ");
		echo($currentAmount);
	}
}

///Available stock amount find ending
//$sql = "";
//$result = $conn->query($sql);

?>
<?php $conn->close(); ?>