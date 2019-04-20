<?php
header('Access-Control-Allow-Origin: *'); 
?>



<?php 
	//Connecting Database
	include("db.php");
   // End

	$Root = htmlspecialchars($_GET["Root"]);

	
	$sql = "SELECT *
			FROM root
			WHERE name = '$Root'";

	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	
	if ($resultCheck>0){
		//errorMessage = This user name is already taken
		echo 'This root name is already taken';
	}else{
		$sql1 = "INSERT INTO root (name)
							 VALUES ('$Root');";
	
					$result = mysqli_query($conn, $sql1);

					mysqli_close($conn);
		echo 'Root was registered successfully';
		//echo "<div style='color: blue'>Root was registered successfully</div>";
	}
	

	
	
?>