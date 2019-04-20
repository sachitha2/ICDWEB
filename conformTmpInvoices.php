xa<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");

$timezone  = +5.30; 
$date =  gmdate("Y-m-j", time() + 3600*($timezone+date("I")));

$shopId = $_GET['shopId'];
$invoiceN = $_GET['invoiceN'];
$vehicleId = $_GET['vehicleId'];

echo("Shop id - ".$shopId);
echo("<br>");

echo("invoiceN- ".$invoiceN);
echo("<br>");

echo("vehicleId- ".$vehicleId);
echo("<br>");

$co = new DB;
$co->dataConn($conn);

$sql = "UPDATE tmpInvoices SET s = 0 WHERE tmpInvoices.id = $invoiceN;";
$result=$conn->query($sql);

///get total from tmp invoices
$sqlGetTmpTotal = "SELECT * FROM tmpInvoices WHERE id = $invoiceN";
$resultGetTmpTotal = $conn->query($sqlGetTmpTotal);
$rowGetTmpTotal = mysqli_fetch_assoc($resultGetTmpTotal);
///get total from tmp invoices

$invoiceNN = $rowGetTmpTotal['invoiceN'];
////getTotalFromTmpStock
	$sqlTmpStockTotalGetting = "SELECT * FROM tmpStock WHERE invoiceN LIKE '$invoiceNN' ORDER BY invoiceN ASC";
	$resultTmpStockTotalGetting=$conn->query($sqlTmpStockTotalGetting);
    $total = 0;
	while($rowTmpStockTotalGetting = mysqli_fetch_assoc($resultTmpStockTotalGetting)){
		echo($rowTmpStockTotalGetting['id']);
		$total+=$rowTmpStockTotalGetting['selectedPrice'] * $rowTmpStockTotalGetting['qty'];
		echo("<br>");
		echo("totla is $total");
	}
		

////getTotalFromTmpStock

///shop credit cne eka
$cash = $rowGetTmpTotal['cash'];
echo("<br>");
echo("Cash - $cash");
echo("<br>");

///shop credit cne eka


$t=round(microtime(true) * 1000);//time();
$totalId = $t;
$sqlBill = "INSERT INTO total (id, total,place,billNumber,shopId,date,time,user,s,receivedAmount) VALUES ($t, '$total','0','$invoiceNN','$shopId','$date',curtime(),$vehicleId,1,$cash);";
if ($conn->query($sqlBill) === TRUE) {
    $last_id = $conn->insert_id;
	//echo($last_id);
   
} else {
    echo "Error: " . $sqlBill . "<br>" . $conn->error;
}
echo("Invoice number is - ");
echo($invoiceNN);

$sqlGetTmpstock = "SELECT * FROM tmpStock WHERE invoiceN LIKE '%".$invoiceNN."%' ORDER BY invoiceN ASC;";
$resultTmpStock = $conn->query($sqlGetTmpstock);
$billTotal = 0;
while($rowtmpStock = mysqli_fetch_assoc($resultTmpStock)){
	echo("<br>");
	echo($rowtmpStock['invoiceN']);
	$amount = $rowtmpStock['qty'];
	$stockId = $rowtmpStock['stockId'];
	$sellingPrice =  $rowtmpStock['selectedPrice'];
	$itemId = $co->getItemIdFromstockId($stockId);
	$tmp = "INSERT INTO sell (id, item_id, item_price_range_id, amount, shop_id, date, stock_id, total_id, time, selling_price, user) VALUES (NULL, '$itemId', '0', '$amount', '$shopId', '$date', '$stockId', '$last_id', curtime(), '$sellingPrice', $vehicleId);";
	$conn->query($tmp);
	$id = $rowtmpStock['id'];
	$sqlTmpR = "UPDATE tmpStock SET r = '$last_id' WHERE tmpStock.id = $id;";
	$resultTmpR = $conn->query($sqlTmpR);
	$billTotal += $amount * $sellingPrice;
	
	
	
	
	
}
///get total of that bill
///2018/11/17 editing
///TODO
//$shopSql = "SELECT * FROM shop WHERE id = $shopId ";
//$result = $conn->query($shopSql);
//$rowShop = mysqli_fetch_assoc($shopSql);

//$preCredit = $rowShop['credit'];
$newCredit = $rowGetTmpTotal['credit'];
//$payidTotal = $rowGetTmpTotal['cash'];
//$billTotal;

$sqlUpdateShopCredit="UPDATE shop SET credit = {$newCredit} WHERE shop.id = $shopId;";
$conn->query($sqlUpdateShopCredit);


?>
<?php $conn->close(); ?>