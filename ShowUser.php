<?php
header('Access-Control-Allow-Origin: *'); 
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
<img src="back.png" width="90" height="90" onClick="backToUsersMenu()" class="floateLeft" style="cursor: pointer">
<div class="mainHeadDiv">Users</div>
<hr width="100%">

<?php 
	//Connecting Database
include("db.php");
	// End

	$sql = "SELECT *
			FROM user";

	$result = mysqli_query($conn, $sql);

	
	
	echo "<table align='center' id='table'>";
	echo "<tr><th>User Name</th><th>NIC Number</th><th>Phone Number</th><th>Type</th></tr>";
	
 
	while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>";

		echo '<td>' . $row['username'] . '</td>';
		echo '<td>' . $row['idCardN'] . '</td>';
		echo '<td>' . $row['tp'] . '</td>';
		if ($row['type']==1){
			$type = "Employee";
		}else if ($row['type']==2){
			$type = "Owner";
		}else if ($row['type']==3){
			$type = "Driver";
		}
		
		echo '<td>' . $type . '</td>';
		echo "</tr>";
		
	}
	
	echo "</table>";
	/*$row = mysqli_fetch_assoc($result);*/
	
	
	
?>
<button onClick='ajaxCommonGetFromNet("<?php echo($url) ?>sess.php", "mainStage");'>click me</button>
<?php $conn->close(); ?>
