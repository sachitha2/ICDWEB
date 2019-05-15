<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
include("func/DB.class.php");
$co = new DB;
$co->dataConn($conn);
?>
  

  <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" id="mainModal" style="background-color: ;">
  <span class="close" onClick="hideModal()">&times;</span>
    <div class="" id="modalContent">
    	<h1>Loading</h1>
    
    </div>
  </div>

</div>
<hr width="100%">
<img src="back.png" width="90" height="90" onClick="getVehiclePageLoader()" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">Select Vehicle</div>
<hr width="100%">
<?php

$sql = "SELECT * FROM vehicle WHERE status = 1";
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
            
			<button class="btn btn-primary btn-lg" onclick="viewVehicleStock(<?php echo($row['id']); ?>)">View</button>
		  <button class="btn btn-danger btn-lg" onClick="addStockToVehiclePage(<?php echo($row['id']); ?>)">Add</button>
			  <div>user id <?php echo($row['id']); ?></div>
          </div>
        </div>
        
        </div>
        </center>
	<!---------------->
<!--
	<div class="tileButton"  style="width: 800px;text-align: left;height: auto"  onClick="addStockToVehiclePage(<?php echo($row['id']); ?>)"><?php //echo($row['id']); ?>
	
	
	<table width="100%">
			<tbody><tr>
				<td width="300px">
					<img src="vehicleStock.png">
				</td>
				<td>
					
					<table>
						<tbody><tr>
							<td width="300px">Vehicle Number </td>
							<td><?php echo($row['number']); ?></td>
						</tr>
						<tr>
							<td>Number of Items</td>
							<td><?php echo($co->getNumRow("SELECT * FROM t_stock WHERE vehicle_id = ".$row['id']." AND s = 1")) ?></td>
						</tr>
						<tr>
							<td>Driver Name</td>
							<td><?php echo($row['username']); ?></td>
						</tr>
						<tr>
							<td>Vehicle id</td>
							<td><?php echo($row['id']); ?></td>
						</tr>
					</tbody></table>
					 
				</td>
			</tr>
		</table>
	
	
	</div>
-->
	
	<?php
}
?>
<?php $conn->close(); ?>