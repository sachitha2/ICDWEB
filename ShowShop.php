<?php
header('Access-Control-Allow-Origin: *'); 
$id = $_GET['id'];
$sName = $_GET['sName'];
include("url.php");
?>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" id="mainModal" style="background-color: ;">
  <span class="close" onClick="hideModal()">&times;</span>
    <div class="" id="modalContent">
    	<h1>Loading</h1>
    
    </div>
  </div>

</div>
<hr width="100%">
<img src="back.png" width="90" height="90" onClick="ajaxCommonGetFromNet('https://icd.infinisolutionslk.com/rootsAndShops.php','mainStage')" class="floateLeft" style="cursor: pointer">
<div  class="mainHeadDiv"><?php echo($sName." - ") ?>Shops</div>
<hr width="100%">
<?php 
	//Connecting Database
	include("db.php");
	// End

	$sql = "SELECT * FROM shop WHERE root_id = $id";

	$result = mysqli_query($conn, $sql);
	if($numRows = mysqli_num_rows($result) == 0){
		echo("no data found");
	}
	else{
		?>
		<div class="tileButton" style="width: 800px;text-align: left;height: 60px;">
			<center><a href='http://icd.infinisolutionslk.com/pdfShowShops.php?rId=<?php echo($id."&rName=".$sName) ?>' target='blank'>Print</a></center>
		</div>
		<br><br><br>
		<?php
	echo "<table align='center' id='table'>";
	echo "<tr><th>SID</th><th>Name</th><th>Address</th><th>P.Number</th><th>Route</th><th>NIC Number</th><th>R.Date</th><th>Edit</th><th>Delete</th></tr>";
	

	while ($row = mysqli_fetch_assoc($result)){
		$routeId = $row['root_id'];
		$sqlGetRouteName = "SELECT * FROM root WHERE id = $routeId";
		$resultGetRouteName = $conn->query($sqlGetRouteName);
		$rowGetRouteName = mysqli_fetch_assoc($resultGetRouteName);
		echo "<tr>";
		echo '<td valign="top">' . $row['id'] . '</td>';
		echo '<td valign="top">' . $row['name'] . '</td>';
		echo '<td valign="top">' . $row['address'] . '</td>';
		echo '<td valign="top">' . $row['tp'] . '</td>';
		echo '<td valign="top">' . $rowGetRouteName['name']. '</td>';
		echo '<td valign="top">' . $row['idCardN'] . '</td>';
		echo '<td valign="top">' . $row['r_date'] . '</td>';
		echo('<td valign="top"><input type="button" value="Edit" action=""></td><td  valign="top"><input type="button" value="Delete" action="" onClick="commonDel('.$row['id'].','."'shop'".')"></td>');
		

		echo "</tr>";
		
	}

	echo "</table>";
	}
	/*$row = mysqli_fetch_assoc($result);*/

	
	
?>
<?php $conn->close(); ?>