<?php 
	//Connecting Database
include("db.php");
	
	// End

	$Id = htmlspecialchars($_GET["Id"]);

	$sql01 = "SELECT *
			  FROM item
			  WHERE id = '$Id'";

	$result = mysqli_query($conn, $sql01);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck>0){
		$sql02 = "DELETE 
			FROM item
			WHERE id = '$Id'";
		$result = mysqli_query($conn, $sql02);
		
		echo "Item was deleted successfully";
		//echo "<div style='color: blue'>Root was removed successfully</div>";
		
	}else{
		//errorMessage = Invalid Username
		echo "Invalid ID";
	}
	

?>