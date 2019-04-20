


<?php
			
while($rowGetItemId = mysqli_fetch_assoc($resultGetItemId)){
	$itemId = $rowGetItemId['id'];
	$sqlGetItemType = "SELECT * FROM item_type WHERE id =  ".$rowGetItemId['itemTypeId']."";
	$resultGetItemType = $conn->query($sqlGetItemType);
	$rowGetItemType = mysqli_fetch_assoc($resultGetItemType);
	$sql = "SELECT * FROM item_amount WHERE item_id = $itemId ";
	$result = $conn->query($sql);
	while($row = mysqli_fetch_assoc($result)){
		?>
		
			<tr>
				<td><?php echo($row['id']) ?></td>
				<td><div class="itemNameINVIEW" onClick="ajaxCommonGetFromNet("<?php echo($url) ?>ShowRoot.php", "mainStage");"><?php echo($rowGetItemType['name']." - ".$rowGetItemId['name']) ?></div>
					<?php
						if(date("Y-m-d") == $row['date']){
							echo("<div class='newItem'>NEW</div>");
						}
			
					?>
				
				
				</td>
				<td><?php echo($row['date']) ?></td>
				<td><?php echo($row['loadedAmount']) ?></td>
				
				<td><?php echo($row['amount']) ?></td>
				<td><?php echo($row['loadedAmount'] - $row['amount']) ?></td>
				<td>
					<?php
						
						echo($row['b_price'])
						
						?>
				</td>
				<td>
					
					<div onclick="editInViewStock(<?php echo($row['id'])  ?>)" class="addBtnInItems">
		 				EDIT 
		 			</div>
				</td>
			</tr>
		<?php
	}	
}

?>
</table>


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
					$sqlL = "WHERE item_id = ".$rowItem['id']."";
				?>
				<td><?php echo($co->getSumOfATable("item_amount","loadedAmount",$sqlL)) ?></td>
				<td><?php echo($co->getSumOfATable("item_amount","amount",$sqlL)) ?></td>
				<td><?php echo(($co->getSumOfATable("item_amount","loadedAmount",$sqlL))-($co->getSumOfATable("item_amount","amount",$sqlL))) ?></td>
				<td>0</td>
			</tr>
			
			<?php
		}
	
	?>
	</table>
	</center>