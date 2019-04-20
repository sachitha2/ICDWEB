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


	
		if ((strlen($NIC_Number) == 9 || strlen($NIC_Number) == 12) && is_numeric($NIC_Number)){
			if (strlen($Phone) == 10 && is_numeric($Phone)){
				if ($Password == $Re_enterPassword){
					//Hashing the password
					$hashedPassword = md5($Password);
					
					$sql = "UPDATE user
					SET password='$hashedPassword', idCardN='$NIC_Number', type='$Type', tp='$Phone'
					WHERE username= '$UserName';";

					$result = mysqli_query($conn, $sql);
					
					mysqli_close($conn);
	
					echo "Changes have been saved successfully";
					//echo "<div style='color: blue'>Changes have been saved successfully</div>";
					
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

	/**/

	
	
?>
<?php $conn->close(); ?>
