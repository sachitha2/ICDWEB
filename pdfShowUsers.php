<?php 
	date_default_timezone_set("Asia/Kolkata");
	require('fpdf.php');

	//Connecting Database
	include("db.php");
	// End

	$sql = "SELECT *
			FROM user";

	$result = mysqli_query($conn, $sql);

	$CDate = date("Y-m-d h:i:sa");

	$pdf = new FPDF();
	$pdf->AddPage("p",'A4');
	
	$pdf->SetFont('Arial','B',20);
	$pdf->ln();
	$pdf->Cell('',10,'Users - '.$CDate,'','',"C");
	
	$pdf->SetFont('Arial','B',16);
	
	$pdf->ln(15);
	
	$pdf->Cell(64,15,'User Name','1','',"C");
	$pdf->Cell(48,15,'NIC Number','1','',"C");
	$pdf->Cell(48,15,'Phone Number','1','',"C");
	$pdf->Cell(30,15,'Type','1','',"C");
	
	$pdf->ln(5);

	$pdf->SetFont('Arial','',14);


	while ($row = mysqli_fetch_assoc($result)){
		
		$Name = $row['username'];	
		$NIC = $row['idCardN'];
		$TP = $row['tp'];
			
		if ($row['type']==1){
			$Type = "Employee";
		}else if ($row['type']==2){
			$Type = "Owner";
		}else if ($row['type']==3){
			$Type = "Driver";
		}
					
		$pdf->ln(10);
		$pdf->Cell(64,10,$Name,'1','',"C");
		$pdf->Cell(48,10,$NIC,'1','',"C");
		$pdf->Cell(48,10,$TP,'1','',"C");
		$pdf->Cell(30,10,$Type,'1','',"C");

	}

	$pdf->ln(10);
	$pdf->Output('','Users - '.$CDate.'.pdf"',true);


	
	
?>
<?php $conn->close(); ?>