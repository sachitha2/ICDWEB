<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");


$co = new DB;
$co->dataConn($conn);
$numR = $co->getNumRow("SELECT * FROM item_amount");
if($numR == 0){
	$sqlI = "SELECT * FROM item";
	$resultI = $conn->query($sqlI);
	while($row = mysqli_fetch_assoc($resultI)){
		$sql = "INSERT INTO `item_amount` (`id`, `item_id`, `amount`, `b_price`, `date`, `loadedAmount`, `exDate`, `c`, `s`) VALUES (NULL, '".$row['id']."', '1000', '10', '2018-12-18', '1000', '2018-12-13', '1', '1');";
		$result = $conn->query($sql);
	}

}else{
	echo("delete data<br>");
}


?>
<?php $conn->close(); ?>
this is ms dump