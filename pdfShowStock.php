<?php 
	date_default_timezone_set("Asia/Kolkata");
	require('fpdf.php');

	//Connecting Database
	include("db.php");
	// End

	$sql = "SELECT *
			FROM item 
			WHERE status = 1;";

	$result = mysqli_query($conn, $sql);

	$CDate = date("Y-m-d h:i:sa");

	$pdf = new FPDF();
	$pdf->AddPage("p",'A4');
	
	$pdf->SetFont('Arial','B',20);
	$pdf->ln();
	$pdf->Cell('',10,'Stock - '.$CDate,'','',"C");
	
	$pdf->SetFont('Arial','B',18);
	
	$pdf->ln(15);
	$pdf->Cell(35,15,'ID','1','',"C");
	$pdf->Cell(65,15,'Name','1','',"C");
	$pdf->Cell(45,15,'Date','1','',"C");
	$pdf->Cell(45,15,'Amount','1','',"C");
	$pdf->ln(5);

	$pdf->SetFont('Arial','',16);

	while ($row = mysqli_fetch_assoc($result)){
		
		$itemId = $row['id'];
		
		$sql1 = "SELECT * FROM item_amount WHERE item_id = $itemId";
		$result1 = mysqli_query($conn, $sql1);
		
		$Name = $row['name'];
		
		while($row1 = mysqli_fetch_assoc($result1)){
			
			$Id = $row1['id'];
			$Date = $row1['date'];
			$Amount = $row1['amount'];
			
					
			$pdf->ln(10);
			$pdf->Cell(35,10,$Id,'1','',"C");
			$pdf->Cell(65,10,$Name,'1','',"C");
			$pdf->Cell(45,10,$Date,'1','',"C");
			$pdf->Cell(45,10,$Amount,'1','',"R");

		}

		
	}

	$pdf->ln(10);
	$pdf->Output('','Stock - '.$CDate.'.pdf"',true);



?>