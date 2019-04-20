<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
include("commonEdit.php");
$id = $_GET['id'];
$itemName = $_GET['name'];
$sql = "UPDATE item SET name = '$itemName' WHERE item.id = $id;";
echo(commonEdit($sql));
echo($itemName);

?>
<?php $conn->close(); ?>