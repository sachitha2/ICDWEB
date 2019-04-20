<?php
include('db.php');
$items = array (
  'items' => 
  array (
    0 => 
    array (
      //'id' => 0,
      //'name' => 'sam',
    ),
  ),
);
$sql="SELECT * FROM item WHERE status = 1";
$result = $conn->query($sql);
$x = 0;
while ($row=mysqli_fetch_assoc($result)){
 $itemTypeId = $row['itemTypeId'];
 $sqlGetItemType = "SELECT * FROM item_type WHERE id =  $itemTypeId";
 $resultGetItemType = $conn->query($sqlGetItemType);
 $rowGetitemType = mysqli_fetch_assoc($resultGetItemType);
 $items['items'][$x]['id'] = $row['id'];
 $items['items'][$x]['name'] = $rowGetitemType['name']."-".$row['name'];
 $x++;
	
}

$myJSON = json_encode($items);
echo $myJSON;

?>
<?php $conn->close(); ?>