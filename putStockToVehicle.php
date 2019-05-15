<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
include("url.php");
include("func/basic.class.php");
include("func/DB.class.php");
$co = new DB;
$co->dataConn($conn);
$basic = new basic;
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
<!-- modal ending-->
<?php
$vehicleId = $_GET['vehicleId'];

?>
<hr width="100%">
<img src="back.png" width="90" height="90" onClick="selectVehicleToAddStocks()" class="floateLeft" style="cursor: pointer">
<div class="h1 mainHeadDiv">Load Stocks To <?php echo($vehicleId); ?></div>
<hr width="100%">
<div class="btn-add btn btn-danger" id="addStockBtn" onClick="addStockBtnStage()">Add</div>
<div class="addStcok" id="addStockStage">
				<div class="addStockSHide" id="addStockSHide" onClick="addStockSHide()">Hide</div>
	  			<h1>Enter Item ID</h1>
<!--
				<input       >
				<datalist id="itemId">
    				<option value="Internet Explorer" >
    				<option value="Firefox">
    				<option value="Chrome">
    				<option value="Opera">
    				<option value="Safari">
  				</datalist>
-->
			<input id="itemId" list="item" name="item" style="font-size: 20px;color: black;" onKeyPress="enterFindItemNameForVehicleLoading(event,itemId.value,<?php echo($vehicleId) ?>)">
  			<datalist id="item">
   			<?php
				$sqlItems = "SELECT * FROM item";
				$queryItems = $conn->query($sqlItems);
				while($rowItems = mysqli_fetch_assoc($queryItems)){
					?>
					<option  value="<?php echo($rowItems['id']) ?>"><?php $co->getItemNameByStockId($rowItems['id']) ?></option>
					<?php
				}
			?>
    			
  			</datalist>
				<input class="btn btn-primary" type="button" value="NEXT" onClick="findItemNameForVehicleLoading(itemId.value,<?php echo($vehicleId) ?>)">
				<br>
				<!--
				<input type="button" value="next" onClick="getItemNameAndAvailability(itemId.value)"  style="font-size: 20px;color: black;" >
				-->
				<br>
				<div id="formStage"></div>
			    
	  	 
	
</div>
<div  class="stockPre"   id="vehicleStockTable">
	<?php
$sql = "SELECT * FROM t_stock WHERE vehicle_id = $vehicleId AND amount !=0 AND s = 0";
	if($co->getNumRow($sql)){
		echo($co->getNumRow($sql."data found from the table"));
		

$result = $conn->query($sql);

?>
<center>
<button  class="btn btn-primary btn-lg btn-block" onClick='ajaxCommonGetFromNet("<?php echo($url) ?>conformVehicleStock.php?vId=<?php echo($vehicleId) ?>", "vehicleStockTable")'>Conform Stock</button>
<table class="table table-striped table-dark" width="100%">
	<thead>
	<tr>
		<th scope="col">Id</th>
		<th scope="col">Name</th>
		<th scope="col">Amount</th>
		<th scope="col" width="20px">SId</th>
		<th scope="col" align="center"></th>
	</tr>
	</thead>
	<tbody>
<?php
while($row = mysqli_fetch_assoc($result)){

	?>
	<tr onClick="alert('hello')">
		<td scope="row"><?php 	echo($row['id']);?></td>
		<td>
			
			
			<?php
				$getId = $row['item_id'];
				$sqlGetIName = "SELECT * FROM item WHERE id = $getId";
				$resultGetName = $conn->query($sqlGetIName);
				$rowGetName = mysqli_fetch_assoc($resultGetName);
				$itemTypeI = $rowGetName['itemTypeId'];
				$findItemTypeNameSql = "SELECT * FROM item_type WHERE id = $itemTypeI";
				$findItemTypeNameResult = $conn->query($findItemTypeNameSql);
				$findItemTypeNameRow = mysqli_fetch_assoc($findItemTypeNameResult);
				echo($findItemTypeNameRow['name']."-");
				echo($rowGetName['name']);
	
			?>
		</td>
		<td><?php 	echo($row['amount']);?></td>
		<td><button class="btn btn-primary"><?php echo($row['amount_id'])?></button></td>
		<td style="text-align: center"><button class="btn btn-danger" onClick="removeItemsFromVehicleStock(<?php 	echo($row['id']);?>,<?php echo($vehicleId) ?>)">X</button></td>
	</tr>
	<?php
}
?>
	</tbody>
</table>
</center>
<?php
	}else{
		$basic->noDtaF();
	}
	?>
		
</div>

<?php
	$conn->close();
?>

