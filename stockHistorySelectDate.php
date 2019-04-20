<?php
include("db.php");
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
$main = new basic;
$main->modal();
$vehicleId = $_GET['vehicleId'];
$link = "ajaxCommonGetFromNet('".$url."stockHistory.php', 'mainStage')";
$main->menuBar("Stock History".$vehicleId,$link);

?>
<input type="date" onChange="stockHistoryByDate(this.value,<?php echo($vehicleId) ?>)">
<?php $conn->close(); ?>