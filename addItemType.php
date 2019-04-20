<?php
header('Access-Control-Allow-Origin: *'); 
?>


<?php
	include('db.php');
	$iName = $_GET['iName'];
	//to find equal rows in the database
	$findEqualIName = "SELECT * FROM item_type WHERE name LIKE '$iName' ORDER BY id DESC ";
	$findEqualINameResult = $conn->query("$findEqualIName");
	$numRows = mysqli_num_rows($findEqualINameResult);
	//equal rows finding ending
	if($numRows == 0){
	$sql = "INSERT INTO item_type (id, name, date,status) VALUES (NULL, '$iName', curdate(),1);";
	$result = $conn->query($sql);
	
		/*$sql = "SELECT * FROM item_type ORDER BY item_type.id DESC";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		echo("<br>");
		echo("Id => ".$row['id']);
		echo("<br>");
		echo("Item Type => ".$row['name']);
		echo("<br>");
		echo("Date => ".$row['date']);
		echo("<br>");*/
		echo("successfully added");
	
	}
	else{
		echo("$iName is already exist in th database");
	}
	
?>
<?php $conn->close(); ?>