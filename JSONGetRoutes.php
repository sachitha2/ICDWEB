<?php
 include("db.php");
 $sql = "SELECT * FROM  root";
 $result = $conn->query($sql);
$x=0;



 while($row = mysqli_fetch_assoc($result)){
//	print_r($row);
	 
	 $data['id'][$x] = (int)$row['id'];
	 $data['routeName'][$x] = $row['name'];
	 
	 
	 $x++;
 }
$myJSON = json_encode($data);
echo $myJSON;
?>