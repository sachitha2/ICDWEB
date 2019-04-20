
<?php
include("db.php");
$vehicleId = $_REQUEST['vehicleId'];
//search vehicle
$sql = "SELECT * FROM vehicle WHERE id = $vehicleId";
$result = $conn->query($sql);
$row = mysqli_num_rows($result);

if($row ==1){
	echo($row);
	$sql = "DELETE FROM vehicle WHERE vehicle.id = $vehicleId;";
	$result = $conn->query($sql);
}
else{
	echo("vehicle not found");
}
?>