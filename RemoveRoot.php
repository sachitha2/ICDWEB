<?php
header('Access-Control-Allow-Origin: *'); 
?>



<?php 
	//Connecting Database
include("db.php");
	
	// End

	$id = htmlspecialchars($_GET["Name"]);

	$sql01 = "SELECT *
			  FROM root
			  WHERE id = $id";

	$result = mysqli_query($conn, $sql01);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck>0){
		$sql02 = "DELETE 
			FROM root
			WHERE id = $id";
		$result = mysqli_query($conn, $sql02);
		
		echo "Root was removed successfully";
		//echo "<div style='color: blue'>Root was removed successfully</div>";
		
	}else{
		//errorMessage = Invalid Username
		echo "Invalid root Id";
	}
	

?>
<?php $conn->close(); ?>