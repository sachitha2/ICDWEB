<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
include("func/DB.class.php");
include("func/basic.class.php");
$co = new DB; $co->dataConn($conn);
//$amountId = $_GET['aId'];
$remainedAmount = $_GET['rA'];

$id = $_GET['id'];

$getLoadeddAmountSql = "SELECT * FROM t_stock WHERE id = $id";

$resultgetLoadeddAmount =  $conn->query($getLoadeddAmountSql);
$rowGetLoadedAmount = mysqli_fetch_assoc($resultgetLoadeddAmount);
$loadeddAmo = $rowGetLoadedAmount['amount'];


$logic =  "WHERE id = $id";
$amountId = $co->slctOneClmnFTbl("t_stock","amount_id",$logic);

echo("loaded amount $loadeddAmo<br>--------------------<br>");
echo("Amount id - ".$amountId);
echo("<br>Remained amount");
echo($remainedAmount);
echo("<br>");
echo($id);
$soledA = $loadeddAmo - $remainedAmount;
$json = json_decode($amountId,true);
print_r($json);

///length of json array
$lenJ = sizeof($json['data']);
echo("length of json array - ".$lenJ);

//length of json array
if($lenJ == 1){
	
	
	foreach($json['data'] as $x=>$x_value)
  	{
  		echo "Key=" . $x . ", Value=" . $x_value;
  		echo "<br>";
  	}
	
	$amountId = $json['data'][$x];
	echo("<br>");
	echo($amountId);
	echo("<br>");
	echo("$x loaded amount is - ".$amountId);
	
	$sql = "UPDATE t_stock SET s = 2 WHERE t_stock.id = $id ;";	
	$result = $conn->query($sql);
	///move stock to main stock
	$wHSql = "UPDATE item_amount SET amount = (amount + $remainedAmount) WHERE item_amount.id = $x;";
	$wHResult = $conn->query($wHSql);
	///main wherehouse
}
else{
	$to = $soledA;
	echo("<br>else method calling for that cne<br>");
	$ar = array(0=>0);
	$arId = array(0=>0);
	$n = 0;
	
	foreach($json['data'] as $x=>$x_value){
		echo "Key=" . $x . ", Value=" . $x_value;
		
		$ar[$n] = $x_value;
		$arId[$n] =  $x ;
		$n++;
	}
  		print_r($ar);
		print_r($arId);
		/*if(!($soledA <= $x_value) ){
			$re = $soledA - $remainedAmount; 
			$sql = "UPDATE t_stock SET s = 2 WHERE t_stock.id = $x ;";	
			$result = $conn->query($sql);
			///move stock to main stock
			$wHSql = "UPDATE item_amount SET amount = (amount + $remainedAmount) WHERE item_amount.id = $x;";
			$wHResult = $conn->query($wHSql);
		}
		$soledA - $x_value;
		$to += $x_value;*/
		for($x = 0;$x< $n;$x++){
			echo("<br>-------------------------------------------");
			echo("ar ---- is".$ar[$x]);
			echo("arId ---- is".$arId[$x]);
			echo("<br>-------------------------------------------");
		
			if(($to != 0)){
				
				
				if($to  > $ar[$x]){
					echo("<br>");
					echo("skip ".$ar[$x]."<br>");
					//echo("soled amount".$ar[$x]."<br>");
					$to = 	$to - $ar[$x];
					
				}else{
					echo("skip ".$to."<br>");
					//echo("soled amount ".$to." <br.");
					//$to =	$x_value -$soledA;
					echo($ar[$x] - $to);
					////////////////////////////////////////////////////////////
					$sql = "UPDATE t_stock SET s = 2 WHERE t_stock.id = ".$id." ;";	
					$result = $conn->query($sql);
					///move stock to main stock
					$wHSql = "UPDATE item_amount SET amount = (amount + ".($ar[$x] - $to).") WHERE item_amount.id = ".$arId[$x].";";
					$wHResult = $conn->query($wHSql);
					//////////////////////////////////////////////////////////////////
					$to = 0;
				}
			}
			
			else{
				///thiyena ganama danna one
				echo("<br>else eke in");
				////////////////////////////////////////////////////////////
					$sql = "UPDATE t_stock SET s = 2 WHERE t_stock.id = ".$id." ;";	
					$result = $conn->query($sql);
					///move stock to main stock
					$wHSql = "UPDATE item_amount SET amount = (amount + ".($ar[$x]).") WHERE item_amount.id = ".$arId[$x].";";
					$wHResult = $conn->query($wHSql);
				//////////////////////////////////////////////////////////////////
				echo($ar[$x]);
			}
		
  	}
	
	
}

?>