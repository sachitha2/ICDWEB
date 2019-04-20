<?php
header('Access-Control-Allow-Origin: *'); 
?>
<?php
	include("db.php");

	$total = array("I1"=>0, "I2"=>0,"I3"=>0, "I4"=>0,"I5"=>0, "I6"=>0,"I7"=>0, "I8"=>0,"I9"=>0, "I10"=>0,"I11"=>0, "I12"=>0,"E1"=>0, "E2"=>0,"E3"=>0, "E4"=>0,"E5"=>0, "E6"=>0,"E7"=>0, "E8"=>0,"E9"=>0, "E10"=>0,"E11"=>0, "E12"=>0);
	
	//echo date("Y");
	for ($x = 1; $x < 13; $x++) {
    	$sql = "SELECT * FROM sell WHERE MONTH(date)= '$x' AND YEAR(date) = YEAR(curdate())";
		$result = $conn->query($sql);
		$incomeTotal = 0;
		while($row = mysqli_fetch_assoc($result)){
			$incomeTotal = $incomeTotal  + ($row['amount'] * $row['selling_price']);
			
		}
		$total['I'.$x] = $incomeTotal;
		
		
	} 


for ($x = 1; $x < 13; $x++) {
    	$sqlEx = "SELECT * FROM cost WHERE MONTH(date)= '$x' AND YEAR(date) = YEAR(curdate())";
		$resultEx = $conn->query($sqlEx);
		$incomeTotal = 0;
		while($rowEx = mysqli_fetch_assoc($resultEx)){
			$incomeTotal = $incomeTotal  + ($rowEx['price']);
			
		}
		$total['E'.$x] = $incomeTotal;
		
		
	} 
	$myJSON = json_encode($total);
echo $myJSON;
?>