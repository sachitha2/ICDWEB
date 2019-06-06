<?php
//	include("URD.php");
	include("db.php");
	include("func/DB.class.php");
	
	$co = new DB;
	$co->dataConn($conn);

	$timezone  = +5.30; 
	$date =  gmdate("Y-m-j", time() + 3600*($timezone+date("I")));
	
	if(isset($_GET['data'])){
//		echo('{"Status":[{"N":"OK"}]}');
		$data = $_GET['data'];
		$sql = "INSERT INTO inComing (id, data,date,time,status) VALUES (NULL, '$data',curdate(),curtime(),0);";
		$result = $conn->query($sql);		
		
		

  		// Convert JSON string to Array
		$someArray = json_decode($data, true);
  		
		$len = sizeof( $someArray["invoice"]);
		///taking size of arrays
		
		for($x = 0; $x< $len;$x++){
			
			$invoiceN = $someArray["invoice"][$x]['i'];
			$credit = $someArray["invoice"][$x]['c']; 
			$cash = $someArray["invoice"][$x]['cash'];
			$shopId = $someArray["invoice"][$x]['s'];
			
			$sqlAddingTmpI = "INSERT INTO tmpInvoices (id, invoiceN, credit, cash, shopId, s, date) VALUES (NULL, '$invoiceN', '$credit', '$cash', '$shopId', '1', '$date');";
			$resultAddingTmpI = $conn->query($sqlAddingTmpI);
			
			
			///TODO HERE
			$invoiceItem = sizeof($someArray["invoiceItem"][$x]);
			for($y = 0; $y< $invoiceItem;$y++){
				$loadedStock = 0;
				$selectedPrice = $someArray["invoiceItem"][$x][$y]["p"];
				$stockId = $someArray["invoiceItem"][$x][$y]["iId"];
				$qty =$someArray["invoiceItem"][$x][$y]["qty"];
				//Invoice items Staart
//				print_r($someArray["invoiceItem"][$x][$y]);
				$sql = "INSERT INTO tmpStock (id, invoiceN, s, loadedStock, selectedPrice, stockId, qty) VALUES (NULL, '$invoiceN', '0', '$loadedStock', '$selectedPrice', '$stockId', '$qty');";
				$result = $conn->query($sql);
				
				///Invoice items End
			}
			$invoiceNumbers["invoices"][$x] = $invoiceN;
		}
		
		$json = json_encode($invoiceNumbers);
		echo($json);
	}else{
		echo('{"S":0}');
	}

?>

<?php $conn->close(); ?>
