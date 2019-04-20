<?php 
	date_default_timezone_set("Asia/Kolkata");
	require('fpdf.php');

	//Connecting Database
	include("db.php");
	// End

	$sql = "SELECT *
			FROM vehicle WHERE status = 1";

	$result = mysqli_query($conn, $sql);

	$CDate = date("Y-m-d h:i:sa");

	$pdf = new FPDF();
	$pdf->AddPage("p",'A4');
	
	$pdf->SetFont('Arial','B',20);
	$pdf->ln();
	$pdf->Cell('',10,'Vehicles - '.$CDate,'','',"C");
	
	$pdf->SetFont('Arial','B',18);
	
	$pdf->ln(15);
	$pdf->Cell(30,15,'ID','1','',"C");
	$pdf->Cell(55,15,'Vehicle Number','1','',"C");
	$pdf->Cell(35,15,'Root ID','1','',"C");
	$pdf->Cell(35,15,'Driver ID','1','',"C");
	$pdf->Cell(35,15,'Status','1','',"C");
	$pdf->ln(5);

	$pdf->SetFont('Arial','',16);


	while ($row = mysqli_fetch_assoc($result)){
		
		$Id = $row['id'];
		$VehicleNo = $row['number'];
		$RootId = $row['root_id'];
		$DriverId = $row['driver_id'];
		$Status = $row['status'];
					
		$pdf->ln(10);
		$pdf->Cell(30,10,$Id,'1','',"C");
		$pdf->Cell(55,10,$VehicleNo,'1','',"C");
		$pdf->Cell(35,10,$RootId,'1','',"C");
		$pdf->Cell(35,10,$DriverId,'1','',"C");
		$pdf->Cell(35,10,$Status,'1','',"C");
		
	}

	$pdf->ln(10);
	$pdf->Output('','Vehicles - '.$CDate.'.pdf"',true);


	
	
?>