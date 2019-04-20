<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");

include("db.php");
$vehicleId = $_GET['vId'];

$sql = "UPDATE t_stock SET s = 1 WHERE t_stock.s = 0 AND t_stock.vehicle_id = $vehicleId  ";

$conn->query($sql);

echo("DONE - ".$vehicleId);

?>
<?php $conn->close(); ?>