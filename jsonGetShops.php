<?php
include("URD.php");
include('db.php');
$shop = array (
  'shop' => 
  array (
    0 => 
    array (
      /*'id' => 0,
      'name' => '',
	  'address' => '',
	  'tpNumber' =>'',
	  'rootId'=>0,
	  'rDate'=>'',
	  'idCardN'=>''*/
    ),
  ),
);
$sql="SELECT * FROM shop WHERE status = 1";
$result = $conn->query($sql);
$x = 0;
while($row=mysqli_fetch_assoc($result)){
$shop['shop'][$x]['id'] = $row['id'];
$shop['shop'][$x]['name'] = $row['name'];
$shop['shop'][$x]['address'] = $row['address'];
$shop['shop'][$x]['tpNumber'] = $row['tp'];
$shop['shop'][$x]['rootId'] = $row['root_id'];
$shop['shop'][$x]['rDate'] = $row['r_date'];
$shop['shop'][$x]['idCardN'] = $row['idCardN'];
$shop['shop'][$x]['credit'] = $row['credit'];
 $x++;
}

$myJSON = json_encode($shop);
echo $myJSON;

$conn->close();
?>