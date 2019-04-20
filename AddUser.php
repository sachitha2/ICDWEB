<?php
header('Access-Control-Allow-Origin: *'); 
?>
  



<?php 
	//Connecting Database
	include("db.php");
	// End

	$UserName = htmlspecialchars($_GET["UserName"]);
	$NIC_Number = htmlspecialchars($_GET["NIC_Number"]);
	$Phone = htmlspecialchars($_GET["Phone"]);
	$Password = htmlspecialchars($_GET["Password"]);
	$Re_enterPassword = htmlspecialchars($_GET["ReenterPassword"]);
	$Type = htmlspecialchars($_GET["Type"]);
	
	$sqlUserAmount = "SELECT * FROM user";
	$sqlUserAmountResult = $conn->query($sqlUserAmount);
	$userAmount = mysqli_num_rows($sqlUserAmountResult);
	if($userAmount  < 2){
		
	
	$sql = "SELECT *
			FROM user
			WHERE username = '$UserName'";

	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	
	if ($resultCheck>0){
		//errorMessage = This user name is already taken
		echo 'This Username is already taken';
	}else{
		if ((strlen($NIC_Number) == 9 || strlen($NIC_Number) == 12) && is_numeric($NIC_Number)){
			if (strlen($Phone) == 10 && is_numeric($Phone)){
				if ($Password == $Re_enterPassword){
					//Hashing the password
					$hashedPassword = md5($Password);
					
				
					$sql1 = "INSERT INTO user (username, password, idCardN, type, status, count, tp,date,time)
							 VALUES ('$UserName', '$hashedPassword' , '$NIC_Number','$Type', '1', '0',  '$Phone',curdate(),curtime());";
					
					/*$sql1 = "INSERT INTO user (UserName, Password, NIC_Number, Phone)
							 VALUES ('$UserName', '$Password' , '$NIC_Number', '$Phone');";*/
	
					$result = mysqli_query($conn, $sql1);

					mysqli_close($conn);
	
					echo "User was registered successfully";
					//echo "<div style='color: blue'>User was registered successfully</div>";
					
				}else{
					//errorMessage = Passwords aren't matched
					echo "Passwords aren't matched";
				}
			}else{
				//errorMessage = Invalid Phone Number
				echo "Invalid Phone Number";
			}
		}else{
			//errorMessage = Invalid NIC number
			echo "Invalid NIC number";
		}
	}
	/**/
}
else{
	echo("<h4 style='color:red'> user limit reached <br> Contact system Admin - 0715591137 </h4>");
}
	
?>
<?php $conn->close(); ?>
