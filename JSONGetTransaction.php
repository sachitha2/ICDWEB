<?php
	include("URD.php");
	include("db.php");
	include("func/DB.class.php");
	
	$co = new DB;
	$co->dataConn($conn);

	$timezone  = +5.30; 
	$date =  gmdate("Y-m-j", time() + 3600*($timezone+date("I")));

	if(isset($_GET['data'])){
		echo('{"Status":[{"N":"OK"}]}');
		$data = $_GET['data'];
		$sql = "INSERT INTO inComing (id, data,date,time,status) VALUES (NULL, '$data',curdate(),curtime(),0);";
		$result = $conn->query($sql);		
		
		$data = $_GET['data'];
		

  		// Convert JSON string to Array
		$someArray = json_decode($data, true);
  		//print_r($someArray);       echo("<br><br>");
		// Dump all data of the Array
  		//echo $someArray[0]["items"][0];
		
		// Access Array data
		
		///taking size of arrays
		//echo(sizeof( $someArray[0]["items"]));
		$len = sizeof( $someArray[0]["items"]);
		///taking size of arrays
		
		for($x = 0; $x< $len;$x++){
			$invoiceN = $someArray[0]["items"][$x]['InvoiceNo'];
			$s =  $someArray[0]["items"][$x]['SYNCSTAT'];
			$loadedStock =  $someArray[0]["items"][$x]['amount'];
			$selectedPrice =  $someArray[0]["items"][$x]['selectedPrice'];
			$stockId =  $someArray[0]["items"][$x]['itemId'];
			$qty =  $someArray[0]["items"][$x]['qty'];
			
			/*echo("<br>");
			echo("Invoice number".$invoiceN);
			echo("<br>");
			echo("s".$s);
			echo("<br>");
			echo("loaded s".$loadedStock);
			echo("<br>");
			echo("selected price".$selectedPrice);
			echo("<br>");
			echo("stockId".$stockId);
			echo("<br>");
			echo("qty".$qty);
			echo("<br>");*/
			
			//printing array
			
			///2018/11/26
			////finding duplicates
			$duSql = "SELECT * FROM tmpStock WHERE invoiceN = '$invoiceN' AND  stockId = $stockId AND selectedPrice = '$selectedPrice' AND qty = $qty";
			if($co->getNumRow($duSql) == 0){
				///adding data to the tmp stock table
				$sql = "INSERT INTO tmpStock (id, invoiceN, s, loadedStock, selectedPrice, stockId, qty) VALUES (NULL, '$invoiceN', '$s', '$loadedStock', '$selectedPrice', '$stockId', '$qty');";
				$result = $conn->query($sql);
			
			////adding data to the tmp stock table
			}
			
			
			/////ending of finding duplicatess
			
			
			
		}
		///adding invoice to the data base
		$invoiceN = $someArray[0]["Invoice"][0]['InvoiceNo'];
		$credit = $someArray[0]["Invoice"][0]['Credit']; 
		$cash = $someArray[0]["Invoice"][0]['cash'];
		$shopId = $someArray[0]["Invoice"][0]['CustomerID'];
		
//		$date = $someArray[0]["Invoice"][0]['InvoiceDate'];
		
		
		$sqlAddingTmpI = "INSERT INTO tmpInvoices (id, invoiceN, credit, cash, shopId, s, date) VALUES (NULL, '$invoiceN', '$credit', '$cash', '$shopId', '1', '$date');";
		$resultAddingTmpI = $conn->query($sqlAddingTmpI);
		///adding invoice to the data base
		
	}else{
		echo('{"S":0}');
	}

?>

<?php $conn->close(); ?>
