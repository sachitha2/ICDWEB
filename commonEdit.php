<?php
header('Access-Control-Allow-Origin: *'); 
if(isset($_REQUEST['table']) && $_REQUEST['id'] && $_REQUEST['name'] && $_REQUEST['value'] ){
	
	$table = $_REQUEST['table'];
	$id = $_REQUEST['id'];
	$name = $_REQUEST['name'];
	$value = $_REQUEST['value'];
	$sql = "UPDATE $table SET $name = '$value' WHERE $table.id = $id;";
	echo($sql);
	commonEdit($sql);
}
function commonEdit($sql){
	include('db.php');
	
	$result = $conn->query($sql);
	return("1");
	$conn->close();
}
	
?>
