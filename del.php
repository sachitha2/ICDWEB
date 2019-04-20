<?php
	header('Access-Control-Allow-Origin: *'); 
	include('db.php');
	
	
	

	if(isset($_GET['id']) && isset($_GET['tableName'])){
		$id = $_GET['id'];
		$tableName = $_GET['tableName'];
		echo($id);
		echo($tableName);
		$sql = "DELETE FROM $tableName WHERE $tableName.id = $id;";
		$result = $conn->query($sql);
	}
	
	
?>
<?php $conn->close(); ?>