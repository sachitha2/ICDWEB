<?php
header('Access-Control-Allow-Origin: *'); 
?>



<?php 
	//Connecting Database
	include("db.php");
	// End

	$Id = htmlspecialchars($_GET["id"]);
	$Name = htmlspecialchars($_GET["name"]);
	$Date = htmlspecialchars($_GET["date"]);
	$Status = htmlspecialchars($_GET["status"]);

	if ($Status==0 || $Status==1){
		$sql = "UPDATE item_type
				SET name='$Name', date='$Date', status=$Status
				WHERE id= '$Id';";
		$result = mysqli_query($conn, $sql);
					
		mysqli_close($conn);
	
		echo "Changes have been saved successfully";
	}else{
		echo "Invalid Status";
	}

?>
<?php $conn->close(); ?>
