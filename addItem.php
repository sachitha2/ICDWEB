<?php
	header("Access-Control-Allow-Origin: *");
	include('db.php');
	$itemId = $_GET['itemId'];//Initialize get method to get data
	$name = $_GET['iName'];//Initialize get method to get data
	//searchig for duplicates
	$sql = "SELECT * FROM item WHERE itemTypeId = $itemId AND name LIKE '$name'";
	$result = $conn->query($sql);
	$numRow = mysqli_num_rows($result);
	if($numRow == 0){//rows == 0;
		////adding data to the database
		$sql = "INSERT INTO item (id, itemTypeId, name, sDate, status) VALUES (NULL, '$itemId', '$name', curdate(), '1');";
		$result = $conn->query($sql);
		
		
		///getting that data from the database
		$sql = "SELECT * FROM item ORDER BY item.id DESC";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$itemTypeId = $row['itemTypeId'];
		$getITsql = "SELECT * FROM `item_type` WHERE `id` = $itemTypeId ;";
		$getITresult = $conn->query($getITsql);
		$getITrow = $getITresult->fetch_assoc();
		/*?>
		
			<?php 
				echo($itemTypeId."-");
				echo($getITrow['name']);
			?>
		
		<?php echo($row['id']."-");echo($row['name']);
				echo("<br>");
				echo("Date ".$row['sDate']);
				echo("<br>");
				
			?>
		
		<?php*/
		echo("successfully added");
		
	}

	else{
		echo(" $name already exist in the database");
		
		}
	
?>
<?php $conn->close(); ?>
