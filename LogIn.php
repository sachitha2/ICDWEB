<?php
session_start();
header('Access-Control-Allow-Origin: *'); 
?>



<?php 
	//Connecting Database
	include("db.php");
	
	// End

	$UserName = htmlspecialchars($_GET['UserName']);
	$Password = htmlspecialchars($_GET['Password']);
	//echo($UserName);
	//echo($Password);

	$sql = "SELECT *
			FROM user
			WHERE username = 'admin'";

	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	
	if ($resultCheck<1){
		//errorMessage = Invalid User Name
		echo "Invalid User Name";
		
	}else{
		$row = mysqli_fetch_assoc($result);
		$hashed= md5($Password);
		/*$hashedPwdCheck = password_verify($Password, $row['Password']);
		if($hashedPwdCheck==false){
			//errorMessage = Invalid Password
			echo "Invalid Password";
		}elseif($hashedPwdCheck==true){
			//Loged in
			echo "Loged in";
		}*/
		//echo("hashed <br>".$hashed."<br>");
		//echo("in db <br>".$row['password']."<br>");
		//echo($hashed==$row['password']);
		if ($hashed==$row['password']){
			//echo "Logged in";
			//$cookie_name = "user";
			//$cookie_value = $UserName;
			//setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
			//session_id($_COOKIE['PHPSESSID']); 
			
			$_SESSION['user']['username']= $UserName; 
			if($_SESSION['user']['username']== $UserName ){
				echo('{"data":"done"}');
				//echo($_SESSION['user']['username']);
			}else{
				echo('{"data":"log in error"}');
			}
			
			
			/*if (isset($_COOKIE["user"])){
				echo "done";
			}*/
		
		}else{
			echo('{"data":"Invalid Password"}');
		}
		
	}

mysqli_close($conn);
//header("location:Check.php");
?>
