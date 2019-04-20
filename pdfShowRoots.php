<?php 
	date_default_timezone_set("Asia/Kolkata");
	require('fpdf.php');

	//Connecting Database
	include("db.php");
	// End

	$sql = "SELECT *
			FROM root";

	$result = mysqli_query($conn, $sql);

	$CDate = date("Y-m-d h:i:sa");

	$pdf = new FPDF();
	$pdf->AddPage("p",'A4');
	
	$pdf->SetFont('Arial','B',20);
	$pdf->ln();
	$pdf->Cell('',10,'Routes - '.$CDate,'','',"C");
	
	$pdf->SetFont('Arial','B',18);
	
	$pdf->ln(15);
	$pdf->Cell(55,15,'','','',"C");
	$pdf->Cell(25,15,'ID','1','',"C");
	$pdf->Cell(55,15,'Name','1','',"C");
	$pdf->Cell(45,15,'','','',"C");
	$pdf->ln(5);

	$pdf->SetFont('Arial','',16);


	while ($row = mysqli_fetch_assoc($result)){
		
		$Id = $row['id'];
		$Name = $row['name'];		
					
		$pdf->ln(10);
		$pdf->Cell(55,10,'','','',"C");
		$pdf->Cell(25,10,$Id,'1','',"C");
		$pdf->Cell(55,10,$Name,'1','',"C");
		$pdf->Cell(45,10,'','','',"C");
		
	}

	$pdf->ln(10);
	$pdf->Output('','Routes - '.$CDate.'.pdf"',true);


	
	
?>