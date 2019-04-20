<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");
?>



<?php

$shopId = $_REQUEST["shopId"];

$basic = new basic;
$basic->modal();


$lin = "sellPageGet($shopId)";

$basic = new basic;
$basic->menuBar("Shop History",$lin);


//creating bill
$t=round(microtime(true) * 1000);//time();
$totalId = $t;
$sqlBill = "INSERT INTO total (id, total,place,billNumber,shopId,date,time,user) VALUES ($t, '0','0','$totalId','$shopId',curdate(),curtime(),0);";
if ($conn->query($sqlBill) === TRUE) {
    $last_id = $conn->insert_id;
	echo($last_id);
   
} else {
    echo "Error: " . $sqlBill . "<br>" . $conn->error;
}

//get driver or home id
$sqlGetDriver = "SELECT * FROM total WHERE id = $totalId ";
$resultGetDriver = $conn->query($sqlGetDriver);
$rowGetDriver = mysqli_fetch_assoc($resultGetDriver);
$driverId = $rowGetDriver['Place'];
	?>
	
	<div  class="addStcok">
	<h1>Bill number - <?php 	echo($last_id); ?></h1>
		<h1>Enter Item Id</h1>
	  	 <input type="number" id="itemId" style="font-size: 20px;color: black;" onKeyPress="enterCheckItemAvailability(event,itemId.value,<?php echo($shopId) ?>,<?php echo($last_id)?>)">
		<div id="tOutPut">
			bill
			
		</div>
		
		<button onClick="finishBtnClick()">Finish</button>
	</div>
	<div class="stockPre" id="billTable">	
		
		<?php
			$sqlGetBill = "SELECT * FROM sell WHERE total_id = $totalId;";
			$resultGetBill = $conn->query($sqlGetBill);
			while($rowGetBill = mysqli_fetch_assoc($resultGetBill)){
				echo(rowGetBill['id']);
			}
		?>
			
	</div>
		
	<?php $conn->close(); ?>
	
