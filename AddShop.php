<?php
header('Access-Control-Allow-Origin: *'); 
?>

<?php 
	//Connecting Database
	include("db.php");
	// End

	$Name = htmlspecialchars($_GET["Name"]);
	$Address = htmlspecialchars($_GET["Address"]);
	$Phone = htmlspecialchars($_GET["Phone"]);
	$NIC_Number = htmlspecialchars($_GET["NIC_Number"]);
	$Root_Id = htmlspecialchars($_GET["Root_Id"]);

	
	/*$sql = "SELECT *
			FROM shop
			WHERE name = '$Name'";

	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);*/
	/*
	if ($resultCheck>0){
		//errorMessage = This user name is already taken
		echo 'This Name is already taken';
	}else{*/
		if ((strlen($NIC_Number) == 9 || strlen($NIC_Number) == 12) && is_numeric($NIC_Number)){
			if (strlen($Phone) == 10 && is_numeric($Phone)){
				
				$sql1="SELECT *
					   FROM root
					   WHERE id = '$Root_Id'";
				$result1 = mysqli_query($conn, $sql1);
				$resultCheck1 = mysqli_num_rows($result1);
				
				if ($resultCheck1>0){
					
				
					$sql2 = "INSERT INTO shop (name, address, tp, root_id, r_date, idCardN, status )
							 VALUES ('$Name', '$Address' , '$Phone','$Root_Id', CURDATE(), '$NIC_Number',  '1');";
					
	
					$result = mysqli_query($conn, $sql2);

					//mysqli_close($conn);
	
					echo "Shop was registered successfully";
					//echo "<div style='color: blue'>Shop was registered successfully</div>";
					
				}else{
					//errorMessage = Passwords aren't matched
					echo "Invalid Root ID";
				}
			}else{
				//errorMessage = Invalid Phone Number
				echo "Invalid Phone Number";
			}
		}else{
			//errorMessage = Invalid NIC number
			echo "Invalid NIC number";
		}
	//}
	/**/

	
	
?>
<?php $conn->close(); ?>