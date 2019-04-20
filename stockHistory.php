<?php 
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");
$co = new DB;
$co->dataConn($conn);

$menu = new basic;
$menu->menuBar("History of Vehicles","getVehiclePageLoader()");


$menu->modal();

?>
<?php
include("db.php");
$sql = "SELECT * FROM vehicle WHERE status = 1 ";
$result = $conn->query($sql);
while($row = mysqli_fetch_assoc($result)){
	?>
	<!---------------->
	<center>
	<div class="divList card-deck mb-3 text-center " style="background-color: white;color: black;border: 1px solid black">
        <div class="card mb-4 shadow-sm">
          <div class="card-header" style="border-bottom: solid 1px black">
			  
            <h1 class="my-0 font-weight-normal text-primary"> <?php echo($row['username']); ?></h1>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title"><?php echo($co->getNumRow("SELECT * FROM t_stock WHERE vehicle_id = ".$row['id']." AND s = 1")) ?>  <small class="text-muted">/ Number of Items </small></h1>
            <h1 class="card-title pricing-card-title">
            	RS <?php echo(round($co->getSumOfATable("tmpInvoices","cash"," WHERE invoiceN LIKE '%".$row['id']."-%' AND s = 1"),2)) ?>
            
            <small class="text-muted">/ Cash</small></h1>
            
            <h1 class="card-title pricing-card-title">
            	RS <?php echo(round($co->getSumOfATable("tmpInvoices","credit"," WHERE invoiceN LIKE '%".$row['id']."-%' AND s = 1"),2)) ?> 
            
            <small class="text-muted">/ Creadit</small></h1>
            <h1 class="card-title pricing-card-title">
            	RS 0 
            <small class="text-muted">/ Total</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Vehicle number <?php echo($row['number']); ?></li>
              <li></li>
              <li></li>
            </ul>
            
			<button class="btn btn-primary btn-lg" onClick='ajaxCommonGetFromNet("<?php echo($url) ?>stockHistorySelectDate.php?vehicleId=<?php echo($row['id']) ?>", "mainStage");'>View</button>
			  <div>user id <?php echo($row['id']); ?></div>
          </div>
        </div>
        
        </div>
        </center>
	<!---------------->

	
<!--
	<div class="tileButton" style="width: 800px;text-align: left" onClick='ajaxCommonGetFromNet("<?php echo($url) ?>stockHistorySelectDate.php?vehicleId=<?php echo($row['id']) ?>", "mainStage");'>
		<table width="100%">
			<tr>
				<td width="300px">
					<img src="vehicleStock.png">
				</td>
				<td>
					
					<table>
						<tr>
							<td width="300px">Vehicle Number </td>
							<td><?php echo($row['number']); ?></td>
						</tr>
						<tr>
							<td>Number of Items</td>
							<td></td>
						</tr>
						<tr>
							<td>Driver Name</td>
							<td><?php echo($row['username']); ?></td>
						</tr>
						<tr>
							<td>Vehicle id</td>
							<td><?php echo($row['id']); ?></td>
						</tr>
					</table>
					 
				</td>
			</tr>
		</table>
		
	
	</div><br><br>
-->
	<?php
}

?>
<?php $conn->close(); ?>