<?php
include("db.php");
include("URD.php");
$uName = $_GET['uName'];
$uPass = $_GET['uPass'];
///echo($uName);
//echo($uPass);
$hashedPass= md5($uPass);
$sql="SELECT * FROM user WHERE username LIKE '$uName' AND password LIKE '$hashedPass';";
$result = $conn->query($sql);
$numRows = mysqli_num_rows($result);
//$sqlResult = mysqli_fetch_assoc($result);
$arry = array (
  'satus' => 0,
  'Messege' => '',
  'logOutTime' => 4
);
if($numRows == 0){
	$arry['satus'] = 0;
	$arry['Messege'] = 'Invalid login credentials';
}
else{
	$arry['satus'] = 1;
	$arry['Messege'] = 'Login Success';
}
//echo($sqlResult['username']);
$jsonObject = json_encode($arry);
echo($jsonObject);
?>