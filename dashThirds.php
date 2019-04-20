<?php
header('Access-Control-Allow-Origin: *'); 
include("url.php");
include("db.php");
include("func/basic.class.php");
include("func/DB.class.php");
$timezone  = +5.30; 
$time =  gmdate("Y-m-j", time() + 3600*($timezone+date("I")));
$month = gmdate("m", time() + 3600*($timezone+date("I")));

$co = new DB;

$co->dataConn($conn);
$t = "Today";
$t2 = "Month";
$t3 = "Credit";
$expe = $co->getSumOfATable('cost','price',"WHERE date LIKE '%$time%'");


////expense calc
$sqlEx = "SELECT * FROM sell WHERE date LIKE '%$time%'";
$queryEx = $conn->query($sqlEx) ;
while ($row  = mysqli_fetch_assoc($queryEx)) {
	//echo($row['stock_id']);
	$sqlExA = "SELECT * FROM item_amount WHERE id =".$row['stock_id']." ";
	$queryExA = $conn->query($sqlExA);
	$rowExA = mysqli_fetch_assoc($queryExA);
	$expe +=$rowExA['b_price'] * $row['amount'];
}

///expense calculating
$title = array(
	"$t Cash",
	"$t $t3 ",
	"$t Total",
	"$t Exp",
	"$t Profit",
	"$t2 Cash",
	"$t2 $t3",
	"$t2 Total",
	"Shops"
//	"Items",
//	""
);
$tCash =  $co->getSumOfATable('total','receivedAmount',"WHERE date = '$time'") ;
$mCash =  $co->getSumOfATable('total','receivedAmount',"WHERE MONTH(date)= '$month' AND YEAR(date) = YEAR(curdate())") ;
$tTotal = $co->getSumOfATable('total','total',"WHERE date = '$time'");
$mTotal = $co->getSumOfATable('total','total',"WHERE MONTH(date)= '$month' AND YEAR(date) = YEAR(curdate())");
$tCre = $tTotal - $tCash;
$mCre = $mTotal - $mCash;
$dataC = array(
	round($tCash,2),
	round($tCre,2),
	round($tTotal,2),
	round($expe,2),
	round($tCash - $expe),
	$mCash,
	$mCre,
	$mTotal,
	$co->getNumRow("SELECT * FROM shop")
	
);
//print_r($dataC);
$co = new DB;
$co->dataConn($conn);
$x = 0;
$buttons = array(
	['view' =>'alert(25)','add'=>'','edit'=>''],
	['view' =>'alert(25)','add'=>'','edit'=>''],
	['view' =>'alert(25)','add'=>'','edit'=>''],
	['view' =>'alert(25)','add'=>'','edit'=>''],
	['view' =>'alert(25)','add'=>'','edit'=>''],
	['view' =>'alert(25)','add'=>'','edit'=>''],
	['view' =>'alert(25)','add'=>'','edit'=>''],
	['view' =>'alert(25)','add'=>'','edit'=>''],
	['view' =>"ajaxCommonGetFromNet('https://icd.infinisolutionslk.com/rootsAndShops.php','mainStage')",'add'=>'addShopPageLoader()','edit'=>"ajaxCommon('editShopInterface.php','mainStage')"],


);
foreach($title as $data){
	basic::third($data,$buttons[$x],$dataC[$x]);
	$x++;
}
?>