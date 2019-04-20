<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
if(isset($_REQUEST['id']) && isset($_REQUEST['sql'])){
	
	$id = $_REQUEST['id'];
	$sql = $_REQUEST['sql'];
	//echo($sql);
	$result = $conn->query($sql);
}

?>

<?php $conn->close(); ?>