<?php 
	//Connecting Database
include("db.php");
	// End

	$Name = htmlspecialchars($_GET["Name"]);

	$sql01 = "SELECT *
			  FROM shop
			  WHERE name = '$Name'";

	$result = mysqli_query($conn, $sql01);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck>0){
		$sql02 = "DELETE 
			FROM shop
			WHERE name = '$Name'";
		$result = mysqli_query($conn, $sql02);
		
		echo "Shop was removed successfully";
		//echo "<div style='color: blue'>Shop was removed successfully</div>";
		
	}else{
		//errorMessage = Invalid Username
		echo "Invalid Name";
	}
	

?>