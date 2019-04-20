<?php
 include("db.php");
 include("URD.php");
$stock = array (
  'stock' => 
  array (
    0 => 
    array (
     /*
	 'id' => 0,
	  'name'=>'Ice cream',
      'amount' => 100,
	  //'amountId'=>1,
	  'date'=>'2018-06-10',
	  'bPrice'=>100,
	  'priceRange'=>array(0=>10,1=>20)
	  */
    ),
  ),
);
 $uName = $_GET['uName'];
 $sql = "SELECT * FROM t_stock WHERE  s = 1 AND vehicle_id = (SELECT id FROM vehicle WHERE username = '$uName') ";
 $result = $conn->query($sql);
$x=0;
 while($row = mysqli_fetch_assoc($result)){
	$stock['stock'][$x]['id'] = $row['id'];
	 
	 
	 $sqlGetName = "SELECT * FROM item WHERE id = ".$row['item_id']." ";
	 $resultGetName = $conn->query($sqlGetName);
	 $rowGetName = mysqli_fetch_assoc($resultGetName);
	 //2018 07 07
	 $itemId =  $rowGetName['itemTypeId'];
	 $sqlGetItemTypeName = "SELECT * FROM item_type WHERE id = $itemId;";
	 $resultGetItemTypeName = $conn->query($sqlGetItemTypeName);
	 $rowGetItemTypeName = mysqli_fetch_assoc($resultGetItemTypeName);
	 // echo($rowGetItemTypeName['name']);
	 //echo("<br>");
	$stock['stock'][$x]['name'] = $rowGetItemTypeName['name']."-".$rowGetName['name']; 
	 $stock['stock'][$x]['itemId'] = $rowGetName['id'];
	 
	 
	 //get buying price
	 $sqlGetBPrice = "SELECT * FROM item_amount WHERE item_id = ".$row['item_id'].";";
	 $resultGetBPrice = $conn->query($sqlGetBPrice);
	 $rowGetBPrice = mysqli_fetch_assoc($resultGetBPrice);
	 
	 //end of get buying price
	$stock['stock'][$x]['bPrice'] = $rowGetBPrice['b_price']; 
	 
	$stock['stock'][$x]['amount'] = $row['amount'];
	$stock['stock'][$x]['amount_id'] = $row['amount_id'];
	$stock['stock'][$x]['date'] = $row['date']; 
	 $sqlPriceRange = "SELECT * FROM item_price_range WHERE item_id = ".$row['item_id'].";";
	 $resultPriceRange = $conn->query($sqlPriceRange);
	 $y=0;
	 while($rowPriceRange = mysqli_fetch_assoc($resultPriceRange)){
		 $stock['stock'][$x]['priceRange'][$y] = $rowPriceRange['price'];
	 	
		 $y++;
	 }
	 
	 $x++;
 }
$myJSON = json_encode($stock);
echo $myJSON;
?>