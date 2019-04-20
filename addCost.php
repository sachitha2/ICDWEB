<?php
header('Access-Control-Allow-Origin: *'); 


?>



<?php 
	//Connecting Database
	include("db.php");
	// End

	

	
	if(isset($_GET['Cost']) && isset($_GET['Purpose']) && isset($_GET['DateTime'])){
		$Cost = htmlspecialchars($_GET['Cost']);
		$Purpose = htmlspecialchars($_GET['Purpose']);
		$DateTime = htmlspecialchars($_GET['DateTime']);
		echo($Cost . $Purpose . $DateTime);
		//$result = mysqli_query($conn, $sql);
		$sql = "INSERT INTO cost (id, price, purpose, date) VALUES (NULL, '$Cost', '$Purpose', '$DateTime');";
		$result = $conn->query($sql);
		echo("<br>");
		echo($result);

		mysqli_close($conn);
	
	echo "Cost was added successfully";}
else{
	echo("ERROR");
}

	
	
?>
<?php $conn->close(); ?>