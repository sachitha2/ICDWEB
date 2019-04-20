<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
$pass = $_GET['pass'];
$pass = md5($pass);
$cPass = md5("Az09");

if($pass == $cPass){
	$tables = ['tmpInvoices' , 
			   'cost',
			   'history',
			   'inComing',
			   'money',
			   'sell',
			   'tmpData',
			   'tmpStock',
			   'total',
			   't_stock',
			   'URD',
			   'item_amount'];
		echo("<br>password is correct<br>");
		//print_r($tables);
		$aLen = sizeof($tables);
	for($y=0;$y<$aLen;$y++){
		$sql = "TRUNCATE TABLE ".$tables[$y].";";
		$result = $conn->query($sql);
		
		if($result){
			echo($tables[$y]." flush done<br>");
		}
		else{
			echo($tables[$y]." flush failed<br>");
		}
		}
	$sql = "UPDATE shop SET credit = '0';";
	$result = $conn->query($sql);
	if($result){
		echo("shop credit rest Done");
	}else{
		echo("shop credit reset failed");
	}
	
}
else{
	echo("<br>enter correct password<br>");
}
?>
<?php $conn->close(); ?>