<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");
$tId=$_GET['tId'];
$vId=$_GET['vId'];
echo("tid - ".$tId);
echo("<br>");
echo("vId - ".$vId);


$co = new DB;
$co->dataConn($conn);
$logic = "WHERE id = $tId";
$invoiceN = $co->slctOneClmnFTbl("tmpInvoices","invoiceN",$logic);

$logic = "WHERE id = $tId";
$x = $co->delById("tmpInvoices",$logic);

echo("<br>");
echo($x);
echo("<br>");

///deleting tmp stock
$logic = "WHERE invoiceN LIKE '$invoiceN'";

$y = $co->delById("tmpStock",$logic);
echo("<br>");
echo($y);
echo("<br>");
?>
<?php $conn->close(); ?>