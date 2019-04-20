<?php
header('Access-Control-Allow-Origin: *'); 
?>
<div style="color:black">Addvehicle.php</div>
<?php
include("db.php");
$vehicleNumber  = $_REQUEST['vehicleNumber'];
$sql = "SELECT * FROM vehicle WHERE number = '$vehicleNumber';";
$result = $conn->query($sql);
$numRow = mysqli_num_rows($result);
if($numRow == 0){
	echo($vehicleNumber);
	$sql = "INSERT INTO vehicle (id, root_id, number, driver_id, status) VALUES (NULL, '0', '$vehicleNumber', '0', '0');";
	$result = $conn->query($sql);
	echo("Successfully added to the database");
}else{
	?>
	
		<div style="color: red">Duplicate entry</div>
	
	<?php
}

?>