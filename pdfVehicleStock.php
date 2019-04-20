<?php 
	date_default_timezone_set("Asia/Kolkata");
	require('fpdf.php');

	//Connecting Database
	include("db.php");
	// End

	$sql = "SELECT *
			FROM t_stock ;";

	$result = mysqli_query($conn, $sql);

	$CDate = date("Y-m-d h:i:sa");

	$pdf = new FPDF();
	$pdf->AddPage("p",'A4');
	
	$pdf->SetFont('Arial','B',20);
	$pdf->ln();
	$pdf->Cell('',10,'Vehicle\'s Stock - '.$CDate,'','',"C");
	
	$pdf->SetFont('Arial','B',18);
	
	$pdf->ln(15);
	$pdf->Cell(35,15,'Vehicle ID','1','',"C");
	$pdf->Cell(40,15,'Vehicle No','1','',"C");
	$pdf->Cell(25,15,'Item ID','1','',"C");
	$pdf->Cell(60,15,'Item Name','1','',"C");
	$pdf->Cell(30,15,'Amount','1','',"C");
	$pdf->ln(5);

	$pdf->SetFont('Arial','',16);

	while ($row = mysqli_fetch_assoc($result)){
		
		$VehicleId = $row['vehicle_id'];
		$ItemId = $row['item_id'];
		$Amount = $row['amount'];	
		
		$sql1 = "SELECT *
				FROM item
				WHERE id = $ItemId;";

		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_assoc($result1);
		
		$ItemName = $row1['name'];
		
		$sql2 = "SELECT *
				FROM vehicle
				WHERE id = $VehicleId;";

		$result2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		
		$VehicleNum = $row2['number'];
		$DriverId = $row2['driver_id'];
			
		$pdf->ln(10);
		$pdf->Cell(35,10,$VehicleId,'1','',"C");
		$pdf->Cell(40,10,$VehicleNum,'1','',"C");
		$pdf->Cell(25,10,$ItemId,'1','',"C");
		$pdf->Cell(60,10,$ItemName,'1','',"C");
		$pdf->Cell(30,10,$Amount,'1','',"C");

		
	}

	$pdf->ln(10);
	$pdf->Output('','Vehicle\'s Stock - '.$CDate.'.pdf"',true);


	
	
?>