<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");

$co = new DB;
$co->dataConn($conn);
$basic = new basic;
$basic->modal();
?>
<hr width="100%">

<img src="back.png" width="90" height="90" onClick="getMainStockPageLoader()" class="floateLeft" style="cursor: pointer">

<div class="mainHeadDiv">View Stock</div>

<hr width="100%">
<div>Selecting menu
<button class="newItem" onClick="">NEW</button>
<button class="newItem" onClick="">ITEMTYPE</button>
<button class="newItem" onClick="">EXPIREDATE</button>
<button class="newItem" onClick="">Select by date</button>




Select by agent

</div>
<?php
/*

echo("view stock Main ");
*/
if(isset($_GET['custom'])){
	$c = $_GET['custom'];
	if($c == 0){
		$sqlGetItemId = "SELECT * FROM item WHERE status = 0 ";
	}
	
}
else{
	$sqlGetItemId = "SELECT * FROM item WHERE status = 1 ";
}

$resultGetItemId = $conn->query($sqlGetItemId);


?>

<center>
		


<hr width="100%">
<hr width="100%">
	<table id="table">
			<tr>
				<th>ID</th>
				<th>Item</th>
				<th>SA</th>
				<th>RA</th>
				<th>SoA</th>
				<th>BPA</th>
				
				
			</tr>
			<?php
		$sqlItem = "SELECT * FROM item ORDER BY item.id ASC";
		$resultItem = $conn->query($sqlItem);
		while($rowItem = mysqli_fetch_assoc($resultItem)){
			
			?>
			
			<tr>
				<td><?php echo($rowItem['id']); ?></td>
				<td><?php $co->getItemNameByStockId($rowItem['id']) ?></td>
				<?php
					$sqlL = "WHERE item_id = ".$rowItem['id']."  AND s = 1 ";
				?>
				<td><?php echo($co->getSumOfATable("item_amount","loadedAmount",$sqlL)) ?></td>
				<td><?php echo($co->getSumOfATable("item_amount","amount",$sqlL)) ?></td>
				<td><?php echo(($co->getSumOfATable("item_amount","loadedAmount",$sqlL))-($co->getSumOfATable("item_amount","amount",$sqlL))) ?></td>
				<td></td>
			</tr>
			
			<?php
		}
	
	?>
	</table>
<hr width="100%">
<hr width="100%">
	<?php
		$sqlItem = "SELECT * FROM item ORDER BY item.id ASC";
		$resultItem = $conn->query($sqlItem);
		while($rowItem = mysqli_fetch_assoc($resultItem)){
			echo("<hr width='100%'>");
			echo("<h1>".$rowItem['id']."</h1>");
		
	
	?>
		</center>
		
	<center>
		<h1><?php $co->getItemNameByStockId($rowItem['id']) ?></h1>
		<table id="table">
			<tr>
				<th>ID</th>
				<th>Date</th>
				<th>SA</th>
				<th>RA</th>
				<th>SoA</th>
				<th>BP</th>
				<th></th>
				
				
			</tr>
			<?php
				$sqlItemA = "SELECT * FROM item_amount WHERE item_id = ".$rowItem['id']." AND s = 1 ORDER BY item_amount.date ASC";
				$resultA = $conn->query($sqlItemA);
				while($rowItamA = mysqli_fetch_assoc($resultA)){?>
					<tr>
						<td><?php echo($rowItamA['id']) ?></td>
						<td><?php echo($rowItamA['date']) ?></td>
						<td><?php echo($rowItamA['loadedAmount']) ?></td>
				
						<td><?php echo($rowItamA['amount']) ?></td>
						<td><?php echo($rowItamA['loadedAmount'] - $rowItamA['amount']) ?></td>
						<td>
						<?php
						
							echo($rowItamA['b_price'])
						
							?>
						</td>
						<td>
					
						<div onclick="editInViewStock(<?php echo($rowItamA['id'])  ?>)" class="addBtnInItems">
		 					EDIT 
		 				</div>
						</td>
					</tr>
						<?php
				}
		
			?>
			<tr>
				<td></td>
				<td></td>
				<?php
					$sqlL = "WHERE item_id = ".$rowItem['id']."  AND s = 1 ";
				?>
				<td><?php echo($co->getSumOfATable("item_amount","loadedAmount",$sqlL)) ?></td>
				<td><?php echo($co->getSumOfATable("item_amount","amount",$sqlL)) ?></td>
				<td><?php echo(($co->getSumOfATable("item_amount","loadedAmount",$sqlL))-($co->getSumOfATable("item_amount","amount",$sqlL))) ?></td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<hr width="100%">
	</center>
	
<?php
			}
			
			?>
			<?php $conn->close(); ?>