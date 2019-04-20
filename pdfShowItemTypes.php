<?php 
	date_default_timezone_set("Asia/Kolkata");
	require('fpdf.php');

	//Connecting Database
	include("db.php");
	// End

	$sql = "SELECT *
			FROM item_type";

	$result = mysqli_query($conn, $sql);

	$CDate = date("Y-m-d h:i:sa");

	$pdf = new FPDF();
	$pdf->AddPage("p",'A4');
	
	$pdf->SetFont('Arial','B',20);
	$pdf->ln();
	$pdf->Cell('',10,'Item Types - '.$CDate,'','',"C");
	
	$pdf->SetFont('Arial','B',18);
	
	$pdf->ln(15);
	$pdf->Cell(30,15,'','','',"C");
	$pdf->Cell(25,15,'ID','1','',"C");
	$pdf->Cell(60,15,'Name','1','',"C");
	$pdf->Cell(45,15,'Date','1','',"C");
	$pdf->Cell(25,15,'','','',"C");
	$pdf->ln(5);

	$pdf->SetFont('Arial','',12);


	while ($row = mysqli_fetch_assoc($result)){
		
		$Id = $row['id'];
		$Name = $row['name'];
		$Date = $row['date'];
					
		$pdf->ln(10);
		$pdf->Cell(30,10,'','','',"C");
		$pdf->Cell(25,10,$Id,'1','',"C");
		$pdf->Cell(60,10,$Name,'1','',"C");
		$pdf->Cell(45,10,$Date,'1','',"C");
		$pdf->Cell(25,10,'','','',"C");
		
	}
	
	//powered by
	include("poweredBy.php");
	//powerd by
	
	$pdf->ln(10);
	$pdf->Output('','Item Types - '.$CDate.'.pdf"',true);


	
	
?>
<?php $conn->close(); ?>