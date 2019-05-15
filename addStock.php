<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");


$co = new DB;
$co->dataConn($conn);
?>
		<!-- The Modal -->
<div id="myModal" class="modal" >

  <!-- Modal content -->
  <div class="modal-content" id="mainModal">
    <span class="close" onClick="hideModal()">&times;</span>
    <div class="" id="modalContent">This is my modal
    
    
    </div>
  </div>

</div>

<!-- modal ending-->


<hr width="100%">
<img src="back.png" width="90" height="90" onClick="getMainStockPageLoader()" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">Update Main Stock</div>
<hr width="100%">


<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4 transbox" align="center" style="color:beige;background-color: #3C3C3C">
	  	<div style="opacity: 1.0;">
	  			
				<input type="number" id="itemId"  style="font-size: 20px;color: black;" onKeyPress="enterUpdateMainStockItemFinder(event,this.value)" placeholder="Enter Item Id">
				<input type="button"  onClick="getItemNameAndAvailability(itemId.value)" class="btn btn-primary" value="NEXT">
				<br>
				<!--
				<input type="button" value="next" onClick="getItemNameAndAvailability(itemId.value)"  style="font-size: 20px;color: black;" >
				-->
				<br>
				<div id="formStage"></div>
			    
	  	 
		</div>
		</div>
	</div>

<div id="unConformedStock">

<?php if($co->nRow("item_amount"," WHERE s = 0 ") != 0){ ?>
	

	UNCONFORMED STOCK
	<button onClick="" class="btn btn-danger btn-lg">Delete all</button>
	<button onClick="" class="btn btn-primary btn-lg">Conform All</button>
<center>
		<table id="table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Stocked Amount</th>
				<th>Buying Price</th>
				<th>MFD</th>
				<th>Ex-Date</th>
				
				<th></th>
				<th></th>
				
				
			</tr>
			<?php
				$sql = "SELECT * FROM `item_amount` WHERE `s` = 0 ORDER BY `loadedAmount` ASC";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
					?>
					<tr>
						<td><?php echo($row['id']) ?></td>
						<td><?php $co->getItemNameByStockId($row['item_id']) ?></td>
						
						<td><?php echo($row['loadedAmount']) ?></td>
						<td><?php echo($row['b_price']) ?></td>
						<td><?php echo($row['date']) ?></td>
						<td><?php echo($row['exDate']) ?></td>
						<td><button class="btn btn-primary" onClick="conformMainStockByID(<?php echo($row['id']) ?>)">Conform</button></td>
						<td><button class="btn btn-danger" onClick="deleteMainStockByID()">Delete</button></td>
						
					</tr>
					<?php
						
						
				}
			
			?>
		</table>
		<?php }
	else{
		echo("No Tmp Stock Found");
	}
	?>
</div>

<?php $conn->close(); ?>