<?php
header('Access-Control-Allow-Origin: *'); 
$id = $_GET['id'];
include("db.php");
$sql = $conn->query("SELECT * FROM shop WHERE id = $id");
$row = mysqli_fetch_assoc($sql);
//print_r($row);
?>
<br>
<br>
<h4>Shop Id - <?php echo($id) ?></h4>
<h4><?php echo($row['name']) ?></h4>
<h4>Past Credits - <?php echo($row['credit']) ?></h4>
<br>
<br>
<input type="number" placeholder="Enter amount" id="amount" class="txtbox" >
<input type="button" value="Save" onClick="pastCreditAdder(<?php echo($id) ?>,amount.value)">