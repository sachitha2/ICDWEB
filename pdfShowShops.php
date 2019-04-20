<?php 
	date_default_timezone_set("Asia/Kolkata");
	require('fpdf.php');

	//Connecting Database
	include("db.php");
	// End
	$rId = $_GET['rId'];
	$rName = $_GET['rName'];
	$sql = "SELECT *
			FROM shop WHERE root_id = $rId";

	$result = mysqli_query($conn, $sql);

	$CDate = date("Y-m-d h:i:sa");

	$pdf = new FPDF();
	$pdf->AddPage("L",'A4');
	
	$pdf->SetFont('Arial','B',20);
	$pdf->ln();
	$pdf->Cell('',10,$rName.' - Shops - '.$CDate,'','',"C");
	
	$pdf->SetFont('Arial','B',16);
	
	$pdf->ln(15);
	$pdf->Cell(12,15,'ID','1','',"C");
	$pdf->Cell(55,15,'Name','1','',"C");
	$pdf->Cell(105,15,'Address','1','',"C");
	$pdf->Cell(30,15,'Phone','1','',"C");
	//$pdf->Cell(15,15,'Root','1','',"C");
	$pdf->Cell(34,15,'NIC No.','1','',"C");
	$pdf->Cell(25,15,'R Date','1','',"C");
	$pdf->ln(5);

	$pdf->SetFont('Arial','',12);


	while ($row = mysqli_fetch_assoc($result)){
		
		$Id = $row['id'];
		$Name = $row['name'];
		$Address = $row['address'];
		$Phone = $row['tp'];
		$RootId = $row['root_id'];
		$NIC = $row['idCardN'];
		$Date = $row['r_date'];
					
		$pdf->ln(10);
		$pdf->Cell(12,10,$Id,'1','',"C");
		$pdf->Cell(55,10,$Name,'1','',"C");
		$pdf->Cell(105,10,$Address,'1','',"C");
		$pdf->Cell(30,10,$Phone,'1','',"C");
		//$pdf->Cell(15,10,$RootId,'1','',"C");
		$pdf->Cell(34,10,$NIC,'1','',"C");
		$pdf->Cell(25,10,$Date,'1','',"C");

	}

	$pdf->ln(10);
	$pdf->Output('','Shops - '.$CDate.'.pdf"',true);


	
	
?>
<?php $conn->close(); ?>