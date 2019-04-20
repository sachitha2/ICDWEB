<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");


$vehicleId = $_GET['vehicleId'];


$co = new DB;
$co->dataConn($conn);
$lin = "ajaxCommonGetFromNet('".$url."selectVehicleForTmpInvoices.php', 'mainStage');";
$basic = new basic;
$basic->menuBar("TMP Invoices - ".$vehicleId,$lin);

$sqlGetTmpInvoices = "SELECT * FROM tmpInvoices WHERE invoiceN LIKE '%$vehicleId-%' AND s = 1";
$reusltGetTmpInvoices = $conn->query($sqlGetTmpInvoices);

$basic->modal();



	
	
$fullTotal = 0;
	if($co->getNumRow($sqlGetTmpInvoices) != 0){
	
		?>
<center>
<div style="width: 50%">
	This is a tool bar , this is under construction
<!--
	<button class="btn btn-primary btn-lg btn-block" onClick="alert('This one is under construction')">Conform All</button>
	<button class="btn btn-danger btn-lg btn-block"  onClick="alert('This one is under construction')">Delete All</button>
-->
</div>
	
      
        
     

      
    
<!--<table id="table">
	<th>Id</th>
	<th>InvoiceId</th>
	<th>ShopName</th>
	<th>Cash</th>
	<th>Credit</th>
	<th>Total</th>
	<th class="disNonB">Conform</th>
	<th class="disNonB">View</th>-->
<?php
		
while($row = mysqli_fetch_assoc($reusltGetTmpInvoices)){
	$sqlTotal = "SELECT * FROM tmpStock WHERE invoiceN LIKE '".$row['invoiceN']."';";
	$resultTotal = $conn->query($sqlTotal);
	$total = 0;
	while($rowTotal = mysqli_fetch_assoc($resultTotal))
	{
	$total+=$rowTotal['selectedPrice'] * $rowTotal['qty'];
	
		
}
	
	
	?>
	<!--<tr>
		<td><?php echo($row['id']) ?></td>
		<td><?php echo($row['invoiceN']) ?></td>
		<td><?php echo($co->getShopNameById($row['shopId'])); ?></td>
		<td><?php echo($row['cash']) ?></td>
		<td><?php echo($row['credit']) ?></td>
		<td><?php echo($total) ?></td>
		<td class="disNonB" class="disNon"><button onClick="conformTmpInvoice(<?php echo($row['shopId']) ?>,<?php echo($row['id']) ?>,<?php echo($vehicleId) ?>)">Conform</button><button onClick="deleteTmpI1B1(<?php echo($row['id']) ?>,<?php echo($vehicleId) ?>);">Delete</button></td>
		<td class="disNonB"  class="disNon"><button onClick="viewTmpInvoiceOneByOne(<?php echo($row['id']) ?>,<?php echo($vehicleId) ?>,<?php echo($row['shopId']) ?>)"> View </button></td>
	</tr>-->
	<!--<tr >
		<td >
			
			
			
			
			
			
		</td>
		<td><button onClick="conformTmpInvoice(<?php echo($row['shopId']) ?>,<?php echo($row['id']) ?>,<?php echo($vehicleId) ?>)">Conform</button></td>
		<td><button onClick="deleteTmpI1B1(<?php echo($row['id']) ?>,<?php echo($vehicleId) ?>);">Delete</button></td>
		<td><button onClick="viewTmpInvoiceOneByOne(<?php echo($row['id']) ?>,<?php echo($vehicleId) ?>,<?php echo($row['shopId']) ?>)"> View </button></td>
		<td></td>
		<td></td>
	</tr>-->
	<!--NEW list-->
	<div class="divList card-deck mb-3 text-center "  style="background-color: white;color: black;border: 1px solid black">
        <div class="card mb-4 shadow-sm">
          <div class="card-header" style="border-bottom: solid 1px black">
			  
            <h1 class="my-0 font-weight-normal text-primary"><?php echo($co->getShopNameById($row['shopId'])); ?></h1>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">RS <?php echo($row['cash']) ?> <small class="text-muted">/ Cash</small></h1>
            <h1 class="card-title pricing-card-title">RS <?php echo($row['credit']) ?> <small class="text-muted">/ Credit</small></h1>
            <h1 class="card-title pricing-card-title">RS <?php echo($total) ?> <small class="text-muted">/ Total</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>Number of items</li>
              <li>Shop id</li>
              <li>TMP Bill id <?php echo($row['id']) ?></li>
            </ul>
            <button class="btn btn-primary btn-lg" onClick="conformTmpInvoice(<?php echo($row['shopId']) ?>,<?php echo($row['id']) ?>,<?php echo($vehicleId) ?>)">Conform</button>
			<button class="btn btn-danger btn-lg" onClick="deleteTmpI1B1(<?php echo($row['id']) ?>,<?php echo($vehicleId) ?>);">Delete</button>
			<button class="btn btn-secondary btn-lg"  onClick="viewTmpInvoiceOneByOne(<?php echo($row['id']) ?>,<?php echo($vehicleId) ?>,<?php echo($row['shopId']) ?>)"> View </button>
			  <div>Invoice number <?php echo($row['invoiceN']) ?></div>
          </div>
        </div>
        
        </div>
        <!--NEW list-->
	
	
	<?php
	
	$fullTotal += $total;
	
}
		?>
		<div class="divList card-deck mb-3 text-center "  style="background-color: white;color: black;border: 1px solid black">
        <div class="card mb-4 shadow-sm">
          <div class="card-header" style="border-bottom: solid 1px black">
			  
            <h1 class="my-0 font-weight-normal text-primary">Total</h1>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">RS <?php echo(round($co->getSumOfATable("tmpInvoices","cash"," WHERE invoiceN LIKE '%$vehicleId-%' AND s = 1"),2)) ?> <small class="text-muted">/ Cash</small></h1>
            <h1 class="card-title pricing-card-title">RS <?php echo(round($co->getSumOfATable("tmpInvoices","credit"," WHERE invoiceN LIKE '%$vehicleId-%' AND s = 1"),2)) ?><small class="text-muted">/ Creadit</small></h1>
            <h1 class="card-title pricing-card-title">RS <?php echo(round($fullTotal,2)) ?> <small class="text-muted">/ Total</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li> </li>
              
            </ul>
<!--
            <button class="btn btn-primary btn-lg" onClick="conformTmpInvoice(<?php echo($row['shopId']) ?>,<?php echo($row['id']) ?>,<?php echo($vehicleId) ?>)">Conform</button>
			<button class="btn btn-danger btn-lg" onClick="deleteTmpI1B1(<?php echo($row['id']) ?>,<?php echo($vehicleId) ?>);">Delete</button>
			<button class="btn btn-secondary btn-lg"  onClick="viewTmpInvoiceOneByOne(<?php echo($row['id']) ?>,<?php echo($vehicleId) ?>,<?php echo($row['shopId']) ?>)"> View </button>
-->
			  
          </div>
        </div>
        
        </div>
		
		
		<?php
	
	}
	else{
		$basic->noDtaF();
	}


	$conn->close();
?>
<!--</table>-->