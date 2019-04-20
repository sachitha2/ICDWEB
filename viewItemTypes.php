<?php
header('Access-Control-Allow-Origin: *'); 
?>

	

			<hr width="100%">
	<img src="back.png" width="90" height="90" onClick="backToItemTypesMenu()" class="floateLeft" style="cursor: pointer">
	<Div class="mainHeadDiv">Item Types</Div>
	<hr width="100%">
<?php
include('db.php');
$sql = "SELECT * FROM `item_type` ";
$result = $conn->query($sql);
$numRows = mysqli_num_rows($result);
if($numRows !=0){
	
	?>
	
		<center>
 		<table  id="table">
  		<tbody>
  		<tr>
      		<th>ID</th>
      		<th>NAME</th>
      		<th>DATE</th>
      		<th>Edit</th>
      		<th>Delete</th>
		</tr>
	<?php
	while($row = $result->fetch_assoc()){
		
		?>
		
		
    <tr>
      <td id="<?php echo("id".$row['id']); ?>"  onClick="dbClickForm('<?php echo("id".$row['id']); ?>',1,2,10)"><?php echo($row['id']); ?></td>
      
      <td id="<?php echo("name".$row['id']); ?>" onDblClick="dbClickForm('<?php echo("name".$row['id']); ?>')"><?php echo($row['name']); ?></td>
      
      <td id="<?php echo("date".$row['id']); ?>" onDblClick="dbClickForm('<?php echo("date".$row['id']); ?>')"><?php echo($row['date']); ?></td>
      
      <td><input type="submit" value="Edit" action=""></td><td><input type="submit" value="Delete" action=""</td>
      <!--<td><input type="button" id="" value="EDIT"/></td>-->
      <!--<td><button onClick="itemTypesDelete(<?php echo($row['id']);?>,'del.php','item_type')">X</button></td>-->
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