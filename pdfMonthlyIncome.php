<?php
date_default_timezone_set("Asia/Kolkata");
require('fpdf.php');

//Connecting Database
include("db.php");
// End

$sql1 = "SELECT *
		FROM sell
		WHERE MONTH(date)=MONTH(CURDATE()) AND YEAR(date)=YEAR(CURDATE());";

$result1 = mysqli_query($conn, $sql1);
$resultCheck = mysqli_num_rows($result1);



if($resultCheck>0){
	
	$Date = date("Y-m-d");
	$Year = date("Y");
	$Month = date("M");
	
	$pdf = new FPDF();
	$pdf->AddPage("p",'A4');
	
	$pdf->SetFont('Arial','B',20);
	$pdf->ln();
	$pdf->Cell('',10,$Year.' - '.$Month,'','',"C");
	
	$pdf->SetFont('Arial','B',18);
	
	$pdf->ln(15);
	$pdf->Cell(20,15,'ID','1','',"C");
	$pdf->Cell(50,15,'Item','1','',"C");
	$pdf->Cell(30,15,'Amount','1','',"C");
	$pdf->Cell(40,15,'Selling Price','1','',"C");
	$pdf->Cell(50,15,'Total','1','',"C");
	$pdf->ln(5);
	
	$netTotal = 0;

	while($row1 = mysqli_fetch_assoc($result1)){
		$ItemId = $row1['item_id'];
		$Amount = $row1['amount'];
		$Price = $row1['selling_price'];
		$Total = $Amount * $Price;
		$netTotal += $Total;
		
		$sql2 = "SELECT *
		FROM item
		WHERE id = '$ItemId';";

		$result2 = mysqli_query($conn, $sql2);
		$row2 = mysqli_fetch_assoc($result2);
		
		$ItemName = $row2['name'];
		
		$pdf->SetFont('Arial','',16);
		$pdf->ln(10);
		$pdf->Cell(20,10,$ItemId,'1','',"C");
		$pdf->Cell(50,10,$ItemName,'1','',"C");
		$pdf->Cell(30,10,$Amount,'1','',"R");
		$pdf->Cell(40,10,$Price.'.00','1','',"R");
		$pdf->Cell(50,10,$Total.'.00','1','',"R");
		
	}
	
	$pdf->ln(10);
	$pdf->SetFont('Arial','B',22);
	$pdf->Cell(140,20,'Total','1','',"L");
	$pdf->Cell(50,20,$netTotal.'.00','1','',"R");
	
	$pdf->Output('',$Year.'-'.$Month.'.pdf"',true);
	
}

?>