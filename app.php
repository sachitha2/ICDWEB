<?php
header('Access-Control-Allow-Origin: *');
include("db.php");
$name = $_GET['name'];
$nick = $_GET['nick'];

$sql = "INSERT INTO tmpData (id, data) VALUES (NULL, '$name');";
$conn->query($sql);
	
echo('{"data":100}');
?>
<?php $conn->close(); ?>