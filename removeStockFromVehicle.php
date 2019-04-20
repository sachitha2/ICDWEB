<?php
header('Access-Control-Allow-Origin: *'); 
?>


<?php
include("db.php");

$id = $_GET['id'];
$sql = "SELECT * FROM t_stock WHERE id = $id";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$amountId = $row['amount_id'];
//echo($amountId);
$data = json_decode($amountId,true);
$dataA = $data['data'];
foreach($dataA as $x=>$x_value){
	echo($x."-".$x_value); 	
	//TDO 2018 12 18
	$amount  = $x_value;
	$sqlUpdate = "UPDATE item_amount SET amount = amount + $amount WHERE item_amount.id = $x;";
	$resultUpdate = $conn->query($sqlUpdate);
	
	$sqlReset = "DELETE FROM t_stock WHERE t_stock.id = $id";
	$resultReset = $conn->query($sqlReset);
	//TDO 2018 12 18
}

?>
<?php $conn->close(); ?>