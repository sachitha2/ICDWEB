<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
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
<img src="back.png" width="90" height="90" onClick="shopMenuLoading()" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">Routes</div>
<hr width="100%">
<?php
$sql = "SELECT * FROM root";
$result = $conn->query($sql);
while($row = mysqli_fetch_assoc($result)){
	
	?>
	
	<div class="tileButton" style="width: 800px;text-align: left" onClick='ajaxCommonGetFromNet("<?php echo("$url") ?>ShowShop.php?id=<?php echo($row['id']."&sName=".$row['name']) ?>", "mainStage");'>
		
		<table width="100%">
			<tbody><tr>
				<td width="300px">
					<img src="route.png" width="150" height="150">
				</td>
				<td>
					
					<table>
						<tbody>
						<tr>
							<td width="300px">Route name </td>
							<td><?php echo($row['name']) ?></td>
						</tr>
						<tr>
							<td width="300px">Number of shops </td>
							
							<?php
		
							$getNOfshops = "SELECT * FROM shop WHERE root_id = ".$row['id'].";";
							$getNOfshopsResult = $conn->query($getNOfshops);
							$getNOfshopstotal = mysqli_num_rows($getNOfshopsResult);
							
							?>
							<td><?php echo($getNOfshopstotal) ?></td>
						</tr>
						
					</tbody></table>
					 
				</td>
			</tr>
		</tbody></table>
	</div>
	<br>
	<br>
	<?php
	//echo("<a href='showShop.php?id=".$row['id']."'>".$row['name']."</a><br>");
}

?>
<?php $conn->close(); ?>