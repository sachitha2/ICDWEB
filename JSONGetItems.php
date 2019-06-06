<?php
 include("db.php");
 include("func/DB.class.php");
	
	$co = new DB;
	$co->dataConn($conn);


 $sql = "SELECT * FROM  item";
 $result = $conn->query($sql);
$x=0;



 while($row = mysqli_fetch_assoc($result)){
//	print_r($row);
	 
	 $data['id'][$x] = (int)$row['id'];
	 $data['itemName'][$x] = $co->getItemNameByStockId($row['id'],0);
	 
	 
	 $x++;
 }
$myJSON = json_encode($data);
echo $myJSON;
?>