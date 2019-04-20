<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");

$shopId = $_GET['shopId'];
$billId = $_GET['billId'];
$co = new DB;
$co->dataConn($conn);
$lin = "billHistory($shopId)";
$basic = new basic;
$basic->menuBar("tmp Invoices - ".$shopId,$lin);

$sqlGetTmpInvoices = "SELECT * FROM tmpInvoices WHERE invoiceN LIKE '%$vehicleId-%' AND s = 1";
$reusltGetTmpInvoices = $conn->query($sqlGetTmpInvoices);

$basic->modal();
echo("<br>");
echo($billId);
?>
<h1>Shop history view bill</h1>
<?php $conn->close(); ?>