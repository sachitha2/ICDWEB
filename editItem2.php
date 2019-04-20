<?php 
	//Connecting Database
	include("db.php");
	// End

	$Id = htmlspecialchars($_GET["id"]);
	$Name = htmlspecialchars($_GET["name"]);
	$Date = htmlspecialchars($_GET["date"]);
	$Status = htmlspecialchars($_GET["status"]);
	$TypeId = htmlspecialchars($_GET["TypeId"]);

	if ($Status==0 || $Status==1){
		
		$sql = "SELECT *
				FROM item_type
				WHERE id= '$TypeId';";
		
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		
		if ($resultCheck>0){
			$sql1 = "UPDATE item
					SET name='$Name', sDate='$Date', status=$Status , itemTypeId=$TypeId
					WHERE id= '$Id';";
			$result = mysqli_query($conn, $sql1);
					
			mysqli_close($conn);
	
			echo "Changes have been saved successfully";
		}else{
			echo "Invalid Item Type";
		}
		
	}else{
		echo "Invalid Status";
	}

?>