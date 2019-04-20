<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
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
<img src="back.png" width="90" height="90" onClick="backToItemsMenu()" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">Items</div >
<hr width="100%">
<?php
include('db.php');
$sql = "SELECT * FROM item";
$result = $conn->query($sql);
$numRows = mysqli_num_rows($result);
if($numRows !=0){
	
	?>
	<div class="tileButton" style="width: 800px;text-align: left;height: 60px;">
	<center><a href="<?php echo($url) ?>pdfShowItems.php" target="blank">Print</a></center>
	<br><br><br>
	</div>
	<center>
	<table width="100%" border="0" id="table">
  		<tbody>
  		<tr>
      		<th width="30">ID</th>
      		<th>NAME</th>
      		<th>Price Range</th>
      		<th>DATE</th>
      		<th></th>
      		
      
		</tr>
	<?php
	while($row = mysqli_fetch_assoc($result)){
		$itemTypeId = $row['itemTypeId'];
		$sqlGetName = "SELECT * FROM item_type WHERE id = $itemTypeId";
		$resultGetName = $conn->query($sqlGetName);
		$rowGetName = mysqli_fetch_assoc($resultGetName);
		?>
		
		
    <tr>
      <td id="<?php echo("id".$row['id']); ?>"  onClick="dbClickForm('<?php //echo("id".$row['id']); ?>',1,2,10)"--><?php echo($row['id']); ?></td>
      <td id="<?php echo("name".$row['id']); ?>" onDblClick="dbClickForm('<?php //echo("name".$row['id']); ?>')"><?php echo($rowGetName['name'] ."-") ;echo($row['name']); ?></td>
      <td>
      	
      	
      	<?php
      	$sql2 = "SELECT * FROM item_price_range WHERE item_id = ".$row['id'].";";
		$result2 = $conn->query($sql2);
		
		while( $row2 = $result2->fetch_assoc()){
		echo("<strong style='cursor:pointer;background-color:red;color:white;margin:10px;padding-top:5px;padding-bottom:5px;padding-left:15px;padding-right:15px;border-radius:30px'>");
		echo($row2['price']);
		echo("  </strong>");
	}
      	?>
      </td>
      <td><?php echo($row['sDate']);?></td>
      <td>
      	
      
		<div  onClick="addPriceRange(<?php echo($row['id']) ?>)"  class="addBtnInItems">
		<?php
		echo(" EDIT ");
		echo("</div>");?>
      </td>
	</tr>
		<?php
	}
	?>
		</tbody>
	</table>
</center>
	<?php
}else{
	echo("No data found");
}
?>
<script >

</script>
<?php $conn->close(); ?>