<?php
header('Access-Control-Allow-Origin: *'); 
?>



<?php 
	//Connecting Database
include("db.php");	
	// End

	$Root = htmlspecialchars($_GET["Root"]);
	$NewRoot = htmlspecialchars($_GET["NewRoot"]);

	$sql01 = "SELECT *
			  FROM root
			  WHERE id = $Root;";

	$result = mysqli_query($conn, $sql01);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck>0){
		//$row = mysqli_fetch_assoc($result);
		
		$sql2 = "UPDATE root
				SET name='$NewRoot'
				WHERE id= $Root;";

		$result = mysqli_query($conn, $sql2);
					
		mysqli_close($conn);
	
		echo "Changes have been saved successfully";
	
		
	}else{
		//errorMessage = Invalid name
		echo "Invalid Root Name";
	}
	

?>
<?php $conn->close(); ?>