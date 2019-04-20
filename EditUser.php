<?php
header('Access-Control-Allow-Origin: *'); 
?>



<?php 
	//Connecting Database
include("db.php");
	
	// End

	$UserName = htmlspecialchars($_GET["UserName"]);
	$Password = htmlspecialchars($_GET["Password"]);

	$sql01 = "SELECT *
			  FROM user
			  WHERE username = '$UserName'";

	$result = mysqli_query($conn, $sql01);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck>0){
		
		$row = mysqli_fetch_assoc($result);
		$hashed=md5($Password);
		if ($row["password"]==$hashed){
		/*$sql02 = "DELETE 
			FROM user
			WHERE username = '$UserName'";
		$result = mysqli_query($conn, $sql02);*/
	
		
		echo "
 	  	  <h5>NIC Number</h5>
			<input type='text' class='txtbox' name='NIC_Number' id='NIC_Number' required placeholder=' ex : 987620125' value='".$row['idCardN']."' style='color:black'><br>
 	  	  <h5>Phone Number</h5>
			<input type='text' class='txtbox' name='Phone' id='Phone' required placeholder=' ex : 0714453000' value='".$row['tp']."' style='color:black'><br>
	  	  <h5>Type</h5>";
			
		if($row['type']==1){
			echo "<select id='Type' style='color:black'>
  				<option value='1' selected>Employee</option>
  				<option value='2'>Owner</option>
  				<option value='3'>Driver</option>
		  		</select>";
		}else if ($row['type']==2){
			echo "<select id='Type' style='color:black'>
  			<option value='1'>Employee</option>
  			<option value='2' selected>Owner</option>
  			<option value='3'>Driver</option>
		  </select>";
		}else{
			echo "<select id='Type' style='color:black'>
  			<option value='1'>Employee</option>
  			<option value='2'>Owner</option>
  			<option value='3' selected>Driver</option>
		  </select>";
		}
			
 	  	  
  	  	echo "<h5>New Password</h5>
				<input type='password' class='txtbox' name='Password' id='Password' required style='color:black'><br>
			  <h5>Re-enter Password</h5>
				<input type='password' class='txtbox' name='ReenterPassword' id='ReenterPassword' onKeyPress='enter2EditUser(event)' required style='color:black'><br>
  	  	  	  <h5 id='errorMessage' style='color: red'></h5><br>
	  	      <button id='save' class= 'btn-block button button1' type='button' onClick='save()'>Save Changes</button>
		  ";
		//echo "<div style='color: blue'>User was removed successfully</div>";
		}else{
			//errorMessage = Invalid Password
			echo "Invalid Password";
		}
		
	}else{
		//errorMessage = Invalid Username
		echo "Invalid Username";
	}
	

?>