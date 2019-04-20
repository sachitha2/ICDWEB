<?php
header('Access-Control-Allow-Origin: *'); 
?>


<?php 
	//Connecting Database
	include("db.php");
	// End

	$UserName = htmlspecialchars($_GET["UserName"]);

	$sql01 = "SELECT *
			  FROM user
			  WHERE username = '$UserName'";

	$result = mysqli_query($conn, $sql01);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck>0){
		$sql02 = "DELETE 
			FROM user
			WHERE username = '$UserName'";
		$result = mysqli_query($conn, $sql02);
		
		echo "User was removed successfully";
		//echo "<div style='color: blue'>User was removed successfully</div>";
		
	}else{
		//errorMessage = Invalid Username
		echo "Invalid Username";
	}
	

?>