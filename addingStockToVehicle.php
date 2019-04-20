<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");


$timezone  = +5.30; 
$time =  gmdate("Y-m-j", time() + 3600*($timezone+date("I"))); 


$co = new DB; $co->dataConn($conn);
	$itemId = $_GET['itemId'];
	$itemAmount = $_GET['itemAmount'];
	$reA = $itemAmount;
	$vehicleId = $_GET['vehicleId'];
	$mainSId = 0;
	$tStock =array('data'=>array(),);

//Find Available stock amount
$sqlFindAvailableStockAmount = "SELECT SUM(amount) FROM item_amount WHERE item_id = $itemId AND amount != 0 AND s = '1'";
$resultFindAvailableStockAmount = $conn->query($sqlFindAvailableStockAmount);
$availableStockAmount = mysqli_fetch_assoc($resultFindAvailableStockAmount);
$currentAmount = $availableStockAmount['SUM(amount)'];

//search JSON 
$sqlJSON = "SELECT * FROM t_stock WHERE vehicle_id = $vehicleId AND item_id = $itemId AND date = '$time'";
$resultJSON = $conn->query($sqlJSON);
$rowJSON = mysqli_fetch_assoc($resultJSON);
$jdata = $rowJSON['amount_id'];
$sqlForJSON = "SELECT * FROM t_stock WHERE vehicle_id = $vehicleId AND item_id = $itemId AND date = '$time'";
		if($co->getNumRow($sqlForJSON) != 0){
			$convJson = json_decode($jdata,true);
			$tStock = $convJson;
		}

//echo("<br>");
//echo($rowJSON['amount_id']);
//echo("<br>");
//print_r($convJson);
//echo("<br>");
//Search json
//echo("c amount".$currentAmount);
//echo("<br>");
//echo("r amount - ".$itemAmount);
//echo("<br>");
if($currentAmount >= $itemAmount){
	///make it visible to that page
	$sqlVisible = "UPDATE t_stock SET s = '0'  WHERE vehicle_id = $vehicleId AND item_id = $itemId AND date = '$time' ";
	$queryVisible = $conn->query($sqlVisible);

	///make it visible to that page ending
	//find first stock amount is higher  than the requested amount
	$sqlLoad = "SELECT * FROM  item_amount WHERE item_id = $itemId AND amount !=0 ORDER BY  item_amount . date  ASC";
	$resultLoad = $conn->query($sqlLoad);
	$sqlRowLoad = mysqli_fetch_assoc($resultLoad);

	///////
		
		
		
	///////
	
	if($sqlRowLoad['amount'] >= $itemAmount){
		
		
		
		$loadId = $sqlRowLoad['id'];
		//less amount doing
		
		$oneStone2BirdsSql = "UPDATE item_amount SET amount = amount - $itemAmount WHERE item_amount.id = $loadId;";
		$oneStone2BirdsResult = $conn->query($oneStone2BirdsSql);
		
		//TRANSFER STOCK ADDIG NEW CNE
		//echo("<br>");
		//echo(sizeof($convJson['data']));
		//echo("<br>");
		if(isset($convJson['data'][$loadId])){
			
			
			//echo("hello thi<br>");
			$tStock['data'][$loadId] = $itemAmount + ($convJson['data'][$loadId]);
		}
		else{
			(int)$len = sizeof($convJson['data']);
			
			$tStock['data'][$loadId] =$itemAmount ;
			
		}
		//$tStock['data'][0]['a'] = $itemAmount;
		//TRANSFER STOCK ADDIG NEW CNE
		$tmpJSON= json_encode($tStock);
		
		
		//////////////////////////////////////////////////////////
		///
		/// 2018 / 11 / 18
		/// NEW Vehicle stock loading method
		///
		//////////////////////////////////////////////////////////
		
		$sqlFindTodayTS ="SELECT * FROM t_stock WHERE vehicle_id = $vehicleId AND item_id = $itemId AND date = '$time'";
		if($co->getNumRow($sqlFindTodayTS) == 0){
			////echo("<br>");
			////echo("hello sams");
			////echo("<br>");
			
			$sqlAddStockToVehicle = "INSERT INTO t_stock (id, vehicle_id, item_id, amount, amount_id, date,remainStock,s) VALUES (NULL, '$vehicleId', '$itemId', '$itemAmount', '$tmpJSON', '$time','$itemAmount',0);";
			$resultAddStockToVehicle = $conn->query($sqlAddStockToVehicle);
		}else{
			//this is for find the id of that vehicle stock
			$resultFindTodayTS = $conn->query($sqlFindTodayTS);
			$rowFindTodayTS = mysqli_fetch_assoc($resultFindTodayTS);
			
			$tmpSql = "UPDATE t_stock SET amount = amount + $itemAmount , amount_id = '$tmpJSON',remainStock = remainStock + $itemAmount WHERE t_stock.id = ".$rowFindTodayTS['id'].";";
			$updRe = $conn->query($tmpSql);
		}
		
		
		//////////////////////////////////////////////////////////
		///
		/// 2018 / 11 / 18
		///New vehicle stock loading method
		///
		//////////////////////////////////////////////////////////
		
		
		echo("Available amount in stock is ");
		echo($sqlRowLoad['amount'] - $reA);
		//echo("<br>");
		//echo($reA);
		//echo("<br>Stock id - ");
		//echo($sqlRowLoad['id']);
		//less amount doing ending
	}else{
		$reqvestAmount = $itemAmount;
		$remainAmount = $itemAmount;
		//prob
		$x = 0;
		
		if($co->getNumRow($sqlForJSON) == 0){
			$sqlAddStockToVehicle = "INSERT INTO t_stock (id, vehicle_id, item_id, amount, amount_id, date,remainStock,s) VALUES (NULL, '$vehicleId', '$itemId', '0', 'tmpJSON', '$time','0',0);";
			$resultAddStockToVehicle = $conn->query($sqlAddStockToVehicle);
			//echo("<br>--------------that cne-------------<br>");
			//echo("<br>");
		}
		////echo("<br>-----------------going into while<br>");
		while($remainAmount >0){
			
			$getFRowSql = "SELECT * FROM  item_amount WHERE item_id = $itemId AND amount !=0 ORDER BY  item_amount . date  ASC";
			
			$getFRowResult = $conn->query($getFRowSql);
			$getFRow = mysqli_fetch_assoc($getFRowResult);
			$tempAmount = $getFRow['amount'];
			$tempId = $getFRow['id'];
			$loadId = $tempId;
			if($remainAmount > $tempAmount){
				
					$remainAmount = $remainAmount - $tempAmount;
					//echo("Temp amoutn is".$tempAmount);
					//echo("+");
					//echo("in if");
					//echo("<br>");
					//echo("<br>------------------------------------------<br>");
					//echo(sizeof($convJson['data']));
					//echo("<br>");
						if(isset($convJson['data'][$loadId])){
							//echo("hello thi<br>");
							$tStock['data'][$loadId] = $tempAmount + ($convJson['data'][$loadId]);
						}
						else{
							//echo("<br>testing one<br>");
							$tStock['data'][$loadId] =$tempAmount ;
						}
					//$tStock['data'][0]['a'] = $itemAmount;
					//TRANSFER STOCK ADDIG NEW CNE
						$tmpJSON= json_encode($tStock);
						//echo("<br>------------------------------------------<br>IF");
						//echo($tmpJSON= json_encode($tStock));
						//echo("<br>------------------------------------------<br>");
						//select id of item
						$sqlFindTodayTS ="SELECT * FROM t_stock WHERE vehicle_id = $vehicleId AND item_id = $itemId AND date = '$time'";
						$resultFindTodayTS = $conn->query($sqlFindTodayTS);
						$rowFindTodayTS = mysqli_fetch_assoc($resultFindTodayTS);
						$idFindTodayTs = $rowFindTodayTS['id'];
						$sqlAddVStock = "UPDATE t_stock SET amount = amount + $tempAmount , amount_id = '$tmpJSON',remainStock = remainStock + $tempAmount  WHERE t_stock.id = ".$idFindTodayTs.";";
						
						//
					//$sqlAddVStock = "INSERT INTO t_stock (id, vehicle_id, item_id, amount, amount_id, date,remainStock,s) VALUES (NULL, '$vehicleId', '$itemId', '$tempAmount', '$tmpJSON', '$time','$tempAmount',0);";
					
					$resultAddVStock = $conn->query($sqlAddVStock);
					$sqlUpdateMainStock = "UPDATE item_amount SET amount = amount - $tempAmount WHERE item_amount.id = $tempId;";
					$resultUpdateMainStock = $conn->query($sqlUpdateMainStock);
				}
			else{
				//echo("remain amount is".$remainAmount);
				//TRANSFER STOCK ADDIG NEW CNE
				//echo("<br>------------------------------------------<br>");
					if(isset($convJson['data'][$loadId])){
			
			
					(int)$x =$len + 1;
//					echo("hello thi<br>");
					$tStock['data'][$loadId] = $remainAmount + ($convJson['data'][$loadId]);
					}
					else{
//						echo("<br>testing two in else<br>");
						$tStock['data'][$loadId] =$remainAmount ;
			
					}
					//$tStock['data'][0]['a'] = $itemAmount;
					//TRANSFER STOCK ADDIG NEW CNE
//					echo("<br>------------------------------------------<br>else");
					$tmpJSON= json_encode($tStock);
					echo("<br>------------------------------------------<br>");
				//TRANSFER STOCK ADDIG NEW CNE
				$sqlFindTodayTS ="SELECT * FROM t_stock WHERE vehicle_id = $vehicleId AND item_id = $itemId AND date = '$time'";
						$resultFindTodayTS = $conn->query($sqlFindTodayTS);
						$rowFindTodayTS = mysqli_fetch_assoc($resultFindTodayTS);
						$idFindTodayTs = $rowFindTodayTS['id'];
						$sqlAddVStock = "UPDATE t_stock SET amount = amount + $remainAmount , amount_id = '$tmpJSON' ,remainStock = remainStock + $remainAmount    WHERE t_stock.id = ".$idFindTodayTs.";";
				
				//$sqlAddVStock = "INSERT INTO t_stock (id, vehicle_id, item_id, amount, amount_id, date,remainStock,s) VALUES (NULL, '$vehicleId', '$itemId', '$remainAmount', '$tmpJSON', '$time','$tempAmount',0);";
					$resultAddVStock = $conn->query($sqlAddVStock);
				$sqlUpdateMainStock = "UPDATE item_amount SET amount = amount - $remainAmount WHERE item_amount.id = $tempId;";
					$resultUpdateMainStock = $conn->query($sqlUpdateMainStock);
				$remainAmount = 0;
				
//				echo("+");
//				echo("in else");
			}
			
			$x++;
		}
//		echo("<br>-----------------exite from  while<br>");
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