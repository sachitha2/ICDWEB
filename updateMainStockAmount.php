<?php
header('Access-Control-Allow-Origin: *'); 
?>



<?php
$amount = $_GET['amount'];
$id = $_GET['id'];
$bPrice = $_GET['bPrice'];
$exDate = $_GET['exDate'];
include("db.php");
$sql = "INSERT INTO item_amount (id, item_id, amount, b_price, date,loadedAmount,exDate,c) VALUES (NULL, '$id', '$amount', '$bPrice', curdate(),$amount,'$exDate',0);";
$result = $conn->query($sql);
echo($exDate);
?>
<?php $conn->close(); ?>